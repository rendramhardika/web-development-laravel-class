@extends('layouts.model')

@section('title', 'Model untuk Business Logic')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>💼 Model untuk Business Logic</h1>
        <p class="subtitle">Memisahkan business logic ke dalam Model untuk code yang lebih clean dan reusable</p>
    </div>

    @if(!$product)
    <div class="alert alert-warning">
        <strong>⚠️ No Data:</strong> Silakan jalankan migration dan seeder terlebih dahulu.
        <pre>php artisan migrate
php artisan db:seed --class=ProductSeeder</pre>
    </div>
    @else

    <div class="content-section">
        <h2>✅ Keuntungan Business Logic di Model</h2>
        <ul>
            <li><strong>Reusable:</strong> Logic bisa digunakan di berbagai controller</li>
            <li><strong>Testable:</strong> Mudah untuk melakukan unit testing</li>
            <li><strong>Maintainable:</strong> Perubahan logic hanya di satu tempat</li>
            <li><strong>Clean Controller:</strong> Controller tetap slim dan fokus pada routing</li>
            <li><strong>Single Responsibility:</strong> Setiap class punya tanggung jawab yang jelas</li>
        </ul>
    </div>

    <div class="comparison-grid">
        <div class="comparison-box bad">
            <h3>❌ Tanpa Model</h3>
            <pre><code>// Di Controller
$discountedPrice = $product['price'] - 
    ($product['price'] * 10 / 100);

$formattedPrice = 'Rp ' . 
    number_format($product['price'], 0, ',', '.');

$isInStock = $product['stock'] > 0;</code></pre>
            <p class="note">Logic tersebar di controller, sulit di-reuse</p>
        </div>

        <div class="comparison-box good">
            <h3>✅ Dengan Model</h3>
            <pre><code>// Di Model
public function calculateDiscount($percentage) {
    return $this->price - 
        ($this->price * $percentage / 100);
}

public function getFormattedPriceAttribute() {
    return 'Rp ' . number_format($this->price, 0, ',', '.');
}

public function isInStock() {
    return $this->stock > 0;
}

