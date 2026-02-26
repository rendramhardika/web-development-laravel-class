<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Parameter Practice</title>
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
            max-width: 800px;
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #2c3e50;
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #3498db;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .btn {
            background: #3498db;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background 0.3s ease;
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
        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .code-example {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 10px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            margin: 10px 0;
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
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/dashboard" class="back-link">← Back to Dashboard</a>
        
        <h1>🔍 Query Parameter Practice</h1>
        <p class="subtitle">Belajar menerima data melalui URL query parameters</p>

        <div class="info-box">
            <strong>📖 Konsep:</strong> Query parameters digunakan untuk filter, search, dan pagination.
            Data dikirim melalui URL setelah tanda ? (question mark).
        </div>

        <form method="GET" action="/practice/search">
            <div class="form-group">
                <label for="name">Product Name (Search):</label>
                <input type="text" id="name" name="name" placeholder="Cari nama produk...">
                <small style="color: #7f8c8d;">Contoh: laptop, mouse, keyboard</small>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="min_price">Minimum Price:</label>
                    <input type="number" id="min_price" name="min_price" placeholder="0" min="0">
                </div>
                <div class="form-group">
                    <label for="max_price">Maximum Price:</label>
                    <input type="number" id="max_price" name="max_price" placeholder="999999" min="0">
                </div>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option value="all">All Categories</option>
                    <option value="electronics">Electronics</option>
                    <option value="furniture">Furniture</option>
                    <option value="books">Books</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sort">Sort By:</label>
                <select id="sort" name="sort">
                    <option value="name">Name (A-Z)</option>
                    <option value="price_asc">Price (Low to High)</option>
                    <option value="price_desc">Price (High to Low)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="page">Page:</label>
                <input type="number" id="page" name="page" value="1" min="1">
                <small style="color: #7f8c8d;">Untuk pagination</small>
            </div>

            <button type="submit" class="btn">Search Products</button>
            <a href="/practice/search" class="btn btn-secondary">Reset</a>
        </form>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Code:</h3>
            <div class="code-example">
// Mengambil query parameters
$name = $request->query('name', '');
$minPrice = $request->query('min_price', 0);
$maxPrice = $request->query('max_price', 999999);
$category = $request->query('category', 'all');
$sortBy = $request->query('sort', 'name');
$page = $request->query('page', 1);

// Default values digunakan jika parameter tidak ada
            </div>

            <h3>🌐 URL Examples:</h3>
            <div class="code-example">
/practice/search?name=laptop&category=electronics
/practice/search?min_price=1000000&max_price=5000000&sort=price_asc
/practice/search?page=2&sort=name
            </div>

            <h3>💡 Tips:</h3>
            <ul style="color: #555;">
                <li>Gunakan default values untuk parameter opsional</li>
                <li>Query parameters cocok untuk GET requests</li>
                <li>URL length terbatas (max 2048 karakter)</li>
                <li>Tidak cocok untuk sensitive data (passwords)</li>
            </ul>
        </div>
    </div>
</body>
</html>
