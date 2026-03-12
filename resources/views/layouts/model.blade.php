<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Model MVC - Laravel')</title>
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
            border-bottom: 3px solid #667eea;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 0 2rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.1);
            font-size: 0.9rem;
        }

        nav a:hover, nav a.active {
            background: #667eea;
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
            border-left: 4px solid #667eea;
        }

        .breadcrumb a {
            color: #667eea;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: auto;
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
            <h1>@yield('header-title', 'Model pada Arsitektur MVC')</h1>
            <p>@yield('header-subtitle', 'Penerapan Model di Laravel')</p>
        </header>

        <nav>
            <ul>
                <li><a href="{{ route('model.dashboard') }}" {{ request()->is('model/dashboard') ? 'class="active"' : '' }}>🏠 Dashboard</a></li>
                <li><a href="{{ route('model.without-model') }}" {{ request()->is('model/without-model') ? 'class="active"' : '' }}>❌ Without Model</a></li>
                <li><a href="{{ route('model.business-logic') }}" {{ request()->is('model/business-logic') ? 'class="active"' : '' }}>💼 Business Logic</a></li>
                <li><a href="{{ route('model.validation') }}" {{ request()->is('model/validation') ? 'class="active"' : '' }}>✅ Validation</a></li>
                <li><a href="{{ route('model.database-intro') }}" {{ request()->is('model/database-intro') ? 'class="active"' : '' }}>🗄️ DB Intro</a></li>
                <li><a href="{{ route('model.database-setup') }}" {{ request()->is('model/database-setup') ? 'class="active"' : '' }}>⚙️ DB Setup</a></li>
                <li><a href="{{ route('model.raw-query') }}" {{ request()->is('model/raw-query') ? 'class="active"' : '' }}>📝 Raw Query</a></li>
                <li><a href="{{ route('model.query-builder') }}" {{ request()->is('model/query-builder') ? 'class="active"' : '' }}>🔧 Query Builder</a></li>
                <li><a href="{{ route('model.eloquent-orm') }}" {{ request()->is('model/eloquent-orm') ? 'class="active"' : '' }}>🚀 Eloquent ORM</a></li>
            </ul>
        </nav>

        <main>
            @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem; border: 1px solid #c3e6cb;">
                <strong>✅ Success:</strong> {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem; border: 1px solid #f5c6cb;">
                <strong>❌ Error:</strong> {{ session('error') }}
            </div>
            @endif

            @yield('breadcrumb')
            @yield('content')
        </main>

        <footer>
            <p>@yield('footer', '© 2024 Laravel Web Programming - Model MVC Practice')</p>
        </footer>
    </div>

    @yield('javascript')
</body>
</html>
