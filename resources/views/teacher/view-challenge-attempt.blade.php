<x-layout>
    <h2>Danh sách sinh viên đã nộp bài: {{ $challenge->id }}</h2>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sinh viên</th>
                    <th>Thời gian nộp</th>
                    <th>Answer</th>
                    <th>AC/WA</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $index => $submission)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $submission->student->full_name }}</td>
                    <td>{{ $submission->created_at }}</td>
                    <td>{{ $submission->submitted_answer }}</td>
                    @if ( $submission->is_correct)
                        <td><span class="status submitted">AC</span></td>
                    @else
                        <td><span class="status pending">WA</span></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>