<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Parameter Results</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 30px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .params-display {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-family: 'Courier New', monospace;
        }
        .param-item {
            margin: 5px 0;
        }
        .param-key {
            color: #3498db;
            font-weight: bold;
        }
        .param-value {
            color: #2ecc71;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .product-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 20px;
            border: 2px solid #e1e8ed;
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .product-name {
            font-size: 1.2em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 1.4em;
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .product-category {
            background: #3498db;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85em;
            display: inline-block;
        }
        .no-results {
            text-align: center;
            padding: 40px;
            background: #f8f9fa;
            border-radius: 8px;
            color: #7f8c8d;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 0.9em;
            opacity: 0.9;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
            font-weight: 500;
        }
        .btn:hover {
            background: #2980b9;
        }
        .btn-secondary {
            background: #95a5a6;
            margin-left: 10px;
        }
        .btn-secondary:hover {
            background: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/query-form" class="back-link">← Back to Search Form</a>
        
        <h1>🔍 Search Results</h1>
        <p class="subtitle">Query Parameters Processing Results</p>

        <div class="params-display">
            <h3 style="margin-top: 0; color: #ecf0f1;">📊 Received Parameters:</h3>
            <div class="param-item">
                <span class="param-key">name:</span> 
                <span class="param-value">{{ $name ?: '(empty)' }}</span>
            </div>
            <div class="param-item">
                <span class="param-key">min_price:</span> 
                <span class="param-value">Rp {{ number_format($minPrice, 0, ',', '.') }}</span>
            </div>
            <div class="param-item">
                <span class="param-key">max_price:</span> 
                <span class="param-value">Rp {{ number_format($maxPrice, 0, ',', '.') }}</span>
            </div>
            <div class="param-item">
                <span class="param-key">category:</span> 
                <span class="param-value">{{ $category }}</span>
            </div>
            <div class="param-item">
                <span class="param-key">sort:</span> 
                <span class="param-value">{{ $sortBy }}</span>
            </div>
            <div class="param-item">
                <span class="param-key">page:</span> 
                <span class="param-value">{{ $page }}</span>
            </div>
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">{{ count($products) }}</div>
                <div class="stat-label">Products Found</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $minPrice > 0 ? 'Rp ' . number_format($minPrice, 0, ',', '.') : 'Any' }}</div>
                <div class="stat-label">Min Price Filter</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $maxPrice < 999999 ? 'Rp ' . number_format($maxPrice, 0, ',', '.') : 'Any' }}</div>
                <div class="stat-label">Max Price Filter</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ ucfirst($category) }}</div>
                <div class="stat-label">Category Filter</div>
            </div>
        </div>

        @if(count($products) > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-name">{{ $product['name'] }}</div>
                        <div class="product-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                        <div class="product-category">{{ ucfirst($product['category']) }}</div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-results">
                <h3>😔 No Products Found</h3>
                <p>Try adjusting your search criteria or filters.</p>
                <a href="/practice/query-form" class="btn">Modify Search</a>
            </div>
        @endif

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Processing:</h3>
            <pre style="background: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 4px; overflow-x: auto;">
// Filter products based on query parameters
$filteredProducts = collect($allProducts);

// Filter by name (case-insensitive contains)
if (!empty($name)) {
    $filteredProducts = $filteredProducts->filter(function($product) use ($name) {
        return stripos($product['name'], $name) !== false;
    });
}

// Filter by category
if ($category !== 'all') {
    $filteredProducts = $filteredProducts->where('category', $category);
}

// Filter by price range
$filteredProducts = $filteredProducts
    ->where('price', '>=', $minPrice)
    ->where('price', '<=', $maxPrice);

// Sort products
if ($sortBy === 'price_asc') {
    $filteredProducts = $filteredProducts->sortBy('price');
} elseif ($sortBy === 'price_desc') {
    $filteredProducts = $filteredProducts->sortByDesc('price');
} else {
    $filteredProducts = $filteredProducts->sortBy('name');
}

$products = $filteredProducts->values()->all();
            </pre>

            <h3>🧪 Test Results:</h3>
            <div style="background: #e3f2fd; padding: 15px; border-radius: 8px; margin-top: 15px;">
                <strong>Search Term:</strong> "{{ $name }}"<br>
                <strong>Category:</strong> {{ $category }}<br>
                <strong>Sort By:</strong> {{ $sortBy }}<br>
                <strong>Products Found:</strong> {{ count($products) }}<br>
                <strong>Filters Applied:</strong> 
                {{ !empty($name) ? 'Name: ' . $name : '' }}
                {{ $category !== 'all' ? 'Category: ' . $category : '' }}
                {{ $sortBy !== 'name' ? 'Sort: ' . $sortBy : '' }}
            </div>
            
            <h3>📊 Available Products (6 Electronics):</h3>
            <div style="background: #f0f0f0; padding: 10px; border-radius: 5px; font-size: 0.9em;">
                • Laptop ASUS ROG (Rp 15.000.000)<br>
                • Laptop Lenovo ThinkPad (Rp 12.000.000)<br>
                • Mouse Logitech MX Master (Rp 1.500.000)<br>
                • Keyboard Mechanical (Rp 800.000)<br>
                • Monitor LG 27 inch (Rp 3.500.000)<br>
                • Webcam HD (Rp 750.000)
            </div>

            <div style="margin-top: 20px;">
                <a href="/practice/query-form" class="btn">New Search</a>
                <a href="/practice/search" class="btn btn-secondary">Clear Filters</a>
                <a href="/practice/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
