@extends('layouts.model')

@section('title', 'Intro Database Interaction')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>🗄️ Intro Database Interaction</h1>
        <p class="subtitle">Overview 3 cara berinteraksi dengan database di Laravel</p>
    </div>

    <div class="content-section">
        <h2>🎯 3 Cara Database Interaction di Laravel</h2>
        <p>Laravel menyediakan 3 cara untuk berinteraksi dengan database, masing-masing dengan kelebihan dan kekurangannya:</p>
    </div>

    <div class="methods-grid">
        <div class="method-card">
            <div class="method-header raw">
                <div class="method-icon">📝</div>
                <h3>1. Raw Query (DB Facade)</h3>
            </div>
            <div class="method-body">
                <h4>Deskripsi:</h4>
                <p>Menulis SQL query secara langsung menggunakan DB facade</p>
                
                <h4>Contoh:</h4>
                <pre><code>{{ $rawQueryExample }}</code></pre>
                
                <h4>Kelebihan:</h4>
                <ul>
                    <li>Full control atas SQL query</li>
                    <li>Optimal untuk complex queries</li>
                    <li>Performance terbaik untuk query spesifik</li>
                    <li>Bisa menggunakan semua fitur SQL</li>
                </ul>
                
                <h4>Kekurangan:</h4>
                <ul>
                    <li>Rawan SQL injection jika tidak hati-hati</li>
                    <li>Database-specific (tidak portable)</li>
                    <li>Lebih sulit di-maintain</li>
                    <li>Tidak ada IDE autocomplete</li>
                </ul>
                
                <h4>Kapan Digunakan:</h4>
                <ul>
                    <li>Complex queries dengan joins/subqueries</li>
                    <li>Performance-critical operations</li>
                    <li>Database-specific features</li>
                </ul>
            </div>
        </div>

        <div class="method-card">
            <div class="method-header builder">
                <div class="method-icon">🔧</div>
                <h3>2. Query Builder</h3>
            </div>
            <div class="method-body">
                <h4>Deskripsi:</h4>
                <p>Menggunakan fluent interface untuk membangun query</p>
                
                <h4>Contoh:</h4>
                <pre><code>{{ $queryBuilderExample }}</code></pre>
                
                <h4>Kelebihan:</h4>
                <ul>
                    <li>Lebih aman dari SQL injection</li>
                    <li>Database-agnostic (portable)</li>
                    <li>Method chaining yang clean</li>
                    <li>IDE autocomplete support</li>
                </ul>
                
                <h4>Kekurangan:</h4>
                <ul>
                    <li>Tidak se-flexible raw query</li>
                    <li>Sedikit overhead dibanding raw query</li>
                    <li>Beberapa complex query sulit diimplementasikan</li>
                </ul>
                
                <h4>Kapan Digunakan:</h4>
                <ul>
                    <li>CRUD operations standar</li>
                    <li>Query dengan filtering/sorting</li>
                    <li>Ketika tidak butuh model features</li>
                </ul>
            </div>
        </div>

        <div class="method-card">
            <div class="method-header orm">
                <div class="method-icon">🚀</div>
                <h3>3. Eloquent ORM</h3>
            </div>
            <div class="method-body">
                <h4>Deskripsi:</h4>
                <p>Object-Relational Mapping dengan Active Record pattern</p>
                
                <h4>Contoh:</h4>
                <pre><code>{{ $eloquentExample }}</code></pre>
                
                <h4>Kelebihan:</h4>
                <ul>
                    <li>Paling mudah dan intuitif</li>
                    <li>Relationships management</li>
                    <li>Accessors, Mutators, Scopes</li>
                    <li>Events & Observers</li>
                    <li>Soft deletes, timestamps otomatis</li>
                </ul>
                
                <h4>Kekurangan:</h4>
                <ul>
                    <li>Overhead paling besar</li>
                    <li>N+1 query problem jika tidak hati-hati</li>
                    <li>Learning curve untuk advanced features</li>
                </ul>
                
                <h4>Kapan Digunakan:</h4>
                <ul>
                    <li>Standard CRUD operations</li>
                    <li>Ketika butuh relationships</li>
                    <li>Ketika butuh model features</li>
                    <li>Rapid application development</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="comparison-section">
        <h3>⚖️ Comparison Table</h3>
        <table class="comparison-table">
            <thead>
                <tr>
                    <th>Aspek</th>
                    <th>Raw Query</th>
                    <th>Query Builder</th>
                    <th>Eloquent ORM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Ease of Use</strong></td>
                    <td>⭐⭐</td>
                    <td>⭐⭐⭐⭐</td>
                    <td>⭐⭐⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><strong>Performance</strong></td>
                    <td>⭐⭐⭐⭐⭐</td>
                    <td>⭐⭐⭐⭐</td>
                    <td>⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><strong>Security</strong></td>
                    <td>⭐⭐⭐</td>
                    <td>⭐⭐⭐⭐⭐</td>
                    <td>⭐⭐⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><strong>Flexibility</strong></td>
                    <td>⭐⭐⭐⭐⭐</td>
                    <td>⭐⭐⭐⭐</td>
                    <td>⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><strong>Maintainability</strong></td>
                    <td>⭐⭐</td>
                    <td>⭐⭐⭐⭐</td>
                    <td>⭐⭐⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><strong>Learning Curve</strong></td>
                    <td>Medium</td>
                    <td>Easy</td>
                    <td>Medium-Hard</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="recommendation-section">
        <h3>💡 Rekomendasi Penggunaan</h3>
        <div class="recommendation-grid">
            <div class="recommendation-card">
                <h4>🎯 Gunakan Raw Query Jika:</h4>
                <ul>
                    <li>Butuh complex query dengan multiple joins</li>
                    <li>Performance adalah prioritas utama</li>
                    <li>Menggunakan database-specific features</li>
                    <li>Query sudah dioptimasi dan tidak akan berubah</li>
                </ul>
            </div>
            
            <div class="recommendation-card">
                <h4>🎯 Gunakan Query Builder Jika:</h4>
                <ul>
                    <li>Butuh dynamic query building</li>
                    <li>Tidak butuh model features</li>
                    <li>Ingin balance antara performance dan ease of use</li>
                    <li>Query relatif simple tapi butuh flexibility</li>
                </ul>
            </div>
            
            <div class="recommendation-card">
                <h4>🎯 Gunakan Eloquent ORM Jika:</h4>
                <ul>
                    <li>Standard CRUD operations</li>
                    <li>Butuh relationships antar tables</li>
                    <li>Butuh model features (accessors, scopes, etc)</li>
                    <li>Rapid development adalah prioritas</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="info-box">
        <h3>📚 Next Steps</h3>
        <p>Sekarang Anda sudah memahami overview ketiga cara database interaction. Mari kita pelajari masing-masing secara detail:</p>
        <ol>
            <li><strong>Setup Database Connection</strong> - Konfigurasi koneksi database</li>
            <li><strong>Raw Query</strong> - Implementasi dengan DB facade</li>
            <li><strong>Query Builder</strong> - Implementasi dengan fluent interface</li>
            <li><strong>Eloquent ORM</strong> - Implementasi dengan Active Record pattern</li>
        </ol>
    </div>

    <div class="navigation-footer">
        <a href="{{ route('model.validation') }}" class="btn btn-secondary">← Previous: Validation</a>
        <a href="{{ route('model.database-setup') }}" class="btn btn-primary">Next: Database Setup →</a>
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
        margin-bottom: 30px;
        padding: 30px;
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        border-radius: 10px;
    }

    .header-section h1 {
        margin: 0 0 10px 0;
        font-size: 2.2em;
    }

    .subtitle {
        font-size: 1.1em;
        opacity: 0.9;
        margin: 0;
    }

    .content-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .content-section h2 {
        color: #333;
        margin-top: 0;
    }

    .methods-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .method-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .method-header {
        padding: 20px;
        color: white;
        text-align: center;
    }

    .method-header.raw {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    }

    .method-header.builder {
        background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
    }

    .method-header.orm {
        background: linear-gradient(135deg, #28a745 0%, #218838 100%);
    }

    .method-icon {
        font-size: 3em;
        margin-bottom: 10px;
    }

    .method-header h3 {
        margin: 0;
        font-size: 1.3em;
    }

    .method-body {
        padding: 20px;
    }

    .method-body h4 {
        color: #333;
        margin: 15px 0 10px 0;
        font-size: 1em;
    }

    .method-body p {
        margin: 0 0 15px 0;
        color: #666;
    }

    .method-body ul {
        margin: 10px 0;
        padding-left: 20px;
        line-height: 1.6;
    }

    .method-body pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 10px 0;
    }

    .method-body code {
        font-family: 'Courier New', monospace;
        font-size: 0.85em;
    }

    .comparison-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .comparison-section h3 {
        margin-top: 0;
        color: #007bff;
    }

    .comparison-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .comparison-table th,
    .comparison-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .comparison-table th {
        background: #007bff;
        color: white;
        font-weight: 600;
    }

    .comparison-table tbody tr:hover {
        background: #f8f9fa;
    }

    .recommendation-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .recommendation-section h3 {
        margin-top: 0;
        color: #007bff;
    }

    .recommendation-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .recommendation-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #007bff;
    }

    .recommendation-card h4 {
        margin-top: 0;
        color: #007bff;
    }

    .recommendation-card ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
        line-height: 1.6;
    }

    .info-box {
        background: #e7f3ff;
        border-left: 4px solid #007bff;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .info-box h3 {
        margin-top: 0;
        color: #004085;
    }

    .info-box p, .info-box ol {
        color: #004085;
        line-height: 1.6;
    }

    .navigation-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        gap: 15px;
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

    .btn-primary {
        background: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background: #0056b3;
    }
</style>
@endsection
