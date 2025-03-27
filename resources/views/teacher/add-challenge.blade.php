<x-layout>
    <header class="header">
        <h1>Add Chalenge</h1>
    </header>

    <!-- Edit Form -->
    <section class="edit-form">
        <form method="POST" action="{{ route('teacher.store.challenge') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title"><strong>Hint</strong></label>
                <input name="challenge_hint" type="text" id="title" class="form-control" required>
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
                    Tạo challenge
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