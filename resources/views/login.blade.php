<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite("resources/css/app.css")
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h1><i class="fas fa-user-graduate"></i> Đăng nhập</h1>
                <p>Hệ thống quản lý học tập</p>
            </div>
            
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Tên đăng nhập</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Nhập username" required>
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Mật khẩu</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                    </label>
                    <a href="#" class="forgot-password">Quên mật khẩu?</a>
                </div>
                
                @error('login_error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Đăng nhập
                </button>
            </form>
        </div>
    </div>
</body>
</html>