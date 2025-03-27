<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Challenge;
use App\Models\ChallengeAttempt;
use Illuminate\Support\Facades\Storage;
use App\Models\Submission;
use Illuminate\Http\Request;

class StudentController
{
    public function view_assignments(){
        $studentId = Auth::id();
        $assignments = Assignment::leftJoin('submissions', function($join) use ($studentId) {
            $join->on('assignments.id', '=', 'submissions.assignment_id')
                 ->where('submissions.student_id', '=', $studentId);
        })
        ->select('assignments.*', 'submissions.id as submission_id', 'submissions.created_at')
        ->get();
    
        return view('student.assignments', ['assignments' => $assignments]);
    }

    public function view_challenges(){
        $studentId = Auth::id();
    
        $challenges = Challenge::with(['attempts' => function($query) use ($studentId) {
                $query->where('student_id', $studentId)
                    ->orderBy('created_at', 'desc');
            }])
            ->get()
            ->map(function($challenge) {
                // Kiểm tra nếu có ít nhất 1 lần đúng (AC) thì hiển thị AC
                $hasCorrectAttempt = $challenge->attempts->contains('is_correct', true);
                
                $challenge->status = $hasCorrectAttempt ? 'AC' : 
                                ($challenge->attempts->isNotEmpty() ? 'WA' : null);
                return $challenge;
            });
        
        return view('student.challenges', compact('challenges'));
    }

    public function view_submit_assignment($id) {
        $assignment = Assignment::find($id);
        return view('student.submit_assignment', ['assignment'=> $assignment]);
    }

    public function submit_assignment(Request $request, $assignment_id){
        try {
            // Kiểm tra assignment tồn tại
            $assignment = Assignment::findOrFail($assignment_id);
            // Kiểm tra deadline (nếu có)
            if ($assignment->deadline && now()->gt($assignment->deadline)) {
                return redirect()->back()->with('error', 'Đã quá hạn nộp bài tập.');
            }
    
            // Kiểm tra sinh viên đã nộp bài chưa
            $existingSubmission = Submission::where('assignment_id', $assignment_id)
                                        ->where('student_id', Auth::id())
                                        ->exists();
            
            if ($existingSubmission) {
                return redirect()->back()->with('error', 'Bạn đã nộp bài tập này rồi.');
            }
    
            // Xử lý upload file
            if ($request->hasFile('assignment_file')) {
                $file = $request->file('assignment_file');
                
                // Tạo tên file: assignment_[id]_[student_id]_[timestamp].[extension]
                $fileName = 'assignment_' . $assignment_id . '_' . Auth::id() . '_' . time() . '.' . $file->getClientOriginalExtension();
                
                // Lưu file vào thư mục storage/app/public/submissions
                $filePath = $file->storeAs('submissions', $fileName, 'public');

                $submission = new Submission();
                $submission->assignment_id = $assignment_id;
                $submission->student_id = Auth::id();
                $submission->file_path = $filePath;
                $submission->save();

                // echo $submission;
    
                return redirect(route('student.assignment'))->with('success', 'Nộp bài tập thành công!');
            }
    
            return redirect('/')->with('error', 'Có lỗi xảy ra khi upload file.');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi hệ thống: ' . $e->getMessage());
        }
    }

    public function view_submit_challenge($id) {
        $challenge = Challenge::find($id);
        return view('student.submit_challenge', compact('challenge'));
    }

    public function submitChallenge(Request $request, $challengeId)
    {
        $request->validate([
            'answer' => 'required|string|max:255',
        ]);

        $challenge = Challenge::findOrFail($challengeId);
        $user = Auth::user();

        // Lấy tên file không có extension
        $fileName = pathinfo($challenge->file_path, PATHINFO_FILENAME);

        // Kiểm tra đáp án
        if (strtolower(trim($request->answer)) === strtolower($fileName)) {
            // Đọc nội dung file
            $fileContent = Storage::disk('public')->get($challenge->file_path);
            
            // Lưu attempt vào database
            ChallengeAttempt::create([
                'challenge_id' => $challenge->id,
                'student_id' => $user->id,
                'submitted_answer' => $request->answer,
                'is_correct' => true,
            ]);

            return redirect()
                ->back()
                ->with([
                    'success' => 'Chính xác! Đáp án của bạn đúng.',
                    'file_content' => $fileContent
                ]);
        } else {
            // Lưu attempt sai
            ChallengeAttempt::create([
                'challenge_id' => $challenge->id,
                'student_id' => $user->id,
                'submitted_answer' => $request->answer,
                'is_correct' => false,
            ]);

            return redirect()
                ->back()
                ->with('error', 'Đáp án không chính xác. Vui lòng thử lại!');
        }
    }
}
