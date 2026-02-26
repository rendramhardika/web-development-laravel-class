<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Headers & Cookies Analysis Results</title>
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
        .analysis-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        .analysis-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 25px;
            border: 2px solid #e1e8ed;
            transition: transform 0.3s ease;
        }
        .analysis-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .card-icon {
            width: 50px;
            height: 50px;
            background: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5em;
            margin-right: 15px;
        }
        .card-title {
            font-size: 1.3em;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }
        .data-display {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            margin: 10px 0;
            word-break: break-all;
        }
        .data-item {
            margin: 8px 0;
            display: flex;
            align-items: flex-start;
        }
        .data-key {
            color: #3498db;
            font-weight: bold;
            min-width: 120px;
            margin-right: 10px;
        }
        .data-value {
            color: #2ecc71;
            flex: 1;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .stat-label {
            font-size: 1em;
            opacity: 0.9;
        }
        .browser-info {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid #e1e8ed;
            text-align: center;
        }
        .browser-icon {
            font-size: 4em;
            margin-bottom: 15px;
        }
        .browser-name {
            font-size: 2em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .browser-details {
            color: #7f8c8d;
        }
        .cookies-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .cookies-table th,
        .cookies-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }
        .cookies-table th {
            background: #3498db;
            color: white;
            font-weight: 600;
        }
        .cookies-table tr:hover {
            background: #f8f9fa;
        }
        .cookie-value {
            font-family: monospace;
            background: #f8f9fa;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
            font-weight: 600;
            margin: 5px;
        }
        .btn:hover {
            background: #2980b9;
        }
        .btn-secondary {
            background: #95a5a6;
        }
        .btn-secondary:hover {
            background: #7f8c8d;
        }
        .btn-success {
            background: #27ae60;
        }
        .btn-success:hover {
            background: #229954;
        }
        .code-block {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            overflow-x: auto;
            margin: 15px 0;
        }
        .highlight {
            color: #f39c12;
            font-weight: bold;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: bold;
            margin-left: 10px;
        }
        .badge-success {
            background: #d5f4e6;
            color: #27ae60;
        }
        .badge-warning {
            background: #fef9e7;
            color: #f39c12;
        }
        .badge-danger {
            background: #fadbd8;
            color: #e74c3c;
        }
        .new-cookies {
            background: #d5f4e6;
            border-left: 4px solid #27ae60;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/dashboard" class="back-link">← Back to Dashboard</a>
        
        <h1>🔍 Headers & Cookies Analysis</h1>
        <p class="subtitle">HTTP request headers and cookies analysis results</p>

        <div class="browser-info">
            <div class="browser-icon">🌐</div>
            <div class="browser-name">{{ $browser }}</div>
            <div class="browser-details">Browser detected from User-Agent header</div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ strlen($userAgent) }}</div>
                <div class="stat-label">User-Agent Length</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $contentType === 'Not specified' ? '❌' : '✅' }}</div>
                <div class="stat-label">Content-Type Set</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $authorization !== 'Not provided' ? '✅' : '❌' }}</div>
                <div class="stat-label">Auth Header</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $customHeader !== 'Not provided' ? '✅' : '❌' }}</div>
                <div class="stat-label">Custom Header</div>
            </div>
        </div>

        <div class="analysis-grid">
            <div class="analysis-card">
                <div class="card-header">
                    <div class="card-icon">📋</div>
                    <h3 class="card-title">HTTP Headers</h3>
                </div>
                
                <div class="data-display">
                    <div class="data-item">
                        <span class="data-key">User-Agent:</span>
                        <span class="data-value">{{ $userAgent }}</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">Content-Type:</span>
                        <span class="data-value">{{ $contentType }}</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">Authorization:</span>
                        <span class="data-value">{{ $authorization }}</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">Accept-Language:</span>
                        <span class="data-value">{{ $acceptLanguage }}</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">X-Custom-Header:</span>
                        <span class="data-value">{{ $customHeader }}</span>
                    </div>
                </div>
            </div>

            <div class="analysis-card">
                <div class="card-header">
                    <div class="card-icon">🍪</div>
                    <h3 class="card-title">Cookies</h3>
                </div>
                
                <table class="cookies-table">
                    <thead>
                        <tr>
                            <th>Cookie Name</th>
                            <th>Value</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>session_id</td>
                            <td><span class="cookie-value">{{ $sessionId }}</span></td>
                            <td>
                                @if($sessionId !== 'Not set')
                                    <span class="badge badge-success">Set</span>
                                @else
                                    <span class="badge badge-warning">Not Set</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>user_preference</td>
                            <td><span class="cookie-value">{{ $userPreference }}</span></td>
                            <td>
                                @if($userPreference !== 'Not set')
                                    <span class="badge badge-success">Set</span>
                                @else
                                    <span class="badge badge-warning">Not Set</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>last_visit</td>
                            <td><span class="cookie-value">{{ $lastVisit }}</span></td>
                            <td>
                                @if($lastVisit !== 'First visit')
                                    <span class="badge badge-success">Previous Visit</span>
                                @else
                                    <span class="badge badge-warning">First Visit</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="new-cookies">
            <h3>🆕 New Cookies Set by This Request:</h3>
            <ul style="color: #27ae60; font-weight: 600;">
                <li><strong>current_visit:</strong> {{ now()->format('Y-m-d H:i:s') }} (expires in 60 minutes)</li>
                <li><strong>page_views:</strong> Incremented from previous value (expires in 60 minutes)</li>
            </ul>
            <p style="margin-top: 10px; color: #555;">
                Refresh this page to see the updated cookie values in action!
            </p>
        </div>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Code:</h3>
            <div class="code-block">
