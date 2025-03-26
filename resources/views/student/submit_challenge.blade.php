<x-layout>
    <header class="header">
        <h1>Submit Challenge</h1>
    </header>

    <!-- Challenge Content -->
    <section class="challenge-container">
        <div class="challenge-content">
            <p>Các sinh viên nhanh hoàn thành</p>
        </div>
        
        <!-- Hint Section (ẩn ban đầu) -->
        <div class="hint-section" id="hintSection">
            <div class="hint-content">
                <p>Không có gợi ý</p>
            </div>
        </div>
        
        <button class="hint-btn" id="hintBtn">
            <i class="fas fa-lightbulb"></i> Xem gợi ý
        </button>
        
        <!-- Answer Form -->
        <div class="answer-form">
            <div class="form-group">
                <label>Nhập đáp án:</label>
                <textarea class="answer-input" rows="4"></textarea>
            </div>
            <button class="submit-btn">
                Nộp đáp án
            </button>
        </div>
    </section>
</x-layout>