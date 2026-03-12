@extends('layouts.model')

@section('title', 'Query Builder')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>🔧 Query Builder</h1>
        <p class="subtitle">Database interaction dengan fluent interface Query Builder API</p>
    </div>

    <div class="content-section">
        <h2>🎯 Apa itu Query Builder?</h2>
        <p>Query Builder adalah fluent interface untuk membangun database queries. Lebih aman dari raw query dan lebih flexible dari Eloquent untuk beberapa kasus.</p>
    </div>

    <div class="code-section">
        <h3>📝 Basic Query Builder Syntax</h3>
        <pre><code>use Illuminate\Support\Facades\DB;

// SELECT
$products = DB::table('products')->get();
$product = DB::table('products')->where('id', 1)->first();

// INSERT
DB::table('products')->insert([
    'name' => 'New Product',
    'price' => 100000,
    'stock' => 50
]);

// UPDATE
DB::table('products')->where('id', 1)->update(['stock' => 100]);

// DELETE
DB::table('products')->where('id', 1)->delete();</code></pre>
    </div>

    <div class="demo-section">
        <h3>🎯 Live Demo: Query Builder Results</h3>
        
        <div class="demo-box">
            <h4>1. Basic GET (LIMIT 5)</h4>
            <pre><code>DB::table('products')->limit(5)->get()</code></pre>
            
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
            <p class="no-data">No data found.</p>
            @endif
        </div>

        <div class="demo-box">
            <h4>2. WHERE Clause (Multiple Conditions)</h4>
            <pre><code>DB::table('products')
    ->where('category', 'Electronics')
    ->where('is_active', true)
    ->get()</code></pre>
            
            @if(count($electronics) > 0)
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
                    @foreach($electronics as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No electronics found.</p>
            @endif
        </div>

        <div class="demo-box">
            <h4>3. Aggregate with GROUP BY</h4>
            <pre><code>DB::table('products')
    ->select('category', DB::raw('COUNT(*) as total'))
    ->groupBy('category')
    ->get()</code></pre>
            
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

        <div class="demo-box">
            <h4>4. ORDER BY (Top 5 Most Expensive)</h4>
            <pre><code>DB::table('products')
    ->orderBy('price', 'desc')
    ->limit(5)
    ->get()</code></pre>
            
            @if(count($orderedProducts) > 0)
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderedProducts as $index => $product)
                    <tr>
                        <td><strong>#{{ $index + 1 }}</strong></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No data found.</p>
            @endif
        </div>
    </div>

    <div class="methods-section">
        <h3>🔧 Query Builder Methods</h3>
        
        <div class="method-category">
            <h4>📖 SELECT Methods</h4>
            <div class="methods-grid">
                <div class="method-card">
                    <code>get()</code>
                    <p>Retrieve all results</p>
                </div>
                <div class="method-card">
                    <code>first()</code>
                    <p>Get first result</p>
                </div>
                <div class="method-card">
                    <code>find($id)</code>
                    <p>Find by ID</p>
                </div>
                <div class="method-card">
                    <code>value('column')</code>
                    <p>Get single column value</p>
                </div>
                <div class="method-card">
                    <code>pluck('column')</code>
                    <p>Get array of column values</p>
                </div>
                <div class="method-card">
                    <code>count()</code>
                    <p>Count results</p>
                </div>
            </div>
        </div>

        <div class="method-category">
            <h4>🔍 WHERE Methods</h4>
            <div class="methods-grid">
                <div class="method-card">
                    <code>where('col', 'val')</code>
                    <p>Basic where clause</p>
                </div>
                <div class="method-card">
                    <code>orWhere('col', 'val')</code>
                    <p>OR condition</p>
                </div>
                <div class="method-card">
                    <code>whereBetween('col', [1, 10])</code>
                    <p>Between values</p>
                </div>
                <div class="method-card">
                    <code>whereIn('col', [1,2,3])</code>
                    <p>In array</p>
                </div>
                <div class="method-card">
                    <code>whereNull('col')</code>
                    <p>Is NULL</p>
                </div>
                <div class="method-card">
                    <code>whereDate('col', '2024-01-01')</code>
                    <p>Date comparison</p>
                </div>
            </div>
        </div>

        <div class="method-category">
            <h4>📊 Aggregate Methods</h4>
            <div class="methods-grid">
                <div class="method-card">
                    <code>count()</code>
                    <p>Count rows</p>
                </div>
                <div class="method-card">
                    <code>max('col')</code>
                    <p>Maximum value</p>
                </div>
                <div class="method-card">
                    <code>min('col')</code>
                    <p>Minimum value</p>
                </div>
                <div class="method-card">
                    <code>avg('col')</code>
                    <p>Average value</p>
                </div>
                <div class="method-card">
                    <code>sum('col')</code>
                    <p>Sum of values</p>
                </div>
                <div class="method-card">
                    <code>groupBy('col')</code>
                    <p>Group results</p>
                </div>
            </div>
        </div>

        <div class="method-category">
            <h4>🔄 Ordering & Limiting</h4>
            <div class="methods-grid">
                <div class="method-card">
                    <code>orderBy('col', 'asc')</code>
                    <p>Sort ascending</p>
                </div>
                <div class="method-card">
                    <code>orderByDesc('col')</code>
                    <p>Sort descending</p>
                </div>
                <div class="method-card">
                    <code>latest('col')</code>
                    <p>Order by latest</p>
                </div>
                <div class="method-card">
                    <code>oldest('col')</code>
                    <p>Order by oldest</p>
                </div>
                <div class="method-card">
                    <code>limit(10)</code>
                    <p>Limit results</p>
                </div>
                <div class="method-card">
                    <code>offset(10)</code>
                    <p>Skip results</p>
                </div>
            </div>
        </div>
    </div>

    <div class="chaining-section">
        <h3>⛓️ Method Chaining Examples</h3>
        <pre><code>// Complex query dengan method chaining
