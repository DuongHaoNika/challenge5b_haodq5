<x-layout>

    <header class="profile-header">
        <div class="profile-avatar">
            <img src="https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg" alt="Teacher One">
        </div>
        <div class="profile-info">
            <h1>Teacher One</h1>
            <div class="profile-details">
                <p><i class="fas fa-envelope"></i> teacher1@example.com</p>
                <p><i class="fas fa-phone"></i> 0123 456 789</p>
                <p><i class="fas fa-user-tag"></i> Giáo viên</p>
            </div>
            <button class="edit-profile-btn">Chỉnh sửa hồ sơ</button>
        </div>
    </header>

    <section class="comments-section">
        <h2>Bình luận (3)</h2>
        
        <!-- Comment Form -->
        <div class="comment-form">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Your Avatar" class="comment-avatar">
            <form>
                <input type="text" placeholder="Viết bình luận...">
                <button type="submit">Gửi</button>
            </form>
        </div>
        
        <!-- Comments List -->
        <div class="comments-list">
            <!-- Comment 1 -->
            <div class="comment">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Avatar" class="comment-avatar">
                <div class="comment-content">
                    <div class="comment-header">
                        <h4>John Doe</h4>
                        <span class="comment-time">2 giờ trước</span>
                    </div>
                    <p>Giáo viên dạy rất nhiệt tình và dễ hiểu. Cảm ơn thầy vì khóa học bổ ích!</p>
                    <div class="comment-actions">
                        <button class="edit-comment"><i class="fas fa-edit"></i></button>
                        <button class="delete-comment"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            
            <!-- Comment 2 -->
            <div class="comment">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User Avatar" class="comment-avatar">
                <div class="comment-content">
                    <div class="comment-header">
                        <h4>Jane Smith</h4>
                        <span class="comment-time">1 ngày trước</span>
                    </div>
                    <p>Thầy có thể chia sẻ thêm tài liệu về chương 3 được không ạ?</p>
                    <div class="comment-actions">
                        <button class="edit-comment"><i class="fas fa-edit"></i></button>
                        <button class="delete-comment"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            
            <!-- Comment 3 -->
            <div class="comment">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User Avatar" class="comment-avatar">
                <div class="comment-content">
                    <div class="comment-header">
                        <h4>Michael Brown</h4>
                        <span class="comment-time">3 ngày trước</span>
                    </div>
                    <p>Buổi học hôm nay rất thú vị. Mong thầy tiếp tục phát huy!</p>
                    <div class="comment-actions">
                        <button class="edit-comment"><i class="fas fa-edit"></i></button>
                        <button class="delete-comment"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>