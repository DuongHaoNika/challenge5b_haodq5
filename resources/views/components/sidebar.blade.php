<aside class="sidebar">
    <div class="sidebar-header">
        @if (Auth::user()->role == 'teacher')
            <h2>Teacher</h2>
        @else
            <h2>Student</h2>
        @endif
    </div>
    <ul class="nav-menu">
        <li><a href="/"><i class="fas fa-home"></i> Trang chủ</a></li>
        <li><a href="/profile/{{ Auth::user()->id }}"><i class="fas fa-user"></i> Hồ sơ</a></li>
        @if (Auth::user()->role == 'teacher')
            <li><a href="/manage/assignments"><i class="fas fa-tasks"></i> Giao bài tập</a></li>
            <li><a href="/manage/challenges"><i class="fas fa-trophy"></i> Challenges</a></li>
            <li><a href="/manage/students"><i class="fas fa-users"></i> Quản lý SV</a></li>
        @else
            <li><a href="/student/assignments"><i class="fas fa-tasks"></i> Do homeworks</a></li>
            <li><a href="/student/challenges"><i class="fas fa-trophy"></i> Do challenges</a></li>
        @endif
        <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
    </ul>
</aside>