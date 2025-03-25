<x-layout>
    <header class="header">
        <h1>Bài làm của sinh viên</h1>
    </header>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="filter-controls">
            <div class="filter-group">
                <label for="assignment-select">Chọn bài tập:</label>
                <select id="assignment-select" class="form-select">
                    <option>Bài tập 1</option>
                    <option>Bài tập 2</option>
                    <option>Thi giữa kỳ</option>
                </select>
            </div>
            <button class="filter-btn">
                <i class="fas fa-filter"></i> Lọc
            </button>
        </div>
        <div class="divider"></div>
    </section>

    <!-- Submission Detail -->
    <section class="submission-detail">
        <div class="student-info">
            <p><strong>Student:</strong> Dương Quang Hào</p>
            <p><strong>Submitted At:</strong> 2025-03-23 23:55:54</p>
        </div>
        
        <!-- File submission would go here -->
        <div class="submission-content">
            <p>Nội dung bài làm sẽ hiển thị ở đây...</p>
        </div>
        
        <div class="submission-actions">
            <button class="reupload-btn">
                <i class="fas fa-upload"></i> Tải lại bài làm
            </button>
        </div>
    </section>
</x-layout>