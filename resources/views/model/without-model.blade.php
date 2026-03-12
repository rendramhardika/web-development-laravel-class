@extends('layouts.model')

@section('title', 'Controller Tanpa Model - Anti-Pattern')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>⚠️ Controller Tanpa Model (Anti-Pattern)</h1>
        <p class="subtitle">Menunjukkan masalah ketika semua logic ada di controller</p>
    </div>

    <div class="alert alert-warning">
        <strong>⚠️ Warning:</strong> Ini adalah contoh anti-pattern. Jangan gunakan approach ini di production!
    </div>

    <div class="content-section">
        <h2>❌ Masalah Controller Tanpa Model</h2>
        <p>Ketika semua logic berada di controller, kita menghadapi beberapa masalah:</p>
        <ul>
            <li><strong>Fat Controller:</strong> Controller menjadi terlalu besar dan sulit di-maintain</li>
            <li><strong>Code Duplication:</strong> Logic yang sama harus ditulis berulang kali</li>
            <li><strong>Hard to Test:</strong> Sulit untuk melakukan unit testing</li>
            <li><strong>Violates SRP:</strong> Melanggar Single Responsibility Principle</li>
            <li><strong>Not Reusable:</strong> Logic tidak bisa digunakan kembali di tempat lain</li>
        </ul>
    </div>

    <div class="code-section">
        <h3>📝 Contoh Controller Tanpa Model</h3>
        <pre><code>public function withoutModel()
{
    // Hardcoded data - tidak ada database interaction
    $products = [
        ['id' => 1, 'name' => 'Laptop', 'price' => 15000000, 'stock' => 10],
        ['id' => 2, 'name' => 'Mouse', 'price' => 500000, 'stock' => 50],
        ['id' => 3, 'name' => 'Keyboard', 'price' => 750000, 'stock' => 30],
    ];

    // Business logic langsung di controller
    $productId = 1;
    $selectedProduct = null;
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $selectedProduct = $product;
            break;
        }
    }

    // Calculation logic di controller
    $discountPercentage = 10;
    $discountedPrice = $selectedProduct['price'] - 
        ($selectedProduct['price'] * $discountPercentage / 100);

    // Formatting logic di controller
    $formattedPrice = 'Rp ' . number_format($selectedProduct['price'], 0, ',', '.');

    // Validation logic di controller
    $isInStock = $selectedProduct['stock'] > 0;

    return view('model.without-model', compact(...));
}</code></pre>
    </div>

    <div class="demo-section">
        <h3>🎯 Live Demo Output</h3>
        
        <div class="demo-box">
            <h4>Product List (Hardcoded)</h4>
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                        <td>{{ $product['stock'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="demo-box">
            <h4>Selected Product: {{ $selectedProduct['name'] }}</h4>
            <div class="result-grid">
                <div class="result-item">
                    <strong>Original Price:</strong>
                    <span>{{ $formattedPrice }}</span>
                </div>
                <div class="result-item">
                    <strong>Discounted Price (10%):</strong>
                    <span>Rp {{ number_format($discountedPrice, 0, ',', '.') }}</span>
                </div>
                <div class="result-item">
                    <strong>Stock Status:</strong>
                    <span class="badge {{ $isInStock ? 'badge-success' : 'badge-danger' }}">
                        {{ $isInStock ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="comparison-section">
        <h3>⚖️ Masalah dengan Approach Ini</h3>
        <div class="problems-grid">
            <div class="problem-card">
                <div class="problem-icon">🔴</div>
                <h4>Hardcoded Data</h4>
                <p>Data tidak berasal dari database, hanya array statis</p>
            </div>
            <div class="problem-card">
                <div class="problem-icon">🔴</div>
                <h4>Business Logic di Controller</h4>
                <p>Calculation, formatting, validation semua di controller</p>
            </div>
            <div class="problem-card">
                <div class="problem-icon">🔴</div>
                <h4>Tidak Reusable</h4>
                <p>Logic tidak bisa digunakan di controller atau class lain</p>
            </div>
            <div class="problem-card">
                <div class="problem-icon">🔴</div>
                <h4>Sulit di-Test</h4>
                <p>Tidak ada separation of concerns untuk unit testing</p>
            </div>
        </div>
    </div>

    <div class="info-box info-box-success">
        <h3>✅ Solusi: Gunakan Model!</h3>
        <p>Pindahkan semua business logic, validation, dan database interaction ke Model. Controller hanya bertugas sebagai traffic controller yang menerima request dan mengembalikan response.</p>
        <p><strong>Next:</strong> Lihat bagaimana Model dapat menyelesaikan masalah ini di topik berikutnya.</p>
    </div>

    <div class="navigation-footer">
        <a href="{{ route('model.dashboard') }}" class="btn btn-secondary">← Back to Dashboard</a>
        <a href="{{ route('model.business-logic') }}" class="btn btn-primary">Next: Business Logic →</a>
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
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .alert-warning {
        background: #fff3cd;
        border-left: 4px solid #ffc107;
        color: #856404;
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

    .content-section ul {
        line-height: 1.8;
    }

    .code-section {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .code-section h3 {
        margin-top: 0;
        color: #667eea;
    }

    pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 20px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 0;
    }

    code {
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        line-height: 1.6;
    }

    .demo-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .demo-section h3 {
        margin-top: 0;
        color: #667eea;
    }

    .demo-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .demo-box h4 {
        margin-top: 0;
        color: #333;
    }

    .demo-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .demo-table th,
    .demo-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .demo-table th {
        background: #667eea;
        color: white;
        font-weight: 600;
    }

    .demo-table tbody tr:hover {
        background: #f1f3f5;
    }

    .result-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }

    .result-item {
        background: white;
        padding: 15px;
        border-radius: 5px;
        border-left: 3px solid #667eea;
    }

    .result-item strong {
        display: block;
        margin-bottom: 8px;
        color: #666;
        font-size: 0.9em;
    }

    .result-item span {
        font-size: 1.1em;
        color: #333;
        font-weight: 600;
    }

    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85em;
        font-weight: 600;
    }

    .badge-success {
        background: #28a745;
        color: white;
    }

    .badge-danger {
        background: #dc3545;
        color: white;
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
        color: #dc3545;
    }

    .problems-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .problem-card {
        background: #fff5f5;
        padding: 20px;
        border-radius: 8px;
        border: 2px solid #dc3545;
    }

    .problem-icon {
        font-size: 2em;
        margin-bottom: 10px;
    }

    .problem-card h4 {
        margin: 0 0 10px 0;
        color: #dc3545;
    }

    .problem-card p {
        margin: 0;
        color: #666;
        line-height: 1.5;
    }

    .info-box-success {
        background: #d4edda;
        border-left: 4px solid #28a745;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .info-box-success h3 {
        margin-top: 0;
        color: #155724;
    }

    .info-box-success p {
        margin: 10px 0 0 0;
        color: #155724;
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
        background: #667eea;
        color: white;
    }

    .btn-primary:hover {
        background: #5568d3;
    }
</style>
@endsection
