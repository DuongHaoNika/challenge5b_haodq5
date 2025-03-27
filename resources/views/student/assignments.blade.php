<x-layout>
    <header class="header">
        <h1>Bài tập của tôi</h1>
    </header>

    <!-- Assignments Table -->
    <section class="assignments-table">
        <table>
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Deadline</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->title }}</td>
                        <td>{{ $assignment->description }}</td>
                        <td>{{ $assignment->deadline ? $assignment->deadline : 'Không có deadline' }}</td>
                        <td>
                            @if($assignment->submission_id)
                                <span class="status submitted">Đã nộp</span>
                            @else
                                <span class="status pending">Chưa nộp</span>
                            @endif
                        </td>
                        <td class="actions">
                            @if($assignment->submission_id)
                                <a href="" class="view-btn">Xem lại</a>
                            @else
                                <a href="{{ route('submit.assignment', $assignment->id) }}" class="submit-btn">Nộp bài</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>