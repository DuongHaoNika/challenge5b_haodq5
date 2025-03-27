<x-layout>
    <header class="header">
        <h1>Edit Assignment</h1>
    </header>

    <!-- Edit Form -->
    <section class="edit-form">
        <form method="POST" action="{{ route('teacher.update.assignment', ['id' => $assignment->id]) }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title"><strong>Tiêu đề:</strong></label>
                <input value="{{ $assignment->title }}" name="title" type="text" id="title" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="description"><strong>Mô tả:</strong></label>
                <textarea name="description" id="description" class="form-control" rows="3" required>{{ $assignment->description }}</textarea>
            </div>
            
            <div class="divider"></div>
            
            <div class="form-group">
                <label for="deadline"><strong>Deadline:</strong></label>
                <div class="datetime-input">
                    <input value="{{ $deadline_date }}" type="date" name="deadline_date" id="deadline-date" class="form-control" required>
                    <input value="{{ $deadline_time }}" type="time" name="deadline_time" id="deadline-time" class="form-control" required>
                    <select name="ampm" class="form-control ampm-select" required>
                        <option value="AM">AM</option>
                        <option value="PM" selected>PM</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>File đính kèm:</strong></label>
                <div class="file-upload">
                    <label class="file-upload-btn">
                        <input type="file" name="file" id="file-input" style="display: none;">
                        <span class="file-upload-text">Choose File</span>
                        <span class="file-upload-filename">No file chosen</span>
                    </label>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    Tạo bài tập
                </button>
            </div>
        </form>
        
        <script>
        // Hiển thị tên file khi chọn
        document.getElementById('file-input').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
            document.querySelector('.file-upload-filename').textContent = fileName;
        });
        </script>
    </section>
</x-layout>