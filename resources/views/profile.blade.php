<x-layout>
    <header class="profile-header">
        <div class="profile-avatar">
            <img src="{{ $user->avatar ?? 'https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg' }}" alt="{{ $user->full_name }}" onerror="this.src='https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg'">
        </div>
        <div class="profile-info">
            <h1>{{ $user->full_name }}</h1>
            <div class="profile-details">
                <p><i class="fas fa-envelope"></i> {{ $user->email }}</p>
                <p><i class="fas fa-phone"></i> {{ $user->phone ?? 'Chưa cập nhật' }}</p>
                <p><i class="fas fa-user-tag"></i> {{ $user->role == 'teacher' ? 'Giáo viên' : 'Học sinh' }}</p>
            </div>
            @if(Auth::id() == $user->id || ($user->role == 'student' && Auth::user()->role == 'teacher'))
                <a href="{{ route('profile.edit', $user->id) }}" class="edit-profile-btn">Chỉnh sửa hồ sơ</a>
            @endif
        </div>
    </header>

    
    <section class="comments-section">
        <h2>Bình luận ({{ $messages->count() }})</h2>
        
        <!-- Comment Form -->
        @auth
        <div class="comment-form">
            <img src="{{ Auth::user()->avatar ?? 'https://randomuser.me/api/portraits/women/44.jpg' }}" alt="Your Avatar" class="comment-avatar">
            <form method="POST" action="{{ route('comment') }}">
                @csrf
                <input type="text" name="profile_id" value="{{ $user->id }}" hidden>
                <input type="text" name="content" placeholder="Viết bình luận..." required>
                <button type="submit">Gửi</button>
            </form>
        </div>
        @endauth
        
        <!-- Comments List -->
        <div class="comments-list">
            @forelse($messages as $comment)
            <div class="comment" id="comment-{{ $comment->id }}">
                <img src="{{ $comment->sender->avatar ?? 'https://randomuser.me/api/portraits/men/32.jpg' }}" alt="User Avatar" class="comment-avatar">
                <div class="comment-content">
                    <div class="comment-header">
                        <h4>{{ $comment->sender->full_name }}</h4>
                    </div>
                    
                    <!-- Phần hiển thị nội dung bình luận -->
                    <div class="comment-text">
                        <p>{{ $comment->content }}</p>
                    </div>
                    
                    <!-- Phần form chỉnh sửa (ẩn ban đầu) -->
                    <form method="post" action="{{ route('updateComment', $comment->id) }}">
                        @method("PUT")
                        @csrf
                        <div class="edit-comment-form" style="display: none;">
                            <textarea name="content" class="edit-comment-textarea">{{ $comment->content }}</textarea>
                            <div class="edit-comment-buttons">
                                <button class="cancel-edit-comment">Hủy</button>
                                <button type="submit" class="apply-edit-comment" data-comment-id="{{ $comment->id }}">Áp dụng</button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="comment-footer">
                        @if(Auth::id() == $comment->sender_id)
                            <div class="comment-actions">
                                <button class="edit-comment-btn" data-comment-id="{{ $comment->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <form method="POST" action="{{ route('delete.comment', $comment->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-comment-btn" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                        <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @empty
            <p class="no-comments">Chưa có bình luận nào</p>
            @endforelse
        </div>
    </section>
    <style>
        .profile-header {
            display: flex;
            gap: 2rem;
            align-items: center;
            padding: 2rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #3498db;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h1 {
            font-size: 2rem;
            margin: 0 0 1rem 0;
            color: #2c3e50;
        }

        .profile-details {
            margin-bottom: 1.5rem;
        }

        .profile-details p {
            margin: 0.5rem 0;
            color: #555;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .profile-details i {
            width: 20px;
            color: #3498db;
        }

        .edit-profile-btn {
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .edit-profile-btn:hover {
            background-color: #2980b9;
        }

        .comments-section {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .comments-section h2 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        .comment-form {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            align-items: center;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-form form {
            flex: 1;
            display: flex;
            gap: 1rem;
        }

        .comment-form input {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .comment-form button {
            padding: 0 1.5rem;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .comment-header h4 {
            margin: 0;
            color: #2c3e50;
        }

        .comment-time {
            color: #7f8c8d;
            font-size: 0.875rem;
        }

        .comment-actions {
            margin-top: 0.5rem;
            display: flex;
            gap: 0.5rem;
        }

        .edit-comment, .delete-comment {
            background: none;
            border: none;
            color: #7f8c8d;
            cursor: pointer;
            padding: 0.25rem;
        }

        .edit-comment:hover {
            color: #3498db;
        }

        .delete-comment:hover {
            color: #e74c3c;
        }

        .no-comments {
            color: #7f8c8d;
            text-align: center;
            padding: 1rem;
        }

        .edit-comment-form {
            margin-top: 10px;
        }
        
        .edit-comment-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            min-height: 80px;
            margin-bottom: 10px;
        }
        
        .edit-comment-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .edit-comment-buttons button {
            padding: 5px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .cancel-edit-comment {
            background: #f5f5f5;
            border: 1px solid #ddd;
        }
        
        .apply-edit-comment {
            background: #3498db;
            color: white;
            border: none;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-details {
                justify-content: center;
            }
            
            .comment-form {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .comment-form form {
                width: 100%;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Xử lý sự kiện click nút chỉnh sửa
            document.querySelectorAll('.edit-comment-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation(); // Ngăn sự kiện nổi bọt
                    const commentId = this.getAttribute('data-comment-id');
                    const commentElement = document.querySelector(`#comment-${commentId}`);
                    
                    // Ẩn tất cả các form chỉnh sửa khác trước
                    document.querySelectorAll('.edit-comment-form').forEach(form => {
                        form.style.display = 'none';
                    });
                    
                    // Hiển thị tất cả các nội dung comment khác
                    document.querySelectorAll('.comment-text').forEach(text => {
                        text.style.display = 'block';
                    });
                    
                    // Ẩn nội dung cũ, hiển thị form chỉnh sửa của comment này
                    commentElement.querySelector('.comment-text').style.display = 'none';
                    commentElement.querySelector('.edit-comment-form').style.display = 'block';
                });
            });
            
            // Xử lý sự kiện click nút hủy
            document.querySelectorAll('.cancel-edit-comment').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const commentElement = this.closest('.comment');
                    
                    // Ẩn form chỉnh sửa, hiển thị nội dung cũ
                    commentElement.querySelector('.comment-text').style.display = 'block';
                    commentElement.querySelector('.edit-comment-form').style.display = 'none';
                });
            });
            
        });
        
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa bình luận này?');
        }
        
    </script>
</x-layout>