<x-layout>
    <div class="edit-profile-container">
        <h1 class="page-title">Cập nhật thông tin: {{ $user->full_name }}</h1>
        
        <form action="{{ route('profile.edit', $user->id) }}" method="POST" enctype="multipart/form-data" class="profile-form">
            @csrf
            @method('PUT')

            <!-- Email Field (readonly) -->
            <div class="form-group">
                <label for="email"><strong>Email:</strong></label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" readonly>
            </div>

            <!-- Phone Field -->
            <div class="form-group">
                <label for="phone"><strong>Số điện thoại:</strong></label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Avatar Upload -->
            <div class="form-group">
                <label for="avatar"><strong>Avatar Upload File:</strong></label>
                <div class="file-upload-wrapper">
                    <input type="file" id="avatar" name="avatar" class="file-upload">
                    <label for="avatar" class="file-upload-label">
                        <span id="file-name">Choose file</span>
                        <span class="browse-btn">Browse</span>
                    </label>
                    @error('avatar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Avatar URL -->
            <div class="form-group">
                <label for="avatar_url"><strong>Avatar URL:</strong></label>
                <input type="text" id="avatar_url" name="avatar_url" 
                       class="form-control" placeholder="Nhập URL nếu không upload file">
                @error('avatar_url')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Current Avatar Preview -->
            @if($user->avatar)
            <div class="form-group">
                <label>Ảnh đại diện hiện tại:</label>
                <img src="{{ $user->avatar }}" alt="Current Avatar" class="current-avatar" 
                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=random'">
            </div>
            @endif

            <!-- Submit Button -->
            <div class="form-actions">
                <button type="submit" class="submit-btn">Cập nhật hồ sơ</button>
            </div>
        </form>
    </div>

    <style>
        .edit-profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: normal;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .file-upload-wrapper {
            position: relative;
            margin-bottom: 1rem;
        }

        .file-upload {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 0.75rem;
            background: #f9f9f9;
        }

        #file-name {
            flex: 1;
            color: #555;
        }

        .browse-btn {
            padding: 0.25rem 0.75rem;
            background: #3498db;
            color: white;
            border-radius: 3px;
            font-size: 0.875rem;
        }

        .avatar-preview-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .current-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Hình tròn */
            object-fit: cover; /* Đảm bảo ảnh không bị méo */
            border: 3px solid #3498db; /* Viền màu xanh */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Đổ bóng nhẹ */
        }

        .form-actions {
            margin-top: 2rem;
            text-align: center;
        }

        .submit-btn {
            padding: 0.75rem 2rem;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .edit-profile-container {
                padding: 1rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hiển thị tên file khi chọn file upload
            document.getElementById('avatar').addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
                document.getElementById('file-name').textContent = fileName;
            });

            // Xử lý khi nhập URL thì xóa file đã chọn
            document.getElementById('avatar_url').addEventListener('input', function() {
                if (this.value) {
                    document.getElementById('avatar').value = '';
                    document.getElementById('file-name').textContent = 'Choose file';
                }
            });
        });
    </script>
</x-layout>