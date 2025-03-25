<x-layout>
    <header class="header">
        <h1>Add Assignment</h1>
    </header>

    <!-- Edit Form -->
    <section class="edit-form">
        <form>
            <div class="form-group">
                <label for="title"><strong>Tiêu đề:</strong></label>
                <input type="text" id="title" class="form-control" value="Thi giữa kỳ">
            </div>
            
            <div class="form-group">
                <label for="description"><strong>Goi y</strong></label>
                <textarea id="description" class="form-control" rows="3">20% điểm thành phần</textarea>
            </div>
            
            <div class="divider"></div>
            
            <div class="form-group">
                <label><strong>File:</strong></label>
                <div class="file-upload">
                    <label class="file-upload-btn">
                        <input type="file" style="display: none;">
                        <span class="file-upload-text">Choose File</span>
                        <span class="file-upload-filename">No file chosen</span>
                    </label>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    Add
                </button>
            </div>
        </form>
    </section>
</x-layout>