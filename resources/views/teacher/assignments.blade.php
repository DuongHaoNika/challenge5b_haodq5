<x-layout>
    <header class="header">
        <h1>Danh sách Bài Tập của Bạn</h1>
        <div class="header-actions">
            <a href="/manage/add-assignment">
                <button class="add-assignment-btn">
                    <i class="fas fa-plus"></i> Thêm bài tập
                </button>
            </a>
        </div>
    </header>

    <!-- Assignments Table -->
    <section class="assignments-table">
        @if($assignments->isEmpty())
            <div class="alert alert-info">Bạn chưa có challenge nào</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>File</th>
                        <th>Deadline</th>
                        <th>Thao tác</th>
                        <th>Submissions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->title }}</td>
                        <td>{{ $assignment->file_path }}</td>
                        <td>{{ $assignment->deadline }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="/manage/edit-assignment/{{ $assignment->id }}">
                                    <button class="small-btn edit-btn">Sửa</button>
                                </a>
                                <a>
                                    <button onclick="deleteAssignment({{ $assignment->id }})" class="small-btn delete-btn">Xóa</button> 
                                </a>
                                 
                            </div>
                        </td>
                        <td><a href="{{ route('teacher.view.assignment', $assignment) }}" class="view-submissions">Xem</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $assignments->links() }}
        @endif
    </section>
</x-layout>

<script>
    function deleteAssignment(id) {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            fetch(`/manage/delete-assignment/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload(); // Reload trang sau khi xóa
                }
            });
        }
    }
</script>