// Di Controller
$discountedPrice = $product->calculateDiscount(10);
$formattedPrice = $product->formatted_price;
$isInStock = $product->isInStock();</code></pre>
            <p class="note">Logic terpusat di Model, mudah di-reuse</p>
        </div>
    </div>

    <div class="demo-section">
        <h3>🎯 Live Demo: Product Business Logic</h3>
        
        <div class="product-card">
            <h4>{{ $product->name }}</h4>
            <p class="description">{{ $product->description }}</p>
            
            <div class="product-details">
                <div class="detail-item">
                    <span class="label">Category:</span>
                    <span class="value">{{ $product->category }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Stock:</span>
                    <span class="value">{{ $product->stock }} units</span>
                </div>
                <div class="detail-item">
                    <span class="label">Status:</span>
                    <span class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="methods-grid">
            <div class="method-demo">
                <h4>💰 Price Calculation Methods</h4>
                <div class="result-box">
                    <div class="result-item">
                        <strong>Original Price:</strong>
                        <span class="price">{{ $formattedPrice }}</span>
                    </div>
                    <div class="result-item">
                        <strong>10% Discount:</strong>
                        <span class="price">Rp {{ number_format($discount10, 0, ',', '.') }}</span>
                        <code>$product->calculateDiscount(10)</code>
                    </div>
                    <div class="result-item">
                        <strong>20% Discount:</strong>
                        <span class="price">Rp {{ number_format($discount20, 0, ',', '.') }}</span>
                        <code>$product->calculateDiscount(20)</code>
                    </div>
                </div>
            </div>

            <div class="method-demo">
                <h4>📦 Stock Management Methods</h4>
                <div class="result-box">
                    <div class="result-item">
                        <strong>Is In Stock:</strong>
                        <span class="badge {{ $inStock ? 'badge-success' : 'badge-danger' }}">
                            {{ $inStock ? 'Yes' : 'No' }}
                        </span>
                        <code>$product->isInStock()</code>
                    </div>
                    <div class="result-item">
                        <strong>Is Low Stock (≤10):</strong>
                        <span class="badge {{ $lowStock ? 'badge-warning' : 'badge-info' }}">
                            {{ $lowStock ? 'Yes' : 'No' }}
                        </span>
                        <code>$product->isLowStock()</code>
                    </div>
                    <div class="result-item">
                        <strong>Can Purchase 5 units:</strong>
                        <span class="badge {{ $canPurchase5 ? 'badge-success' : 'badge-danger' }}">
                            {{ $canPurchase5 ? 'Yes' : 'No' }}
                        </span>
                        <code>$product->canBePurchased(5)</code>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="code-section">
        <h3>📝 Model Implementation</h3>
        <pre><code>class Product extends Model
{
    // Business Logic: Price Calculation
    public function calculateDiscount($percentage)
    {
        return $this->price - ($this->price * $percentage / 100);
    }

    // Accessor: Formatted Price
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    // Business Logic: Stock Check
    public function isInStock()
    {
        return $this->stock > 0;
    }

    // Business Logic: Low Stock Alert
    public function isLowStock($threshold = 10)
    {
        return $this->stock > 0 && $this->stock <= $threshold;
    }

    // Business Logic: Purchase Validation
    public function canBePurchased($quantity)
    {
        return $this->is_active && $this->stock >= $quantity;
    }
}</code></pre>
    </div>

    <div class="benefits-section">
        <h3>🎯 Benefits of Model Business Logic</h3>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">🔄</div>
                <h4>Reusability</h4>
                <p>Gunakan method yang sama di berbagai controller tanpa duplikasi code</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">🧪</div>
                <h4>Testability</h4>
                <p>Mudah membuat unit test untuk setiap business logic method</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">📝</div>
                <h4>Maintainability</h4>
                <p>Update logic di satu tempat, semua yang menggunakan akan terupdate</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">🎯</div>
                <h4>Single Responsibility</h4>
                <p>Model fokus pada business logic, Controller fokus pada routing</p>
            </div>
        </div>
    </div>

    @endif

    <div class="navigation-footer">
        <a href="{{ route('model.without-model') }}" class="btn btn-secondary">← Previous: Without Model</a>
        <a href="{{ route('model.validation') }}" class="btn btn-primary">Next: Validation →</a>
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

    .comparison-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .comparison-box {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .comparison-box.bad {
        background: #fff5f5;
        border: 2px solid #dc3545;
    }

    .comparison-box.good {
        background: #f0fff4;
        border: 2px solid #28a745;
    }

    .comparison-box h3 {
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

    .comparison-box .note {
        margin: 10px 0 0 0;
        font-style: italic;
        color: #666;
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

    .product-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .product-card h4 {
        margin: 0 0 10px 0;
        font-size: 1.8em;
    }

    .product-card .description {
        margin: 0 0 20px 0;
        opacity: 0.9;
    }

    .product-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
    }

    .detail-item {
        background: rgba(255,255,255,0.1);
        padding: 10px 15px;
        border-radius: 5px;
    }

    .detail-item .label {
        display: block;
        font-size: 0.85em;
        opacity: 0.8;
        margin-bottom: 5px;
    }

    .detail-item .value {
        font-weight: 600;
        font-size: 1.1em;
    }

    .methods-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 20px;
    }

    .method-demo {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
    }

    .method-demo h4 {
        margin-top: 0;
        color: #333;
    }

    .result-box {
        background: white;
        padding: 15px;
        border-radius: 5px;
    }

    .result-item {
        padding: 12px;
        border-bottom: 1px solid #e9ecef;
    }

    .result-item:last-child {
        border-bottom: none;
    }

    .result-item strong {
        display: block;
        margin-bottom: 8px;
        color: #666;
        font-size: 0.9em;
    }

    .result-item .price {
        display: block;
        font-size: 1.3em;
        color: #28a745;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .result-item code {
        display: block;
        background: #f8f9fa;
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 0.85em;
        color: #667eea;
        margin-top: 5px;
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

    .badge-warning {
        background: #ffc107;
        color: #000;
    }

    .badge-info {
        background: #17a2b8;
        color: white;
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

    .benefits-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .benefits-section h3 {
        margin-top: 0;
        color: #28a745;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .benefit-card {
        background: #f0fff4;
        padding: 20px;
        border-radius: 8px;
        border: 2px solid #28a745;
        text-align: center;
    }

    .benefit-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .benefit-card h4 {
        margin: 0 0 10px 0;
        color: #28a745;
    }

    .benefit-card p {
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
        background: #667eea;
        color: white;
    }

    .btn-primary:hover {
        background: #5568d3;
    }
</style>
@endsection
