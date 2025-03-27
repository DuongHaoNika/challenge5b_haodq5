<x-layout>
    <section class="tools-section">
        <h2>Tools</h2>
        <div class="tools-grid">
            @if (Auth::user()->role == 'teacher')
                <a href="/manage/assignments">
                    <div class="tool-card"> 
                        <i class="fas fa-tasks"></i>
                        <h3>Giao bài tập</h3>
                    </div>
                </a>
                <a href="/manage/students">
                    <div class="tool-card"> 
                        <i class="fas fa-users"></i>
                        <h3>Quản lý SV</h3>
                    </div>
                </a>
                <a href="/manage/challenges">
                    <div class="tool-card">
                        <i class="fas fa-trophy"></i>
                        <h3>Challenges</h3>
                    </div>
                </a>
            @else
                <a href="{{ route('student.assignment') }}">
                    <div class="tool-card"> 
                        <i class="fas fa-tasks"></i>
                        <h3>Do homeworks</h3>
                    </div>
                </a>
                <a href="{{ route('student.challenge') }}">
                    <div class="tool-card">
                        <i class="fas fa-trophy"></i>
                        <h3>Do challenges</h3>
                    </div>
                </a>
            @endif
            
        </div>
    </section>
</x-layout>