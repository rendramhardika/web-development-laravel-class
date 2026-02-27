<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Frontend Development - Laravel Blade')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            min-height: 100vh;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 2rem 0;
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        nav {
            background: #34495e;
            padding: 1rem 0;
            border-bottom: 3px solid #3498db;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 0 2rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.1);
        }

        nav a:hover, nav a.active {
            background: #3498db;
            transform: translateY(-2px);
        }

        main {
            padding: 2rem;
            min-height: calc(100vh - 200px);
        }

        .breadcrumb {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 2rem;
            border-left: 4px solid #3498db;
        }

        .breadcrumb a {
            color: #3498db;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .content-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .content-section h2 {
            color: #2c3e50;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #3498db;
        }

        .demo-section {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
        }

        .demo-section h3 {
            color: #495057;
            margin-bottom: 1rem;
        }

        .code-block {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 1rem;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            overflow-x: auto;
            margin: 1rem 0;
        }

        .interactive-demo {
            background: #e3f2fd;
            border: 1px solid #2196f3;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
        }

        .interactive-demo h3 {
            color: #1976d2;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #dee2e6;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        .btn {
            background: #3498db;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 1.5rem;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .card .btn {
            margin-top: 1rem;
            display: inline-block;
        }

        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin: 1rem 0;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            .container {
                margin: 0;
            }

            main {
                padding: 1rem;
            }

            header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>@yield('header-title', 'Frontend Development')</h1>
            <p>@yield('header-subtitle', 'Laravel Blade Template Practice')</p>
        </header>

        <nav>
            <ul>
                <li><a href="/frontend/dashboard" {{ request()->is('frontend/dashboard') ? 'class="active"' : '' }}>🏠 Dashboard</a></li>
                <li><a href="/frontend/architecture" {{ request()->is('frontend/architecture') ? 'class="active"' : '' }}>🏗️ Architecture</a></li>
                <li><a href="/frontend/blade-basic" {{ request()->is('frontend/blade-basic') ? 'class="active"' : '' }}>📝 Blade Basic</a></li>
                <li><a href="/frontend/layouts" {{ request()->is('frontend/layouts') ? 'class="active"' : '' }}>🎨 Layouts</a></li>
                <li><a href="/frontend/sections" {{ request()->is('frontend/sections') ? 'class="active"' : '' }}>🧩 Sections</a></li>
                <li><a href="/frontend/directives" {{ request()->is('frontend/directives') ? 'class="active"' : '' }}>🔀 Directives</a></li>
                <li><a href="/frontend/advanced" {{ request()->is('frontend/advanced') ? 'class="active"' : '' }}>🚀 Advanced</a></li>
                <li><a href="/practice/dashboard" {{ request()->is('practice/*') ? 'class="active"' : '' }}>📊 Data Handling</a></li>
                <li><a href="/web-programming" {{ request()->is('web-programming') ? 'class="active"' : '' }}>🌐 Web Programming</a></li>
            </ul>
        </nav>

        <main>
            @yield('breadcrumb')
            @yield('content')
        </main>

        <footer>
            <p>@yield('footer', '© 2024 Laravel Web Programming - Frontend Development Practice')</p>
        </footer>
    </div>

    @yield('javascript')
</body>
</html>
