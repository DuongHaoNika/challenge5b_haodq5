<aside class="sidebar">
    <div class="sidebar-header">
        <h2>Giáo Viên</h2>
    </div>
    <ul class="nav-menu">
        <li><a href="/"><i class="fas fa-home"></i> Trang chủ</a></li>
        <li><a href="/profile/{{ Auth::user()->id }}"><i class="fas fa-user"></i> Hồ sơ</a></li>
        <li><a href="/manage/assignments"><i class="fas fa-tasks"></i> Giao bài tập</a></li>
        <li><a href="/manage/challenges"><i class="fas fa-trophy"></i> Challenges</a></li>
        <li><a href="/manage/students"><i class="fas fa-users"></i> Quản lý SV</a></li>
        <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
    </ul>
</aside>