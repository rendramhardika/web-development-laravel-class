@extends('layouts.frontend')

@section('title', 'Frontend Dashboard - Laravel Blade Practice')

@section('header-title', '🏠 Frontend Dashboard')
@section('header-subtitle', 'Course 3: Laravel Blade Template Practice')

@section('breadcrumb')
    <div class="breadcrumb">
        <a href="/frontend/dashboard">Frontend</a> / Dashboard
    </div>
@endsection

@section('content')
    <div class="content-section">
        <h2>Selamat Datang di Course 3: Frontend Development</h2>
        <p>Course ini akan mempelajari Laravel Blade Template sebagai bagian dari arsitektur MVC pattern.</p>
        
        <div class="alert alert-info">
            <strong>🎯 Learning Objectives:</strong>
            <ul>
                <li>Memahami arsitektur frontend dalam MVC pattern</li>
                <li>Menguasai Laravel Blade Template syntax</li>
                <li>Implement layout & yield system</li>
                <li>Menggunakan Blade directives efficiently</li>
                <li>Menggabungkan JavaScript dengan Blade template</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>📚 Materi yang Akan Dipelajari</h2>
        <div class="grid">
            <div class="card">
                <h3>🏗️ Arsitektur Frontend MVC</h3>
                <p>Memahami peran view dalam MVC pattern dan separation of concerns antara logic dan presentation.</p>
                <a href="/frontend/architecture" class="btn">Mulai Belajar</a>
            </div>

            <div class="card">
                <h3>📝 Blade Template Basic</h3>
                <p>Belajar Blade syntax dasar, variable display, escaping, dan data passing dari controller ke view.</p>
                <a href="/frontend/blade-basic" class="btn">Mulai Belajar</a>
            </div>

            <div class="card">
                <h3>🎨 Layout & Yield System</h3>
                <p>Membuat reusable layout dengan YIELD dan SECTION untuk template inheritance.</p>
                <a href="/frontend/layouts" class="btn">Mulai Belajar</a>
            </div>

            <div class="card">
                <h3>🧩 Section & Include</h3>
                <p>Organisir view components dengan SECTION dan INCLUDE untuk modular development.</p>
                <a href="/frontend/sections" class="btn">Mulai Belajar</a>
            </div>

            <div class="card">
                <h3>🔀 Blade Directives</h3>
                <p>Master control structures seperti IF, FOREACH, dan lainnya untuk logic rendering.</p>
                <a href="/frontend/directives" class="btn">Mulai Belajar</a>
            </div>

            <div class="card">
                <h3>🚀 Advanced Blade Features</h3>
                <p>Pelajari AUTH, CSRF, METHOD, custom directives, dan integrasi JavaScript.</p>
                <a href="/frontend/advanced" class="btn">Mulai Belajar</a>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎯 Learning Path</h2>
        <div class="demo-section">
            <h3>Recommended Learning Order:</h3>
            <ol>
                <li><strong>Architecture</strong> - Pahami konsep dasar MVC</li>
                <li><strong>Blade Basic</strong> - Learn syntax fundamental</li>
                <li><strong>Layouts</strong> - Master template inheritance</li>
                <li><strong>Sections</strong> - Build modular components</li>
                <li><strong>Directives</strong> - Implement control structures</li>
                <li><strong>Advanced</strong> - Explore advanced features</li>
            </ol>
        </div>
    </div>

    <div class="content-section">
        <h2>🛠️ Prerequisites</h2>
        <div class="alert alert-warning">
            <p>Sebelum memulai course ini, pastikan Anda sudah memahami:</p>
            <ul>
                <li><strong>Course 1:</strong> Basic MVC Pattern (WebProgrammingController)</li>
                <li><strong>Course 2:</strong> Advanced Input Handling (DataHandlingController)</li>
                <li>HTML, CSS, dan JavaScript basics</li>
                <li>PHP fundamentals</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>📱 Quick Access</h2>
        <div class="demo-section">
            <h3>All Frontend Practice URLs:</h3>
            <div class="grid">
                <div>
                    <strong>Navigation:</strong><br>
                    <a href="/frontend/dashboard">Dashboard</a><br>
                    <a href="/frontend/architecture">Architecture</a><br>
                    <a href="/frontend/blade-basic">Blade Basic</a>
                </div>
                <div>
                    <strong>Template Features:</strong><br>
                    <a href="/frontend/layouts">Layouts</a><br>
                    <a href="/frontend/sections">Sections</a><br>
                    <a href="/frontend/directives">Directives</a>
                </div>
                <div>
                    <strong>Advanced:</strong><br>
                    <a href="/frontend/advanced">Advanced Features</a><br>
                    <a href="/practice/dashboard">Data Handling</a><br>
                    <a href="/web-programming">Web Programming</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
// Add some interactivity to the dashboard
document.addEventListener('DOMContentLoaded', function() {
    // Animate cards on hover
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(-5px) scale(1)';
        });
    });
});
</script>
@endsection
