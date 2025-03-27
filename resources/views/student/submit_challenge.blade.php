<x-layout>
    <header class="header">
        <h1>Submit Challenge {{ $challenge->id }}</h1>
    </header>

    <!-- Challenge Content -->
    <section class="challenge-container">
        <div class="challenge-content">
            <p>Các sinh viên nhanh hoàn thành</p>
        </div>
        
        <!-- Hint Section (ẩn ban đầu) -->
        <div class="hint-section" id="hintSection" style="display: none;">
            <div class="hint-content">
                <p>{{ $challenge->challenge_hint ?? 'Không có gợi ý' }}</p>
            </div>
        </div>
        
        <button class="hint-btn" id="hintBtn" type="button">
            <i class="fas fa-lightbulb"></i> Xem gợi ý
        </button>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('file_content'))
            <div class="file-content-box">
                <h3>Nội dung file:</h3>
                <pre>{{ session('file_content') }}</pre>
            </div>
        @endif
        
        <!-- Answer Form -->
        <form method="POST" action="{{ route('submit.challenge', $challenge->id) }}" class="answer-form">
            @csrf
            <div class="form-group">
                <label>Nhập đáp án:</label>
                <input name="answer" type="text">
            </div>
            <button type="submit" class="submit-btn">
                Nộp đáp án
            </button>
        </form>
    </section>

    <style>
        .challenge-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .hint-section {
            margin: 15px 0;
            padding: 15px;
            background: #f8f9fa;
            border-left: 4px solid #ffc107;
            border-radius: 4px;
        }
        
        .hint-btn {
            background: #ffc107;
            color: #212529;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
        }
        
        .hint-btn:hover {
            background: #e0a800;
        }
        
        .answer-form {
            margin-top: 20px;
        }
        
        .answer-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }
        
        .submit-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .submit-btn:hover {
            background: #218838;
        }

        <style>
        .challenge-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .file-content-box {
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .file-content-box pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        
        .answer-form {
            margin-top: 20px;
        }
        
        .answer-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }
        
        .submit-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .submit-btn:hover {
            background: #218838;
        }
    </style>
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hintBtn = document.getElementById('hintBtn');
            const hintSection = document.getElementById('hintSection');
            
            hintBtn.addEventListener('click', function() {
                if (hintSection.style.display === 'none') {
                    hintSection.style.display = 'block';
                    hintBtn.innerHTML = '<i class="fas fa-lightbulb"></i> Ẩn gợi ý';
                } else {
                    hintSection.style.display = 'none';
                    hintBtn.innerHTML = '<i class="fas fa-lightbulb"></i> Xem gợi ý';
                }
            });
        });
    </script>
</x-layout>