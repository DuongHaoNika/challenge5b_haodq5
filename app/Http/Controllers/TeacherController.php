<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use App\Models\User;
use App\Models\Challenge;
use App\Models\ChallengeAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function students()  {
        $students = User::where('role', 'student')->paginate(10);
        return view('teacher.manage-student', compact('students'));
    }

    public function view_assignment() {
        $userId = Auth::id();
        $assignments = Assignment::where('teacher_id', $userId)->paginate(10);
        return view('teacher.assignments', ['assignments' => $assignments]);
    }

    public function add_assignment() {
        return view('teacher.add-assignment');
    }

    public function solve_add_assignment(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline_date' => 'required|date',
            'deadline_time' => 'required',
            'ampm' => 'required|in:AM,PM',
            'file' => 'nullable|file|mimes:pdf,txt,doc,docx,zip|max:2048'
        ]);

        $time = $request->deadline_time;
        if ($request->ampm === 'PM') {
            $hour = (int)explode(':', $time)[0];
            if ($hour < 12) $hour += 12;
            $time = $hour . ':' . explode(':', $time)[1];
        }
        
        $deadline = $request->deadline_date . ' ' . $time;

        // Xử lý file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('assignments', 'public');
        }

        Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $deadline,
            'file_path' => $filePath,
            'teacher_id' => Auth::id()
        ]);

        return redirect()->route('teacher.assignments')
        ->with('success', 'Bài tập đã được tạo thành công!');
    }

    public function edit_assignment($id)
    {
        $assignment = Assignment::where('id', $id)
                    ->where('teacher_id', Auth::id())
                    ->firstOrFail();
        
        // Tách deadline thành date, time và AM/PM
        $deadline = \Carbon\Carbon::parse($assignment->deadline);
        $ampm = $deadline->format('H') >= 12 ? 'PM' : 'AM';
        $time = $ampm === 'PM' ? $deadline->subHours(12)->format('H:i') : $deadline->format('H:i');
        
        return view('teacher.edit-assignment', [
            'assignment' => $assignment,
            'deadline_date' => $deadline->format('Y-m-d'),
            'deadline_time' => $time,
            'ampm' => $ampm
        ]);
    }

    public function delete_assignment($id)
    {
        // Sửa thành first() thay vì get() để lấy 1 bản ghi duy nhất
        $assignment = Assignment::where('id', $id)->first();
        
        // Kiểm tra nếu assignment không tồn tại
        if (!$assignment) {
            return redirect('/manage/assignments')->with('error', 'Assignment không tồn tại');
        }

        $file_url = $assignment->file_path;
        $fullPath = storage_path("app/public/" . $file_url);

        // Kiểm tra file tồn tại trước khi xóa
        if (File::exists($fullPath)) {
            File::delete($fullPath);
            
            // Xóa bản ghi trong database (nếu cần)
            $assignment->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'File đã được xóa thành công'
            ]);
        }

        return redirect('/manage/assignments')->with('error', 'File không tồn tại');
    }
    public function update_assignment(Request $request, $id)
    {
        $assignment = Assignment::where('id', $id)
                    ->where('teacher_id', Auth::id())
                    ->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline_date' => 'required|date',
            'deadline_time' => 'required',
            'ampm' => 'required|in:AM,PM',
            'file' => 'nullable|file|mimes:pdf,doc,docx,zip|max:2048'
        ]);

        // Xử lý thời gian deadline
        $time = $request->deadline_time;
        if ($request->ampm === 'PM') {
            $hour = (int)explode(':', $time)[0];
            if ($hour < 12) $hour += 12;
            $time = $hour . ':' . explode(':', $time)[1];
        }
        $deadline = $request->deadline_date . ' ' . $time;

        // Xử lý file upload
        $filePath = $assignment->file_path;
        if ($request->hasFile('file')) {
            // Xóa file cũ nếu có
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('assignments', 'public');
        }

        // Cập nhật assignment
        $assignment->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $deadline,
            'file_path' => $filePath
        ]);

        return redirect()->route('teacher.assignments')
            ->with('success', 'Bài tập đã được cập nhật thành công!');
    }

    public function viewSubmissions($assignmentId)
    {
  
        // Lấy thông tin bài tập và kiểm tra quyền truy cập
        $assignment = Assignment::where('id', $assignmentId)
        ->where('teacher_id', Auth::id())
        ->firstOrFail();

        // Lấy danh sách bài nộp kèm thông tin sinh viên
        $submissions = Submission::with(['student' => function($query) {
            $query->select('id', 'full_name', 'email', 'phone'); // Chỉ lấy các trường cần thiết
        }])
        ->where('assignment_id', $assignment->id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('teacher.view-submissions', compact('assignment', 'submissions'));
    }

    public function view_challenges() {
        $challenges = Challenge::where('teacher_id', Auth::id())->get();
        return view('teacher.challenges', compact('challenges'));
    }

    public function add_challenge() {
        return view('teacher.add-challenge');
    }

    public function delete_challenge($id) {
        $challenges = Challenge::where('id', $id);
        $challenges->delete();
        return redirect()->route('teacher.challenges');
    }

    public function storeChallenge(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện chức năng này');
        }
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'challenge_hint' => 'required|string',
            'file' => 'required|file|mimes:txt|max:2048'
        ]);

        // Xử lý upload file và đọc nội dung
        $filePath = null;
        $fileContent = null;
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Lưu file
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('challenges', $fileName, 'public');
            
            // Đọc nội dung file tùy theo loại file
            $extension = $file->getClientOriginalExtension();
            
            try {
                if ($extension === 'txt') {
                    $fileContent = file_get_contents($file->getRealPath());
                }
            } catch (\Exception $e) {
                // Xử lý lỗi nếu cần
                $fileContent = 'Could not read file content: ' . $e->getMessage();
            }
        }
        // Tạo challenge mới
        Challenge::create([
            'teacher_id' => Auth::id(),
            'challenge_hint' => $validated['challenge_hint'],
            'file_path' => $filePath,
            'file_content' => $fileContent
        ]);

        return redirect()->route('teacher.challenges')->with('success', 'Thêm challenge thành công!');
    }

    public function viewChallengeAttempts($challengeId)
    {
        // Lấy thông tin challenge
        $challenge = Challenge::findOrFail($challengeId);
        
        // Lấy danh sách submissions kèm thông tin sinh viên
        $submissions = ChallengeAttempt::with('student')
            ->where('challenge_id', $challengeId)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('teacher.view-challenge-attempt', [
            'challenge' => $challenge,
            'submissions' => $submissions
        ]);
    }

    public function view_edit_student(Request $request) {
        $id = $request->query('student_id');
        $student = User::where('id', $id)->where('role', 'student')->first();
        return view('teacher.edit-student', ['student' => $student]);
    }

    public function delete_student($id) {
        User::where('id', $id)->delete();
        return redirect()->route('teacher.students');
    }
}
