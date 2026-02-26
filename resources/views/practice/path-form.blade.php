<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Path Variable Practice</title>
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
        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .demo-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .demo-section h3 {
            margin-top: 0;
            color: #2c3e50;
        }
        .url-example {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 10px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            margin: 10px 0;
            word-break: break-all;
        }
        .try-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
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
        .btn-success {
            background: #27ae60;
        }
        .btn-success:hover {
            background: #229954;
        }
        .btn-warning {
            background: #f39c12;
        }
        .btn-warning:hover {
            background: #e67e22;
        }
        .code-block {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            overflow-x: auto;
            margin: 10px 0;
        }
        .highlight {
            color: #f39c12;
            font-weight: bold;
        }
        .param-type {
            display: inline-block;
            background: #ecf0f1;
            color: #2c3e50;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.8em;
            font-family: monospace;
            margin: 0 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/dashboard" class="back-link">← Back to Dashboard</a>
        
        <h1>🛤️ Path Variable Practice</h1>
        <p class="subtitle">Belajar menggunakan URL segments untuk resource identification</p>

        <div class="info-box">
            <strong>📖 Konsep:</strong> Path variables digunakan untuk mengidentifikasi resources spesifik.
            Data diambil langsung dari URL pattern tanpa query parameters.
        </div>

        <div class="demo-section">
            <h3>👤 User Profile Routes</h3>
            <p>Route pattern: <span class="param-type">/practice/users/{userId}/profile/{section?}</span></p>
            
            <div class="url-example">
                /practice/users/123/profile/overview
            </div>
            
            <div class="code-block">
// Controller method signature
public function getUserProfile($userId, $section = 'overview')
{
    // $userId = 123
    // $section = 'overview' (default value)
}
            </div>

            <div class="try-links">
                <a href="/practice/users/123/profile" class="btn btn-success">User 123 - Overview</a>
                <a href="/practice/users/456/profile/edit" class="btn btn-warning">User 456 - Edit</a>
                <a href="/practice/users/789/profile/settings" class="btn">User 789 - Settings</a>
            </div>
        </div>

        <div class="demo-section">
            <h3>📦 Category Products Routes</h3>
            <p>Route pattern: <span class="param-type">/practice/products/{category}/{subCategory?}</span></p>
            
            <div class="url-example">
                /practice/products/electronics/laptops
            </div>
            
            <div class="code-block">
// Controller method signature
public function getCategoryProducts($category, $subCategory = null)
{
    // $category = 'electronics'
    // $subCategory = 'laptops' (optional)
}
            </div>

            <div class="try-links">
                <a href="/practice/products/electronics" class="btn btn-success">All Electronics</a>
                <a href="/practice/products/electronics/laptops" class="btn btn-warning">Laptops Only</a>
                <a href="/practice/products/electronics/phones" class="btn">Phones Only</a>
                <a href="/practice/products/furniture" class="btn btn-success">All Furniture</a>
                <a href="/practice/products/furniture/chairs" class="btn btn-warning">Chairs Only</a>
            </div>
        </div>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Route Definitions (web.php):</h3>
            <div class="code-block">
// Required parameter
Route::get('/practice/users/{userId}/profile', [DataHandlingController::class, 'getUserProfile']);

// Optional parameter with default value
Route::get('/practice/users/{userId}/profile/{section}', [DataHandlingController::class, 'getUserProfile']);

// Multiple parameters
Route::get('/practice/products/{category}/{subCategory}', [DataHandlingController::class, 'getCategoryProducts']);
            </div>

            <h3>💡 Best Practices:</h3>
            <ul style="color: #555;">
                <li>Gunakan <span class="highlight">required parameters</span> untuk essential resources (ID, slug)</li>
                <li>Gunakan <span class="highlight">optional parameters</span> untuk additional filtering</li>
                <li>Gunakan <span class="highlight">default values</span> untuk optional parameters</li>
                <li>Path variables lebih SEO-friendly daripada query parameters</li>
                <li>Cocok untuk RESTful API design</li>
            </ul>

            <h3>🆚 Path Variables vs Query Parameters:</h3>
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <tr style="background: #ecf0f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Path Variables</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Query Parameters</th>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <strong>Use:</strong> Resource identification<br>
                        <strong>Example:</strong> /users/123<br>
                        <strong>SEO:</strong> Friendly
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <strong>Use:</strong> Filtering, pagination<br>
                        <strong>Example:</strong> /users?page=2<br>
                        <strong>SEO:</strong> Less friendly
                    </td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 20px; text-align: center;">
            <a href="/practice/dashboard" class="btn">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
