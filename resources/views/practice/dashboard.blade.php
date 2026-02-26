<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Data Handling Practice</title>
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
            max-width: 1200px;
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
            font-size: 2.5em;
        }
        .subtitle {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 40px;
            font-size: 1.1em;
        }
        .practice-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        .practice-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 25px;
            border: 2px solid #e1e8ed;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .practice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            border-color: #3498db;
        }
        .practice-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71, #f39c12, #e74c3c);
        }
        .practice-number {
            display: inline-block;
            width: 30px;
            height: 30px;
            background: #3498db;
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            margin-right: 10px;
        }
        .practice-title {
            color: #2c3e50;
            font-size: 1.4em;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .practice-description {
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .method-tag {
            display: inline-block;
            background: #ecf0f1;
            color: #2c3e50;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85em;
            margin: 2px;
            font-family: monospace;
        }
        .practice-links {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
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
        .example-url {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 8px 12px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            margin: 5px 0;
            word-break: break-all;
        }
        .difficulty {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: bold;
            margin-left: 10px;
        }
        .difficulty-easy { background: #d5f4e6; color: #27ae60; }
        .difficulty-medium { background: #fef9e7; color: #f39c12; }
        .difficulty-hard { background: #fadbd8; color: #e74c3c; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 MVC Data Handling Practice</h1>
        <p class="subtitle">Pelajari berbagai cara menerima data dari User ke Controller dan View</p>

        <div class="practice-grid">
            <!-- Query Parameter Practice -->
            <div class="practice-card">
                <h3 class="practice-title">
                    <span class="practice-number">1</span>
                    Query Parameter
                    <span class="difficulty difficulty-easy">Easy</span>
                </h3>
                <p class="practice-description">
                    Belajar menerima data melalui URL query parameters untuk search, filter, dan pagination.
                </p>
                <div class="method-tags">
                    <span class="method-tag">GET</span>
                    <span class="method-tag">?key=value</span>
                    <span class="method-tag">$request->query()</span>
                </div>
                <div class="example-url">
                    /practice/search?name=laptop&min_price=1000&sort=price_asc
                </div>
                <div class="practice-links">
                    <a href="/practice/query-form" class="btn">Try Form</a>
                    <a href="/practice/search?category=electronics&sort=name" class="btn btn-success">See Result</a>
                </div>
            </div>

            <!-- Path Variable Practice -->
            <div class="practice-card">
                <h3 class="practice-title">
                    <span class="practice-number">2</span>
                    Path Variable
                    <span class="difficulty difficulty-easy">Easy</span>
                </h3>
                <p class="practice-description">
                    Menggunakan URL segments untuk resource identification dan routing parameters.
                </p>
                <div class="method-tags">
                    <span class="method-tag">GET</span>
                    <span class="method-tag">/users/{id}</span>
                    <span class="method-tag">Route parameters</span>
                </div>
                <div class="example-url">
                    /practice/users/123/profile/overview
                </div>
                <div class="practice-links">
                    <a href="/practice/path-form" class="btn">Try Form</a>
                    <a href="/practice/users/123/profile" class="btn btn-success">See Result</a>
                </div>
            </div>

            <!-- Request Body Practice -->
            <div class="practice-card">
                <h3 class="practice-title">
                    <span class="practice-number">3</span>
                    Request Body
                    <span class="difficulty difficulty-medium">Medium</span>
                </h3>
                <p class="practice-description">
                    Form submission dan JSON payload untuk data creation dan updates.
                </p>
                <div class="method-tags">
                    <span class="method-tag">POST</span>
                    <span class="method-tag">Form Data</span>
                    <span class="method-tag">JSON</span>
                </div>
                <div class="example-url">
                    POST /practice/process-form
                </div>
                <div class="practice-links">
                    <a href="/practice/body-form" class="btn">Try Form</a>
                    <a href="/practice/api/products" class="btn btn-success">API Demo</a>
                </div>
            </div>

            <!-- File Upload Practice -->
            <div class="practice-card">
                <h3 class="practice-title">
                    <span class="practice-number">4</span>
                    File Upload
                    <span class="difficulty difficulty-medium">Medium</span>
                </h3>
                <p class="practice-description">
                    Single dan multiple file upload dengan validation dan processing.
                </p>
                <div class="method-tags">
                    <span class="method-tag">POST</span>
                    <span class="method-tag">multipart/form-data</span>
                    <span class="method-tag">$request->file()</span>
                </div>
                <div class="example-url">
                    POST /practice/upload/avatar
                </div>
                <div class="practice-links">
                    <a href="/practice/upload-form" class="btn">Try Upload</a>
                    <a href="/practice/upload/multiple" class="btn btn-success">Multi Upload</a>
                </div>
            </div>

            <!-- Headers & Cookies Practice -->
            <div class="practice-card">
                <h3 class="practice-title">
                    <span class="practice-number">5</span>
                    Headers & Cookies
                    <span class="difficulty difficulty-hard">Hard</span>
                </h3>
                <p class="practice-description">
                    Membaca HTTP headers dan cookies untuk authentication dan session management.
                </p>
                <div class="method-tags">
                    <span class="method-tag">Headers</span>
                    <span class="method-tag">Cookies</span>
                    <span class="method-token">$request->header()</span>
                </div>
                <div class="example-url">
                    GET /practice/analyze-request
                </div>
                <div class="practice-links">
                    <a href="/practice/analyze-request" class="btn">Analyze Request</a>
                    <a href="/practice/analyze-request" class="btn btn-success">Check Headers</a>
                </div>
            </div>

            <!-- Mixed Methods Practice -->
            <div class="practice-card">
                <h3 class="practice-title">
                    <span class="practice-number">6</span>
                    Mixed Methods
                    <span class="difficulty difficulty-hard">Hard</span>
                </h3>
                <p class="practice-description">
                    Kombinasi semua metode input dalam satu endpoint yang kompleks.
                </p>
                <div class="method-tags">
                    <span class="method-tag">POST</span>
                    <span class="method-tag">Path + Query + Body</span>
                    <span class="method-tag">Files + Headers</span>
                </div>
                <div class="example-url">
                    POST /practice/forms/123/submit?source=web
                </div>
                <div class="practice-links">
                    <a href="/practice/complex-form" class="btn">Try Complex</a>
                    <a href="/practice/forms/456/submit?version=2.0" class="btn btn-success">Test Mixed</a>
                </div>
            </div>
        </div>

        <div style="margin-top: 40px; padding: 20px; background: #ecf0f1; border-radius: 8px;">
            <h3 style="color: #2c3e50; margin-top: 0;">📚 Learning Objectives</h3>
            <ul style="color: #555;">
                <li>Memahami berbagai cara menerima input dari user</li>
                <li>Mengimplementasikan validation untuk setiap input type</li>
                <li>Memproses data di Controller dengan benar</li>
                <li>Menampilkan hasil di View dengan formatting yang tepat</li>
                <li>Praktik best practices untuk security dan performance</li>
            </ul>
        </div>
    </div>
</body>
</html>
