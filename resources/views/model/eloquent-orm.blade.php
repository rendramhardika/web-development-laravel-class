@extends('layouts.model')

@section('title', 'Eloquent ORM')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>🚀 Eloquent ORM</h1>
        <p class="subtitle">Database interaction dengan Object-Relational Mapping menggunakan Active Record pattern</p>
    </div>

    <div class="content-section">
        <h2>🎯 Apa itu Eloquent ORM?</h2>
        <p>Eloquent adalah ORM (Object-Relational Mapping) Laravel yang menggunakan Active Record pattern. Setiap database table memiliki corresponding Model class untuk berinteraksi dengan table tersebut.</p>
    </div>

    <div class="code-section">
        <h3>📝 Basic Eloquent Syntax</h3>
        <pre><code>use App\Models\Product;

// SELECT
$products = Product::all();
$product = Product::find(1);
$products = Product::where('category', 'Electronics')->get();

// INSERT
$product = Product::create([
    'name' => 'New Product',
    'price' => 100000,
    'stock' => 50
]);

// UPDATE
$product = Product::find(1);
$product->stock = 100;
$product->save();

// DELETE
$product = Product::find(1);
$product->delete();</code></pre>
    </div>

    <div class="demo-section">
        <h3>🎯 Live Demo: Eloquent ORM Results</h3>
        
        <div class="demo-box">
            <h4>1. Basic Query (LIMIT 5)</h4>
            <pre><code>Product::limit(5)->get()</code></pre>
            
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
                        <td>{{ $product->formatted_price }}</td>
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
            <h4>2. Query Scope: Active Products</h4>
            <pre><code>Product::active()->get()</code></pre>
            
            @if(count($activeProducts) > 0)
            <div class="count-badge">Found {{ count($activeProducts) }} active products</div>
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activeProducts->take(5) as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No active products.</p>
            @endif
        </div>

        <div class="demo-box">
            <h4>3. Query Scope: In Stock Products</h4>
            <pre><code>Product::inStock()->get()</code></pre>
            
            @if(count($inStockProducts) > 0)
            <div class="count-badge">Found {{ count($inStockProducts) }} products in stock</div>
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inStockProducts->take(5) as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }} units</td>
                        <td>{{ $product->formatted_price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No products in stock.</p>
            @endif
        </div>

        <div class="demo-box">
            <h4>4. Query Scope: By Category (Electronics)</h4>
            <pre><code>Product::byCategory('Electronics')->get()</code></pre>
            
            @if(count($electronics) > 0)
            <div class="count-badge">Found {{ count($electronics) }} electronics</div>
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($electronics as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->formatted_price }}</td>
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
            <h4>5. Query Scope: Low Stock Alert</h4>
            <pre><code>Product::lowStock(10)->get()</code></pre>
            
            @if(count($lowStockProducts) > 0)
            <div class="count-badge alert">⚠️ {{ count($lowStockProducts) }} products need restocking</div>
            <table class="demo-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lowStockProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td><strong>{{ $product->stock }}</strong> units</td>
                        <td><span class="badge badge-warning">Low Stock</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">All products have sufficient stock.</p>
            @endif
        </div>

        <div class="demo-box">
            <h4>6. Complex Query: Expensive Products</h4>
            <pre><code>Product::where('price', '>', 1000000)
    ->orderBy('price', 'desc')
    ->limit(5)
    ->get()</code></pre>
            
            @if(count($expensiveProducts) > 0)
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
                    @foreach($expensiveProducts as $index => $product)
                    <tr>
                        <td><strong>#{{ $index + 1 }}</strong></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td class="price">{{ $product->formatted_price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="no-data">No expensive products found.</p>
            @endif
        </div>
    </div>

    <div class="features-section">
        <h3>✨ Eloquent Features</h3>
        
        <div class="feature-category">
            <h4>🔍 Query Scopes</h4>
            <p>Reusable query constraints yang didefinisikan di Model:</p>
            <pre><code>// Local Scope
public function scopeActive($query)
{
    return $query->where('is_active', true);
}

public function scopeInStock($query)
{
    return $query->where('stock', '>', 0);
}

// Usage
$products = Product::active()->inStock()->get();</code></pre>
        </div>

        <div class="feature-category">
            <h4>🎨 Accessors & Mutators</h4>
            <p>Transform data saat retrieve atau save:</p>
            <pre><code>// Accessor (get)
public function getFormattedPriceAttribute()
{
    return 'Rp ' . number_format($this->price, 0, ',', '.');
}

// Usage
echo $product->formatted_price; // Rp 1.500.000

// Mutator (set)
public function setNameAttribute($value)
{
    $this->attributes['name'] = ucwords($value);
}</code></pre>
        </div>

        <div class="feature-category">
            <h4>🔄 Model Events</h4>
            <p>Hook into model lifecycle:</p>
            <pre><code>protected static function booted()
{
    static::creating(function ($product) {
        // Before creating
    });
    
    static::created(function ($product) {
        // After created
    });
    
    static::updating(function ($product) {
        // Before updating
    });
}</code></pre>
        </div>

        <div class="feature-category">
            <h4>🔗 Relationships</h4>
            <p>Define relationships antar models:</p>
            <pre><code>// One to Many
public function orders()
{
    return $this->hasMany(Order::class);
}

// Belongs To
public function category()
{
    return $this->belongsTo(Category::class);
}

// Many to Many
public function tags()
{
    return $this->belongsToMany(Tag::class);
}</code></pre>
        </div>
    </div>

    <div class="crud-section">
        <h3>🔄 CRUD Operations dengan Eloquent</h3>
        
        <div class="crud-grid">
            <div class="crud-card">
                <h4>📖 READ</h4>
                <pre><code>// Get all
$products = Product::all();

// Find by ID
$product = Product::find(1);

// Find or fail (404 if not found)
$product = Product::findOrFail(1);

// First match
$product = Product::where('name', 'Laptop')->first();

// Get with conditions
$products = Product::where('price', '>', 1000000)
    ->orderBy('name')
    ->get();</code></pre>
            </div>

            <div class="crud-card">
                <h4>➕ CREATE</h4>
                <pre><code>// Method 1: Mass assignment
$product = Product::create([
    'name' => 'New Product',
    'price' => 500000,
    'stock' => 100,
    'category' => 'Electronics',
    'is_active' => true
]);

// Method 2: New instance
$product = new Product();
$product->name = 'New Product';
$product->price = 500000;
$product->save();</code></pre>
            </div>

            <div class="crud-card">
                <h4>✏️ UPDATE</h4>
                <pre><code>// Method 1: Find and update
$product = Product::find(1);
$product->price = 600000;
$product->stock = 50;
$product->save();

// Method 2: Mass update
Product::where('category', 'Electronics')
    ->update(['is_active' => true]);

// Method 3: Update or create
Product::updateOrCreate(
    ['name' => 'Product'],
    ['price' => 500000]
);</code></pre>
            </div>

            <div class="crud-card">
                <h4>🗑️ DELETE</h4>
                <pre><code>// Find and delete
$product = Product::find(1);
$product->delete();

// Delete by ID
Product::destroy(1);

// Delete multiple
Product::destroy([1, 2, 3]);

// Delete with condition
Product::where('stock', 0)->delete();

// Soft delete (if configured)
$product->delete(); // Soft delete
$product->forceDelete(); // Permanent</code></pre>
            </div>
        </div>
    </div>

    <div class="pros-cons-section">
        <h3>⚖️ Pros & Cons</h3>
        <div class="pros-cons-grid">
            <div class="pros-box">
                <h4>✅ Kelebihan</h4>
                <ul>
                    <li><strong>Easy to Use:</strong> Syntax paling intuitif dan mudah</li>
                    <li><strong>Rich Features:</strong> Accessors, mutators, scopes, events</li>
                    <li><strong>Relationships:</strong> Mudah handle relasi antar tables</li>
                    <li><strong>Active Record:</strong> Object-oriented approach</li>
                    <li><strong>Auto Timestamps:</strong> created_at & updated_at otomatis</li>
                    <li><strong>Soft Deletes:</strong> Built-in soft delete support</li>
                    <li><strong>Mass Assignment:</strong> Bulk insert/update dengan mudah</li>
                </ul>
            </div>

            <div class="cons-box">
                <h4>❌ Kekurangan</h4>
                <ul>
                    <li><strong>Performance:</strong> Overhead lebih besar dari raw/builder</li>
                    <li><strong>N+1 Problem:</strong> Bisa terjadi jika tidak hati-hati</li>
                    <li><strong>Memory:</strong> Load banyak data bisa memory intensive</li>
                    <li><strong>Learning Curve:</strong> Butuh waktu untuk master advanced features</li>
                    <li><strong>Magic Methods:</strong> Bisa confusing untuk beginners</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tips-section">
        <h3>💡 Best Practices</h3>
        <div class="tips-grid">
            <div class="tip-card">
                <div class="tip-icon">⚡</div>
                <h4>Eager Loading</h4>
                <p>Gunakan <code>with()</code> untuk avoid N+1 query problem</p>
                <code>Product::with('category')->get()</code>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">🔒</div>
                <h4>Mass Assignment Protection</h4>
                <p>Selalu define <code>$fillable</code> atau <code>$guarded</code></p>
                <code>protected $fillable = ['name', 'price'];</code>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">🎯</div>
                <h4>Use Scopes</h4>
                <p>Buat reusable query scopes untuk DRY code</p>
                <code>Product::active()->inStock()->get()</code>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">📊</div>
                <h4>Chunking Large Datasets</h4>
                <p>Gunakan <code>chunk()</code> untuk process banyak data</p>
                <code>Product::chunk(100, function($products) {})</code>
            </div>
        </div>
    </div>

    <div class="summary-section">
        <h3>🎓 Summary: Kapan Menggunakan Eloquent?</h3>
        <div class="summary-box">
            <p><strong>Gunakan Eloquent ORM ketika:</strong></p>
            <ul>
                <li>✅ Melakukan standard CRUD operations</li>
                <li>✅ Butuh relationships antar tables</li>
                <li>✅ Butuh model features (accessors, scopes, events)</li>
                <li>✅ Rapid application development</li>
                <li>✅ Code readability adalah prioritas</li>
                <li>✅ Working dengan single records atau small datasets</li>
            </ul>
            
            <p><strong>Pertimbangkan Query Builder atau Raw Query ketika:</strong></p>
            <ul>
                <li>⚠️ Performance critical operations</li>
                <li>⚠️ Complex reporting queries</li>
                <li>⚠️ Bulk operations pada ribuan records</li>
                <li>⚠️ Database-specific features diperlukan</li>
            </ul>
        </div>
    </div>

    <div class="navigation-footer">
        <a href="{{ route('model.query-builder') }}" class="btn btn-secondary">← Previous: Query Builder</a>
        <a href="{{ route('model.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
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
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
        color: #28a745;
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
        color: #28a745;
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

    .count-badge {
        background: #d4edda;
        color: #155724;
        padding: 10px 15px;
        border-radius: 5px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .count-badge.alert {
        background: #fff3cd;
        color: #856404;
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
        background: #28a745;
        color: white;
        font-weight: 600;
    }

    .demo-table tbody tr:hover {
        background: #f0fff4;
    }

    .demo-table .price {
        color: #28a745;
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

    .badge-warning {
        background: #ffc107;
        color: #000;
    }

    .no-data {
        padding: 20px;
        text-align: center;
        color: #6c757d;
        font-style: italic;
    }

    .features-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .features-section h3 {
        margin-top: 0;
        color: #28a745;
    }

    .feature-category {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid #28a745;
    }

    .feature-category h4 {
        margin-top: 0;
        color: #333;
    }

    .feature-category pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 10px 0 0 0;
    }

    .feature-category code {
        font-family: 'Courier New', monospace;
        font-size: 0.85em;
        line-height: 1.6;
    }

    .crud-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .crud-section h3 {
        margin-top: 0;
        color: #28a745;
    }

    .crud-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .crud-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-top: 4px solid #28a745;
    }

    .crud-card h4 {
        margin-top: 0;
        color: #333;
    }

    .crud-card pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 10px 0 0 0;
    }

    .crud-card code {
        font-family: 'Courier New', monospace;
        font-size: 0.8em;
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
        color: #28a745;
    }

    .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .tip-card {
        background: #f0fff4;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        border: 2px solid #28a745;
    }

    .tip-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .tip-card h4 {
        margin: 0 0 10px 0;
        color: #28a745;
    }

    .tip-card p {
        margin: 0 0 10px 0;
        color: #666;
        line-height: 1.5;
    }

    .tip-card code {
        display: block;
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 8px 12px;
        border-radius: 5px;
        font-family: 'Courier New', monospace;
        font-size: 0.85em;
    }

    .summary-section {
        background: linear-gradient(135deg, #f0fff4 0%, #d4edda 100%);
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 30px;
        border: 2px solid #28a745;
    }

    .summary-section h3 {
        margin-top: 0;
        color: #155724;
    }

    .summary-box p {
        color: #155724;
        font-weight: 600;
        margin: 15px 0 10px 0;
    }

    .summary-box ul {
        margin: 10px 0;
        padding-left: 20px;
        line-height: 1.8;
        color: #155724;
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
        background: #28a745;
        color: white;
    }

    .btn-primary:hover {
        background: #218838;
    }
</style>
@endsection
