<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index() {
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
            return redirect()->intended('/dashboard');
        }

        // If authentication fails
        return redirect()->back()
            ->withInput($request->except('password'))
            ->withErrors(['login_error' => 'Đăng nhập thất bại']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
