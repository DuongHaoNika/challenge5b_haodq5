<x-layout>
    <header class="header">
        <h1>Challenges</h1>
        <div class="header-actions">
            <a href="/manage/add-challenge">
                <button class="add-student-btn">
                    <i class="fas fa-plus"></i> Thêm Challenge
                </button>
            </a>
        </div>
    </header>
    <section class="students-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File path</th>
                    <th>Submissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($challenges as $challenge)
                    <tr>
                        <td>{{ $challenge->id }}</td>
                        <td>{{ $challenge->file_path }}</td>
                        <td><a href="{{ route('teacher.view.attempt', $challenge->id) }}" class="profile-link">Xem</a></td>
                        <td>
                            <div class="action-buttons">
                                <form action="{{ route('teacher.delete.challenge', $challenge->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="small-btn delete-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        Xóa
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>