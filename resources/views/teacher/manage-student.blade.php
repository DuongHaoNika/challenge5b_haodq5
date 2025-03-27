<x-layout>
    <header class="header">
        <h1>Quản lý sinh viên</h1>
        <div class="header-actions">
            {{-- <div class="search-box">
                <input type="text" placeholder="Tìm kiếm sinh viên...">
                <button><i class="fas fa-search"></i></button>
            </div> --}}
        </div>
    </header>
    
    <section class="students-table">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Hồ sơ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $index => $student)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone ?? 'Chưa cập nhật' }}</td>
                    <td>
                        <a href="{{ route('profile', $student->id) }}" class="profile-link">
                            <i class="fas fa-user-circle"></i> Xem hồ sơ
                        </a>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('profile.edit', $student->id) }}" class="small-btn edit-btn">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('teacher.delete.student', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="small-btn delete-btn" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                                    <i class="fas fa-trash-alt"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($students->isEmpty())
        <div class="alert alert-info mt-3">
            <i class="fas fa-info-circle"></i> Không có sinh viên nào trong hệ thống
        </div>
        @endif
        
        <!-- Phân trang nếu có -->
        @if($students->hasPages())
        <div class="mt-3">
            {{ $students->links() }}
        </div>
        @endif
    </section>
</x-layout>