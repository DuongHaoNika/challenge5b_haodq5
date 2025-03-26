<x-layout>
    <header class="header">
        <h1>Nộp Bài Tập</h1>
    </header>

    <!-- Submission Form -->
    <section class="submission-form">
        <form>
            <div class="form-group">
                <label><strong>Chọn file bài làm:</strong></label>
                <div class="file-upload-box">
                    <label class="file-upload-label">
                        <input type="file" class="file-input" hidden>
                        <span class="file-upload-btn">Choose File</span>
                        <span class="file-upload-name">No file chosen</span>
                    </label>
                </div>
            </div>
            
            <div class="divider"></div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    Nộp Bài
                </button>
            </div>
        </form>
    </section>
</x-layout>