// Reading HTTP headers
$userAgent = $request->header('User-Agent', 'Unknown');
$contentType = $request->header('Content-Type', 'Not specified');
$authorization = $request->header('Authorization', 'Not provided');
$acceptLanguage = $request->header('Accept-Language', 'Not specified');
$customHeader = $request->header('X-Custom-Header', 'Not provided');

// Reading cookies
$sessionId = $request->cookie('session_id', 'Not set');
$userPreference = $request->cookie('user_preference', 'Not set');
$lastVisit = $request->cookie('last_visit', 'First visit');

// Browser detection from User-Agent
$browser = 'Unknown';
if (strpos($userAgent, 'Chrome') !== false) $browser = 'Chrome';
elseif (strpos($userAgent, 'Firefox') !== false) $browser = 'Firefox';
elseif (strpos($userAgent, 'Safari') !== false) $browser = 'Safari';
elseif (strpos($userAgent, 'Edge') !== false) $browser = 'Edge';

// Setting new cookies in response
return response()->view('practice.headers-result', compact(...))
    ->cookie('current_visit', now()->format('Y-m-d H:i:s'), 60)
    ->cookie('page_views', ($request->cookie('page_views', 0) + 1), 60);
            </div>

            <h3>💡 Key Concepts Demonstrated:</h3>
            <ul style="color: #555;">
                <li><span class="highlight">Header Reading:</span> $request->header('Header-Name', 'default')</li>
                <li><span class="highlight">Cookie Reading:</span> $request->cookie('cookie_name', 'default')</li>
                <li><span class="highlight">Cookie Setting:</span> response()->cookie('name', 'value', 'minutes')</li>
                <li><span class="highlight">Browser Detection:</span> User-Agent parsing</li>
                <li><span class="highlight">Session Tracking:</strong> Visit counting and timestamps</li>
            </ul>

            <h3>🔒 Common Use Cases:</h3>
            <ul style="color: #555;">
                <li><strong>Authentication:</strong> Bearer tokens, API keys in Authorization header</li>
                <li><strong>Session Management:</strong> Session IDs, user preferences in cookies</li>
                <li><strong>Content Negotiation:</strong> Accept-Language, Accept headers</li>
                <li><strong>Analytics:</strong> User-Agent tracking, referrer information</li>
                <li><strong>Rate Limiting:</strong> Custom headers for API throttling</li>
                <li><strong>CSRF Protection:</strong> X-CSRF-TOKEN headers</li>
            </ul>

            <h3>🧪 Testing Headers:</h3>
            <p style="color: #555;">Try accessing this page with custom headers:</p>
            <div class="code-block">
# Using curl with custom headers
curl -H "X-Custom-Header: TestValue" \
     -H "Authorization: Bearer token123" \
     http://localhost:8000/practice/analyze-request

# Using JavaScript fetch
fetch('/practice/analyze-request', {
    headers: {
        'X-Custom-Header': 'JavaScript Test',
        'Authorization': 'Bearer js-token'
    }
});
            </div>

            <div style="margin-top: 20px; text-align: center;">
                <a href="/practice/analyze-request" class="btn btn-success">Refresh Page</a>
                <a href="/practice/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
