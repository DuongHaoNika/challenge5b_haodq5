<x-layout>
    <header class="header">
        <h1>Nộp Bài Tập: {{ $assignment->title }}</h1>
    </header>

    <!-- Submission Form -->
    <section class="submission-form">
        <form method="POST" action="{{ route('submit.assignment', $assignment->id) }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label><strong>Chọn file bài làm:</strong></label>
                <div class="file-upload-box">
                    <label class="file-upload-label">
                        <input type="file" name="assignment_file" class="file-input" accept=".txt,.pdf,.docx" hidden required>
                        <span class="file-upload-btn">Chọn File</span>
                        <span class="file-upload-name">Chưa có file nào được chọn</span>
                    </label>
                    <small class="file-hint">(Chỉ chấp nhận file .txt, .pdf, .docx, tối đa 10MB)</small>
                    @error('assignment_file')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
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

    <style>
        .submission-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .file-upload-box {
            margin-top: 10px;
        }
        
        .file-upload-label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .file-upload-btn {
            padding: 8px 16px;
            background: #4CAF50;
            color: white;
            border-radius: 4px;
            margin-right: 10px;
            transition: background 0.3s;
        }
        
        .file-upload-btn:hover {
            background: #3e8e41;
        }
        
        .file-upload-name {
            color: #555;
        }
        
        .file-hint {
            display: block;
            margin-top: 5px;
            color: #666;
            font-size: 0.85em;
        }
        
        .divider {
            height: 1px;
            background: #eee;
            margin: 20px 0;
        }
        
        .submit-btn {
            padding: 10px 20px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .submit-btn:hover {
            background: #0b7dda;
        }
        
        .error-message {
            color: #f44336;
            margin-top: 5px;
            font-size: 0.85em;
        }
    </style>
    
    <script>
        document.querySelector('.file-input').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Chưa có file nào được chọn';
            document.querySelector('.file-upload-name').textContent = fileName;
        });
    </script>
</x-layout>