@extends('layouts.model')

@section('title', 'Raw Query - DB Facade')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>📝 Raw Query (DB Facade)</h1>
        <p class="subtitle">Database interaction dengan raw SQL menggunakan DB facade</p>
    </div>

    <div class="content-section">
        <h2>🎯 Apa itu Raw Query?</h2>
        <p>Raw Query adalah cara berinteraksi dengan database menggunakan SQL query secara langsung melalui DB facade Laravel. Ini memberikan full control atas query yang dijalankan.</p>
    </div>

    <div class="code-section">
        <h3>📝 Basic Raw Query Syntax</h3>
        <pre><code>use Illuminate\Support\Facades\DB;

// SELECT Query
$results = DB::select('SELECT * FROM products WHERE category = ?', ['Electronics']);

// INSERT Query
DB::insert('INSERT INTO products (name, price, stock) VALUES (?, ?, ?)', 
    ['New Product', 100000, 50]);

// UPDATE Query
DB::update('UPDATE products SET stock = ? WHERE id = ?', [100, 1]);

// DELETE Query
DB::delete('DELETE FROM products WHERE id = ?', [1]);

// General Statement
DB::statement('DROP TABLE IF EXISTS temp_table');</code></pre>
    </div>

    <div class="demo-section">
        <h3>🎯 Live Demo: Raw Query Results</h3>
        
        <div class="demo-box">
            <h4>1. SELECT All Products (LIMIT 5)</h4>
            <pre><code>DB::select('SELECT * FROM products LIMIT 5')</code></pre>
            
            @if(count($allProducts) > 0)
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allProducts as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No data found. Please run seeder.</p>
            @endif
        </div>

        <div class="demo-box">
            <h4>2. SELECT with WHERE Clause (Parameter Binding)</h4>
            <pre><code>DB::select('SELECT * FROM products WHERE category = ? AND is_active = ?', 
    ['Electronics', 1])</code></pre>
            
            @if(count($electronics) > 0)
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($electronics as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No electronics found.</p>
            @endif
        </div>

        <div class="demo-box">
            <h4>3. Aggregate Query (GROUP BY)</h4>
            <pre><code>DB::select('SELECT category, COUNT(*) as total FROM products GROUP BY category')</code></pre>
            
            @if(count($productCount) > 0)
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Total Products</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productCount as $count)
                    <tr>
                        <td><strong>{{ $count->category }}</strong></td>
                        <td>{{ $count->total }} products</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No data found.</p>
            @endif
        </div>
    </div>

    <div class="security-section">
        <h3>🔒 Parameter Binding untuk Security</h3>
        <div class="comparison-grid">
            <div class="comparison-box bad">
                <h4>❌ Vulnerable to SQL Injection</h4>
                <pre><code>// JANGAN LAKUKAN INI!