$products = DB::table('products')
    ->select('id', 'name', 'price', 'stock')
    ->where('is_active', true)
    ->where('stock', '>', 0)
    ->whereBetween('price', [100000, 1000000])
    ->orderBy('price', 'desc')
    ->limit(10)
    ->get();

// Conditional query building
$query = DB::table('products');

if ($category) {
    $query->where('category', $category);
}

if ($minPrice) {
    $query->where('price', '>=', $minPrice);
}

$results = $query->get();

// Joins
$results = DB::table('orders')
    ->join('products', 'orders.product_id', '=', 'products.id')
    ->select('orders.*', 'products.name')
    ->get();</code></pre>
    </div>

    <div class="pros-cons-section">
        <h3>⚖️ Pros & Cons</h3>
        <div class="pros-cons-grid">
            <div class="pros-box">
                <h4>✅ Kelebihan</h4>
                <ul>
                    <li><strong>Safe:</strong> Otomatis escape input, aman dari SQL injection</li>
                    <li><strong>Portable:</strong> Database-agnostic, bisa pindah database</li>
                    <li><strong>Clean Syntax:</strong> Method chaining yang readable</li>
                    <li><strong>IDE Support:</strong> Autocomplete untuk methods</li>
                    <li><strong>Flexible:</strong> Dynamic query building</li>
                    <li><strong>Performance:</strong> Lebih cepat dari Eloquent</li>
                </ul>
            </div>

            <div class="cons-box">
                <h4>❌ Kekurangan</h4>
                <ul>
                    <li><strong>No Model Features:</strong> Tidak ada accessors, mutators, events</li>
                    <li><strong>No Relationships:</strong> Harus manual handle joins</li>
                    <li><strong>Manual Mapping:</strong> Returns stdClass, bukan model instances</li>
                    <li><strong>Limited:</strong> Beberapa complex query tetap butuh raw SQL</li>
                    <li><strong>Verbosity:</strong> Lebih verbose dari Eloquent untuk simple queries</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tips-section">
        <h3>💡 When to Use Query Builder</h3>
        <div class="tips-grid">
            <div class="tip-card">
                <div class="tip-icon">📊</div>
                <h4>Reporting Queries</h4>
                <p>Perfect untuk aggregation, grouping, dan reporting yang tidak butuh model features.</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">🔄</div>
                <h4>Dynamic Queries</h4>
                <p>Ketika query perlu dibangun secara conditional berdasarkan user input.</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">⚡</div>
                <h4>Performance Critical</h4>
                <p>Ketika butuh performance lebih baik dari Eloquent tapi tetap aman.</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">🔧</div>
                <h4>Bulk Operations</h4>
                <p>Untuk bulk insert, update, atau delete tanpa trigger model events.</p>
            </div>
        </div>
    </div>

    <div class="navigation-footer">
        <a href="{{ route('model.raw-query') }}" class="btn btn-secondary">← Previous: Raw Query</a>
        <a href="{{ route('model.eloquent-orm') }}" class="btn btn-primary">Next: Eloquent ORM →</a>
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
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
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
        color: #ff9800;
    }

    .code-section pre, .chaining-section pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 20px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 0;
    }

    .code-section code, .chaining-section code {
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
        color: #ff9800;
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
        background: #ff9800;
        color: white;
        font-weight: 600;
    }

    .demo-table tbody tr:hover {
        background: #fff8e1;
    }

    .demo-table .price {
        color: #28a745;
        font-weight: 600;
    }

    .no-data {
        padding: 20px;
        text-align: center;
        color: #6c757d;
        font-style: italic;
    }

    .methods-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .methods-section h3 {
        margin-top: 0;
        color: #ff9800;
    }

    .method-category {
        margin-bottom: 30px;
    }

    .method-category h4 {
        color: #333;
        margin-bottom: 15px;
    }

    .methods-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
    }

    .method-card {
        background: #fff8e1;
        padding: 15px;
        border-radius: 8px;
        border-left: 4px solid #ff9800;
    }

    .method-card code {
        display: block;
        color: #ff6f00;
        font-weight: 600;
        margin-bottom: 8px;
        font-family: 'Courier New', monospace;
    }

    .method-card p {
        margin: 0;
        color: #666;
        font-size: 0.9em;
    }

    .chaining-section {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .chaining-section h3 {
        margin-top: 0;
        color: #ff9800;
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
        color: #ff9800;
    }

    .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .tip-card {
        background: #fff8e1;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        border: 2px solid #ff9800;
    }

    .tip-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .tip-card h4 {
        margin: 0 0 10px 0;
        color: #ff6f00;
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
        background: #ff9800;
        color: white;
    }

    .btn-primary:hover {
        background: #f57c00;
    }
</style>
@endsection
