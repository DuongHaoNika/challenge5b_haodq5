<x-layout>
    <h2>Danh sách sinh viên đã nộp bài: {{ $assignment->title }}</h2>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sinh viên</th>
                    <th>Email</th>
                    <th>Thời gian nộp</th>
                    <th>File nộp</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $index => $submission)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $submission->student->full_name }}</td>
                    <td>{{ $submission->student->email }}</td>
                    <td>{{ $submission->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ Storage::url($submission->file_path) }}" target="_blank">
                            Xem file
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Chấm điểm</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($submissions->isEmpty())
        <div class="alert alert-info">Chưa có sinh viên nào nộp bài.</div>
        @endif
    </div>
</x-layout>