$category = $_GET['category'];
$results = DB::select("SELECT * FROM products 
    WHERE category = '$category'");

// Attacker bisa inject:
// category = "' OR '1'='1"
// Query menjadi: SELECT * FROM products 
//                WHERE category = '' OR '1'='1'</code></pre>
                <p class="warning">⚠️ Sangat berbahaya! Bisa mengakses semua data</p>
            </div>

            <div class="comparison-box good">
                <h4>✅ Safe with Parameter Binding</h4>
                <pre><code>// GUNAKAN INI!
$category = $_GET['category'];
$results = DB::select('SELECT * FROM products 
    WHERE category = ?', [$category]);

// Laravel akan escape input secara otomatis
// Injection attempt akan gagal</code></pre>
                <p class="success">✅ Aman dari SQL injection</p>
            </div>
        </div>
    </div>

    <div class="operations-section">
        <h3>🔄 CRUD Operations dengan Raw Query</h3>
        
        <div class="operation-card">
            <h4>📖 READ (SELECT)</h4>
            <pre><code>// Select all
$products = DB::select('SELECT * FROM products');

// Select with WHERE
$product = DB::select('SELECT * FROM products WHERE id = ?', [1]);

// Select with multiple conditions
$results = DB::select('SELECT * FROM products 
    WHERE category = ? AND price > ? 
    ORDER BY price DESC', ['Electronics', 1000000]);</code></pre>
        </div>

        <div class="operation-card">
            <h4>➕ CREATE (INSERT)</h4>
            <pre><code>// Insert single record
DB::insert('INSERT INTO products (name, price, stock, category, is_active) 
    VALUES (?, ?, ?, ?, ?)', 
    ['New Product', 500000, 100, 'Electronics', 1]);

// Insert returns boolean
$success = DB::insert('INSERT INTO products (name, price) VALUES (?, ?)', 
    ['Product', 100000]);</code></pre>
        </div>

        <div class="operation-card">
            <h4>✏️ UPDATE</h4>
            <pre><code>// Update single field
DB::update('UPDATE products SET stock = ? WHERE id = ?', [50, 1]);

// Update multiple fields
DB::update('UPDATE products 
    SET price = ?, stock = ?, is_active = ? 
    WHERE id = ?', [750000, 30, 1, 1]);

// Update returns affected rows count
$affected = DB::update('UPDATE products SET price = price * 1.1 
    WHERE category = ?', ['Electronics']);</code></pre>
        </div>

        <div class="operation-card">
            <h4>🗑️ DELETE</h4>
            <pre><code>// Delete by ID
DB::delete('DELETE FROM products WHERE id = ?', [1]);

// Delete with condition
DB::delete('DELETE FROM products WHERE stock = 0');

// Delete returns affected rows count
$deleted = DB::delete('DELETE FROM products 
    WHERE is_active = 0 AND stock = 0');</code></pre>
        </div>
    </div>

    <div class="pros-cons-section">
        <h3>⚖️ Pros & Cons</h3>
        <div class="pros-cons-grid">
            <div class="pros-box">
                <h4>✅ Kelebihan</h4>
                <ul>
                    <li><strong>Full Control:</strong> Bisa menulis query SQL apapun</li>
                    <li><strong>Performance:</strong> Optimal untuk complex queries</li>
                    <li><strong>Flexibility:</strong> Bisa menggunakan semua fitur SQL</li>
                    <li><strong>Familiar:</strong> Bagi yang sudah terbiasa dengan SQL</li>
                    <li><strong>Direct:</strong> Tidak ada abstraction layer overhead</li>
                </ul>
            </div>

            <div class="cons-box">
                <h4>❌ Kekurangan</h4>
                <ul>
                    <li><strong>SQL Injection Risk:</strong> Harus hati-hati dengan parameter binding</li>
                    <li><strong>Database-Specific:</strong> Query tidak portable antar database</li>
                    <li><strong>No IDE Support:</strong> Tidak ada autocomplete untuk table/column</li>
                    <li><strong>Manual Mapping:</strong> Harus manual convert ke objects</li>
                    <li><strong>Maintenance:</strong> Lebih sulit di-maintain untuk query kompleks</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tips-section">
        <h3>💡 Best Practices</h3>
        <div class="tips-grid">
            <div class="tip-card">
                <div class="tip-icon">🔒</div>
                <h4>Always Use Parameter Binding</h4>
                <p>Jangan pernah concatenate user input langsung ke query. Selalu gunakan placeholder (?) dan parameter binding.</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">📝</div>
                <h4>Use for Complex Queries</h4>
                <p>Raw query paling cocok untuk complex queries dengan multiple joins, subqueries, atau database-specific features.</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">🧪</div>
                <h4>Test Your Queries</h4>
                <p>Selalu test query di database tool terlebih dahulu sebelum implement di code.</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">📊</div>
                <h4>Monitor Performance</h4>
                <p>Gunakan EXPLAIN untuk analyze query performance dan optimize jika diperlukan.</p>
            </div>
        </div>
    </div>

    <div class="navigation-footer">
        <a href="{{ route('model.database-setup') }}" class="btn btn-secondary">← Previous: Database Setup</a>
        <a href="{{ route('model.query-builder') }}" class="btn btn-primary">Next: Query Builder →</a>
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
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
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

    .code-section {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .code-section h3 {
        margin-top: 0;
        color: #dc3545;
    }

    .code-section pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 20px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 0;
    }

    .code-section code {
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
        color: #dc3545;
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

    .demo-box pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 10px 0 15px 0;
    }

    .demo-box code {
        font-family: 'Courier New', monospace;
        font-size: 0.85em;
        line-height: 1.6;
    }

    .demo-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    .demo-table th,
    .demo-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .demo-table th {
        background: #dc3545;
        color: white;
        font-weight: 600;
    }

    .demo-table tbody tr:hover {
        background: #f8f9fa;
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

    .no-data {
        padding: 20px;
        text-align: center;
        color: #6c757d;
        font-style: italic;
    }

    .security-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .security-section h3 {
        margin-top: 0;
        color: #dc3545;
    }

    .comparison-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .comparison-box {
        padding: 20px;
        border-radius: 8px;
    }

    .comparison-box.bad {
        background: #fff5f5;
        border: 2px solid #dc3545;
    }

    .comparison-box.good {
        background: #f0fff4;
        border: 2px solid #28a745;
    }

    .comparison-box h4 {
        margin-top: 0;
    }

    .comparison-box pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 15px 0;
    }

    .comparison-box code {
        font-family: 'Courier New', monospace;
        font-size: 0.85em;
        line-height: 1.6;
    }

    .comparison-box .warning {
        color: #dc3545;
        font-weight: 600;
        margin: 10px 0 0 0;
    }

    .comparison-box .success {
        color: #28a745;
        font-weight: 600;
        margin: 10px 0 0 0;
    }

    .operations-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .operations-section h3 {
        margin-top: 0;
        color: #dc3545;
    }

    .operation-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid #dc3545;
    }

    .operation-card h4 {
        margin-top: 0;
        color: #333;
    }

    .operation-card pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 10px 0 0 0;
    }

    .operation-card code {
        font-family: 'Courier New', monospace;
        font-size: 0.85em;
        line-height: 1.6;
    }

    .pros-cons-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .pros-cons-section h3 {
        margin-top: 0;
        color: #333;
    }

    .pros-cons-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .pros-box {
        background: #f0fff4;
        padding: 20px;
        border-radius: 8px;
        border: 2px solid #28a745;
    }

    .cons-box {
        background: #fff5f5;
        padding: 20px;
        border-radius: 8px;
        border: 2px solid #dc3545;
    }

    .pros-box h4 {
        margin-top: 0;
        color: #28a745;
    }

    .cons-box h4 {
        margin-top: 0;
        color: #dc3545;
    }

    .pros-box ul,
    .cons-box ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
        line-height: 1.8;
    }

    .tips-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .tips-section h3 {
        margin-top: 0;
        color: #dc3545;
    }

    .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .tip-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        border: 2px solid #dee2e6;
    }

    .tip-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .tip-card h4 {
        margin: 0 0 10px 0;
        color: #333;
    }

    .tip-card p {
        margin: 0;
        color: #666;
        line-height: 1.5;
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
        background: #dc3545;
        color: white;
    }

    .btn-primary:hover {
        background: #c82333;
    }
</style>
@endsection
