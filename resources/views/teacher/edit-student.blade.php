<x-layout>
    <header class="header">
        <h1>Chỉnh sửa thông tin sinh viên</h1>
    </header>

    <!-- Edit Form -->
    <section class="edit-form">
        <form method="POST" action="{{ route('teacher.update.student', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <!-- Avatar Upload -->
                <div class="avatar-upload">
                    <div class="avatar-preview">
                        <img id="avatarPreview" src="{{ $student->avatar ? asset('storage/'.$student->avatar) : asset('images/default-avatar.jpg') }}" alt="Avatar">
                    </div>
                    <div class="avatar-upload-controls">
                        <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display: none;">
                        <label for="avatarInput" class="upload-btn">
                            <i class="fas fa-camera"></i> Chọn ảnh
                        </label>
                        <button type="button" class="remove-btn" id="removeAvatar">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </div>
                </div>
                
                <!-- Student Info -->
                <div class="student-info">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Họ và tên</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="window.history.back()">
                    <i class="fas fa-times"></i> Hủy
                </button>
                <button type="submit" class="save-btn">
                    <i class="fas fa-save"></i> Lưu thay đổi
                </button>
            </div>
        </form>
    </section>
</x-layout>