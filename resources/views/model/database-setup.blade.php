@extends('layouts.model')

@section('title', 'Setup Database Connection')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>⚙️ Setup Database Connection</h1>
        <p class="subtitle">Konfigurasi koneksi database di Laravel</p>
    </div>

    <div class="status-section">
        <h3>🔌 Database Connection Status</h3>
        <div class="status-box {{ $connectionStatus }}">
            @if($connectionStatus == 'success')
                <div class="status-icon">✅</div>
                <h4>Connection Successful!</h4>
            @else
                <div class="status-icon">❌</div>
                <h4>Connection Failed</h4>
            @endif
            <p>{{ $connectionMessage }}</p>
        </div>
    </div>

    <div class="content-section">
        <h2>📝 Environment Configuration (.env)</h2>
        <p>File <code>.env</code> adalah tempat menyimpan konfigurasi database. Ini adalah file yang tidak di-commit ke version control karena berisi credentials.</p>
        
        <div class="code-box">
            <h4>.env File Example:</h4>
            <pre><code>@foreach($envExample as $key => $value)
{{ $key }}={{ $value }}
@endforeach</code></pre>
        </div>

        <div class="info-box info-box-warning">
            <strong>⚠️ Security Note:</strong> Jangan pernah commit file <code>.env</code> ke Git! Gunakan <code>.env.example</code> sebagai template.
        </div>
    </div>

    <div class="drivers-section">
        <h3>🗄️ Database Drivers yang Didukung</h3>
        <div class="drivers-grid">
            @foreach($drivers as $driver)
            <div class="driver-card">
                <h4>{{ $driver }}</h4>
                @if($driver == 'MySQL')
                    <p>Default driver Laravel, paling populer untuk web applications</p>
                    <code>DB_CONNECTION=mysql</code>
                @elseif($driver == 'PostgreSQL')
                    <p>Advanced features, cocok untuk aplikasi enterprise</p>
                    <code>DB_CONNECTION=pgsql</code>
                @elseif($driver == 'SQLite')
                    <p>File-based database, cocok untuk development/testing</p>
                    <code>DB_CONNECTION=sqlite</code>
                @else
                    <p>Microsoft SQL Server untuk aplikasi Windows</p>
                    <code>DB_CONNECTION=sqlsrv</code>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <div class="config-section">
        <h3>⚙️ Database Configuration (config/database.php)</h3>
        <p>File <code>config/database.php</code> membaca environment variables dan mengkonfigurasi koneksi database.</p>
        
        <pre><code>'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'strict' => true,
    'engine' => null,
],</code></pre>
    </div>

    <div class="migration-section">
        <h3>🔄 Migration Basics</h3>
        <p>Setelah database terkonfigurasi, gunakan migration untuk membuat struktur database:</p>
        
        <div class="commands-grid">
            <div class="command-card">
                <h4>Run Migrations</h4>
                <pre><code>php artisan migrate</code></pre>
                <p>Menjalankan semua migration yang belum dijalankan</p>
            </div>
            
            <div class="command-card">
                <h4>Rollback Migration</h4>
                <pre><code>php artisan migrate:rollback</code></pre>
                <p>Membatalkan batch migration terakhir</p>
            </div>
            
            <div class="command-card">
                <h4>Fresh Migration</h4>
                <pre><code>php artisan migrate:fresh</code></pre>
                <p>Drop semua tables dan run ulang migrations</p>
            </div>
            
            <div class="command-card">
                <h4>Seed Database</h4>
                <pre><code>php artisan db:seed</code></pre>
                <p>Mengisi database dengan sample data</p>
            </div>
        </div>
    </div>

    <div class="troubleshooting-section">
        <h3>🔧 Common Connection Errors & Solutions</h3>
        
        <div class="error-card">
            <h4>❌ SQLSTATE[HY000] [2002] Connection refused</h4>
            <p><strong>Penyebab:</strong> Database server tidak berjalan atau host/port salah</p>
            <p><strong>Solusi:</strong></p>
            <ul>
                <li>Pastikan MySQL/database server sudah running</li>
                <li>Cek DB_HOST dan DB_PORT di .env</li>
                <li>Untuk XAMPP/WAMP, pastikan service MySQL aktif</li>
            </ul>
        </div>

        <div class="error-card">
            <h4>❌ SQLSTATE[HY000] [1045] Access denied</h4>
            <p><strong>Penyebab:</strong> Username atau password salah</p>
            <p><strong>Solusi:</strong></p>
            <ul>
                <li>Cek DB_USERNAME dan DB_PASSWORD di .env</li>
                <li>Pastikan user memiliki akses ke database</li>
                <li>Untuk development lokal, biasanya username=root, password=kosong</li>
            </ul>
        </div>

        <div class="error-card">
            <h4>❌ SQLSTATE[HY000] [1049] Unknown database</h4>
            <p><strong>Penyebab:</strong> Database belum dibuat</p>
            <p><strong>Solusi:</strong></p>
            <ul>
                <li>Buat database manual via phpMyAdmin atau MySQL CLI</li>
                <li>Atau gunakan: <code>CREATE DATABASE nama_database;</code></li>
                <li>Pastikan DB_DATABASE di .env sesuai dengan nama database</li>
            </ul>
        </div>

        <div class="error-card">
            <h4>❌ PDO driver not found</h4>
            <p><strong>Penyebab:</strong> PHP extension untuk database belum aktif</p>
            <p><strong>Solusi:</strong></p>
            <ul>
                <li>Aktifkan extension di php.ini: <code>extension=pdo_mysql</code></li>
                <li>Restart web server setelah mengubah php.ini</li>
                <li>Cek dengan: <code>php -m | grep pdo</code></li>
            </ul>
        </div>
    </div>

    <div class="best-practices-section">
        <h3>✅ Best Practices</h3>
        <div class="practices-grid">
            <div class="practice-card">
                <div class="practice-icon">🔒</div>
                <h4>Security</h4>
                <ul>
                    <li>Jangan commit .env ke Git</li>
                    <li>Gunakan strong password untuk production</li>
                    <li>Batasi database user privileges</li>
                    <li>Gunakan environment-specific credentials</li>
                </ul>
            </div>
            
            <div class="practice-card">
                <div class="practice-icon">📋</div>
                <h4>Configuration</h4>
                <ul>
                    <li>Gunakan .env.example sebagai template</li>
                    <li>Dokumentasikan semua environment variables</li>
                    <li>Gunakan config cache di production</li>
                    <li>Test koneksi sebelum deploy</li>
                </ul>
            </div>
            
            <div class="practice-card">
                <div class="practice-icon">🧪</div>
                <h4>Development</h4>
                <ul>
                    <li>Gunakan SQLite untuk testing</li>
                    <li>Pisahkan database dev dan production</li>
                    <li>Backup database secara regular</li>
                    <li>Gunakan migration untuk version control</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="navigation-footer">
        <a href="{{ route('model.database-intro') }}" class="btn btn-secondary">← Previous: Database Intro</a>
        <a href="{{ route('model.raw-query') }}" class="btn btn-primary">Next: Raw Query →</a>
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
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
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

    .status-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .status-section h3 {
        margin-top: 0;
        color: #333;
    }

    .status-box {
        padding: 30px;
        border-radius: 8px;
        text-align: center;
    }

    .status-box.success {
        background: #d4edda;
        border: 2px solid #28a745;
    }

    .status-box.error {
        background: #f8d7da;
        border: 2px solid #dc3545;
    }

    .status-icon {
        font-size: 4em;
        margin-bottom: 15px;
    }

    .status-box h4 {
        margin: 0 0 10px 0;
        font-size: 1.5em;
    }

    .status-box p {
        margin: 0;
        font-size: 1.1em;
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

    .content-section code {
        background: #f8f9fa;
        padding: 2px 6px;
        border-radius: 3px;
        color: #e83e8c;
        font-family: 'Courier New', monospace;
    }

    .code-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin: 20px 0;
    }

    .code-box h4 {
        margin-top: 0;
        color: #333;
    }

    .code-box pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 10px 0 0 0;
    }

    .code-box code {
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        line-height: 1.6;
        background: transparent;
        color: #f8f8f2;
        padding: 0;
    }

    .info-box-warning {
        background: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 15px 20px;
        border-radius: 5px;
        margin: 20px 0;
        color: #856404;
    }

    .drivers-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .drivers-section h3 {
        margin-top: 0;
        color: #6c757d;
    }

    .drivers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .driver-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #6c757d;
    }

    .driver-card h4 {
        margin-top: 0;
        color: #6c757d;
    }

    .driver-card p {
        margin: 10px 0;
        color: #666;
    }

    .driver-card code {
        display: block;
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 8px 12px;
        border-radius: 5px;
        margin-top: 10px;
        font-family: 'Courier New', monospace;
    }

    .config-section {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .config-section h3 {
        margin-top: 0;
        color: #6c757d;
    }

    .config-section pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 20px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 15px 0 0 0;
    }

    .config-section code {
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        line-height: 1.6;
    }

    .migration-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .migration-section h3 {
        margin-top: 0;
        color: #6c757d;
    }

    .commands-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .command-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
    }

    .command-card h4 {
        margin-top: 0;
        color: #333;
    }

    .command-card pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 10px 15px;
        border-radius: 5px;
        margin: 10px 0;
    }

    .command-card code {
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
    }

    .command-card p {
        margin: 10px 0 0 0;
        color: #666;
        font-size: 0.9em;
    }

    .troubleshooting-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .troubleshooting-section h3 {
        margin-top: 0;
        color: #dc3545;
    }

    .error-card {
        background: #fff5f5;
        border-left: 4px solid #dc3545;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error-card h4 {
        margin-top: 0;
        color: #dc3545;
    }

    .error-card p {
        margin: 10px 0;
        color: #666;
    }

    .error-card ul {
        margin: 10px 0;
        padding-left: 20px;
        line-height: 1.6;
    }

    .error-card code {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 2px 8px;
        border-radius: 3px;
        font-family: 'Courier New', monospace;
    }

    .best-practices-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .best-practices-section h3 {
        margin-top: 0;
        color: #28a745;
    }

    .practices-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .practice-card {
        background: #f0fff4;
        padding: 20px;
        border-radius: 8px;
        border: 2px solid #28a745;
    }

    .practice-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .practice-card h4 {
        margin: 0 0 15px 0;
        color: #28a745;
    }

    .practice-card ul {
        margin: 0;
        padding-left: 20px;
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
        background: #6c757d;
        color: white;
    }

    .btn-primary:hover {
        background: #495057;
    }
</style>
@endsection
