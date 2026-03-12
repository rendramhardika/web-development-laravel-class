@extends('layouts.model')

@section('title', 'Model MVC - Dashboard')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>🎓 Course 4: Model pada Arsitektur MVC</h1>
        <p class="subtitle">Memahami Model Layer dalam MVC Pattern dan Penerapannya di Laravel</p>
    </div>

    <div class="info-box">
        <h3>📚 Learning Objectives</h3>
        <ul>
            <li>Memahami peran Model dalam MVC pattern</li>
            <li>Membedakan controller dengan dan tanpa model</li>
            <li>Mengimplementasikan business logic di Model</li>
            <li>Menerapkan validation di Model</li>
            <li>Menguasai 3 cara database interaction di Laravel</li>
            <li>Memahami kapan menggunakan Raw Query, Query Builder, atau Eloquent ORM</li>
        </ul>
    </div>

    <div class="topics-grid">
        <a href="{{ route('model.without-model') }}" class="topic-card">
            <div class="topic-icon">⚠️</div>
            <h3>1. Controller Tanpa Model</h3>
            <p>Menunjukkan anti-pattern ketika semua logic ada di controller</p>
            <span class="badge badge-warning">Anti-Pattern</span>
        </a>

        <a href="{{ route('model.business-logic') }}" class="topic-card">
            <div class="topic-icon">💼</div>
            <h3>2. Model untuk Business Logic</h3>
            <p>Memisahkan business logic ke dalam Model</p>
            <span class="badge badge-success">Best Practice</span>
        </a>

        <a href="{{ route('model.validation') }}" class="topic-card">
            <div class="topic-icon">✅</div>
            <h3>3. Model untuk Validasi</h3>
            <p>Centralized validation menggunakan Model</p>
            <span class="badge badge-info">Validation</span>
        </a>

        <a href="{{ route('model.database-intro') }}" class="topic-card">
            <div class="topic-icon">🗄️</div>
            <h3>4. Intro Database Interaction</h3>
            <p>Overview 3 cara berinteraksi dengan database</p>
            <span class="badge badge-primary">Overview</span>
        </a>

        <a href="{{ route('model.database-setup') }}" class="topic-card">
            <div class="topic-icon">⚙️</div>
            <h3>5. Setup Database Connection</h3>
            <p>Konfigurasi koneksi database di Laravel</p>
            <span class="badge badge-secondary">Configuration</span>
        </a>

        <a href="{{ route('model.raw-query') }}" class="topic-card">
            <div class="topic-icon">📝</div>
            <h3>6. Raw Query (DB Facade)</h3>
            <p>Database interaction dengan raw SQL</p>
            <span class="badge badge-danger">SQL</span>
        </a>

        <a href="{{ route('model.query-builder') }}" class="topic-card">
            <div class="topic-icon">🔧</div>
            <h3>7. Query Builder</h3>
            <p>Database interaction dengan Query Builder API</p>
            <span class="badge badge-warning">API</span>
        </a>

        <a href="{{ route('model.eloquent-orm') }}" class="topic-card">
            <div class="topic-icon">🚀</div>
            <h3>8. Eloquent ORM</h3>
            <p>Database interaction dengan Object Relational Mapping</p>
            <span class="badge badge-success">ORM</span>
        </a>
    </div>

    <div class="navigation-footer">
        <a href="/" class="btn btn-secondary">← Back to Home</a>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .header-section {
        text-align: center;
        margin-bottom: 40px;
        padding: 30px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
    }

    .header-section h1 {
        margin: 0 0 10px 0;
        font-size: 2.5em;
    }

    .subtitle {
        font-size: 1.2em;
        opacity: 0.9;
        margin: 0;
    }

    .info-box {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 40px;
        border-left: 4px solid #667eea;
    }

    .info-box h3 {
        margin-top: 0;
        color: #667eea;
    }

    .info-box ul {
        margin: 15px 0 0 0;
        padding-left: 20px;
    }

    .info-box li {
        margin: 8px 0;
        line-height: 1.6;
    }

    .topics-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .topic-card {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .topic-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        border-color: #667eea;
    }

    .topic-icon {
        font-size: 3em;
        margin-bottom: 15px;
    }

    .topic-card h3 {
        margin: 0 0 10px 0;
        color: #333;
        font-size: 1.2em;
    }

    .topic-card p {
        color: #666;
        margin: 0 0 15px 0;
        line-height: 1.5;
    }

    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85em;
        font-weight: 600;
    }

    .badge-warning {
        background: #ffc107;
        color: #000;
    }

    .badge-success {
        background: #28a745;
        color: white;
    }

    .badge-info {
        background: #17a2b8;
        color: white;
    }

    .badge-primary {
        background: #007bff;
        color: white;
    }

    .badge-secondary {
        background: #6c757d;
        color: white;
    }

    .badge-danger {
        background: #dc3545;
        color: white;
    }

    .navigation-footer {
        text-align: center;
        margin-top: 40px;
    }

    .btn {
        display: inline-block;
        padding: 12px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }
</style>
@endsection
