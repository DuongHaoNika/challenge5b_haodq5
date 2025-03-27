<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function profile($id) {
        $user = User::find($id);
        $messages = Message::with('sender') 
        ->where('receiver_id', $user->id)
        ->orderBy('created_at', 'desc') 
        ->get();
        return view('profile', compact('user', 'messages'));
    }

    public function get_edit_profile($id){
        $user = User::find($id);
        return view('edit-profile', compact('user'));
    }

    public function comment(Request $request) {
        $request->validate([
            'content' => 'required',
            'profile_id' => 'required|exists:users,id'
        ]);
    
        Message::create([
            'receiver_id' => $request->profile_id,
            'sender_id' => Auth::id(),
            'content' => $request->content
        ]);
    
        return back()->with('success', 'Gửi tin nhắn thành công');
    }

    public function updateComment(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Tìm comment
        $comment = Message::findOrFail($id);

        // Kiểm tra quyền chỉnh sửa (chỉ người gửi mới được sửa)
        if (Auth::id() !== $comment->sender_id) {
            return back()->with('error', 'Bạn không có quyền chỉnh sửa bình luận này');
        }

        // Cập nhật nội dung và thời gian
        $comment->update([
            'content' => $validated['content'],
            'updated_at' => now() // Cập nhật thời gian sửa đổi
        ]);

        // Trả về redirect với thông báo thành công
        return back()->with([
            'success' => 'Cập nhật bình luận thành công'
        ]);
    }

    public function deleteComment($id){
        $comment = Message::findOrFail($id);
    
        // Kiểm tra quyền
        if (Auth::id() !== $comment->sender_id) {
            return back()->with('error', 'Bạn không có quyền xóa bình luận này');
        }

        $comment->delete();
        
        return back()->with('success', 'Bình luận đã được xóa');
    }

    public function update(Request $request, $id)
    {
        // Cách đúng để lấy user hiện tại
        $user = User::where('id', $id)->first();
        if((Auth::id() == $user->id) || (Auth::user()->role == 'teacher' && $user->role == 'student')){
            $request->validate([
                'phone' => 'nullable|string|max:20',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'avatar_url' => 'nullable|url'
            ]);
    
            if ($request->hasFile('avatar')) {
                // Xóa avatar cũ nếu tồn tại
                if ($user->avatar && file_exists(public_path($user->avatar))) {
                    unlink(public_path($user->avatar));
                }
        
                // Tạo thư mục nếu chưa tồn tại
                if (!file_exists(public_path('uploads/avatars'))) {
                    mkdir(public_path('uploads/avatars'), 0777, true);
                }
        
                // Lưu avatar mới vào public/uploads/avatars
                $file = $request->file('avatar');
                $fileName = time().'_'.Str::random(10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/avatars'), $fileName);
                $user->avatar = '/uploads/avatars/'.$fileName;
            } elseif ($request->filled('avatar_url')) {
                // Sử dụng URL avatar
                $user->avatar = $request->avatar_url;
            }
    
            // Cập nhật thông tin
            $user->phone = $request->phone;
            $user->save(); 
    
            return redirect()->route('profile', $user->id)->with('success', 'Cập nhật thông tin thành công!');
        }

        return redirect('/');
    }

    public function view_login() {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Attempt to find user by username
        $user = User::where('username', $request->username)->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withInput($request->except('password'))
                ->withErrors(['login_error' => 'Tên đăng nhập hoặc mật khẩu không chính xác']);
        }

        // Attempt to log the user in
        $remember = $request->has('remember');
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
            // Authentication passed
            return redirect()->intended('/');
        }

        // If authentication fails
        return redirect()->back()
            ->withInput($request->except('password'))
            ->withErrors(['login_error' => 'Đăng nhập thất bại']);
    }

    public function logout(Request $request)
    {
        $cookies = $request->cookies->all();
        foreach ($cookies as $name => $value) {
            Cookie::queue(Cookie::forget($name));
        }

        // Thực hiện logout
        Auth::logout();
        
        // Hủy session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('status', 'Bạn đã đăng xuất thành công');
    }
}
