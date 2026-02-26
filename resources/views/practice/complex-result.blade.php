<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complex Mixed Methods Results</title>
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
        .success-message {
            background: linear-gradient(135deg, #27ae60, #229954);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
        }
        .complexity-overview {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid #e1e8ed;
            text-align: center;
        }
        .form-icon {
            font-size: 4em;
            margin-bottom: 15px;
        }
        .form-details {
            font-size: 1.2em;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .input-methods-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .method-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border: 2px solid #e1e8ed;
            transition: transform 0.3s ease;
        }
        .method-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .method-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .method-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5em;
            margin-right: 15px;
        }
        .icon-path { background: #3498db; }
        .icon-query { background: #27ae60; }
        .icon-body { background: #f39c12; }
        .icon-file { background: #e74c3c; }
        .icon-header { background: #9b59b6; }
        .icon-cookie { background: #34495e; }
        .method-title {
            font-size: 1.3em;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }
        .method-content {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
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
            min-width: 100px;
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
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .summary-table th,
        .summary-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }
        .summary-table th {
            background: #3498db;
            color: white;
            font-weight: 600;
        }
        .summary-table tr:hover {
            background: #f8f9fa;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: bold;
        }
        .status-true { background: #d5f4e6; color: #27ae60; }
        .status-false { background: #fadbd8; color: #e74c3c; }
        .files-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .file-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid #ecf0f1;
        }
        .file-name {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
            word-break: break-all;
        }
        .file-details {
            color: #7f8c8d;
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
            margin: 15px 0;
        }
        .highlight {
            color: #f39c12;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/complex-form" class="back-link">← Back to Complex Form</a>
        
        <h1>🔀 Complex Mixed Methods Results</h1>
        <p class="subtitle">All input methods successfully processed and analyzed</p>

        <div class="success-message">
            <h3 style="margin: 0;">✅ Complex Form Successfully Processed!</h3>
            <p style="margin: 5px 0 0 0;">All {{ $dataSummary['input_count'] }} input fields and {{ $dataSummary['attachment_count'] }} files have been analyzed.</p>
        </div>

        <div class="complexity-overview">
            <div class="form-icon">📋</div>
            <div class="form-details">Form #{{ $formId }} from {{ ucfirst($source) }} (v{{ $version }})</div>
            <div style="color: #7f8c8d;">Complex data processing completed successfully</div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $dataSummary['input_count'] }}</div>
                    <div class="stat-label">Form Fields</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $dataSummary['attachment_count'] }}</div>
                    <div class="stat-label">Attachments</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $dataSummary['has_user_agent'] ? '✅' : '❌' }}</div>
                    <div class="stat-label">User Agent</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $dataSummary['has_token'] ? '✅' : '❌' }}</div>
                    <div class="stat-label">Auth Token</div>
                </div>
            </div>
        </div>

        <div class="input-methods-grid">
            <div class="method-card">
                <div class="method-header">
                    <div class="method-icon icon-path">🛤️</div>
                    <h3 class="method-title">Path Variable</h3>
                </div>
                <div class="method-content">
                    <div class="data-item">
                        <span class="data-key">formId:</span>
                        <span class="data-value">{{ $formId }}</span>
                    </div>
                    <div style="margin-top: 10px; font-size: 0.8em; color: #7f8c8d;">
                        Extracted from URL: /forms/<strong>{{ $formId }}</strong>/submit
                    </div>
                </div>
            </div>

            <div class="method-card">
                <div class="method-header">
                    <div class="method-icon icon-query">🔍</div>
                    <h3 class="method-title">Query Parameters</h3>
                </div>
                <div class="method-content">
                    <div class="data-item">
                        <span class="data-key">source:</span>
                        <span class="data-value">{{ $source }}</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">version:</span>
                        <span class="data-value">{{ $version }}</span>
                    </div>
                    <div style="margin-top: 10px; font-size: 0.8em; color: #7f8c8d;">
                        From URL: ?source=<strong>{{ $source }}</strong>&version=<strong>{{ $version }}</strong>
                    </div>
                </div>
            </div>

            <div class="method-card">
                <div class="method-header">
                    <div class="method-icon icon-body">📝</div>
                    <h3 class="method-title">Request Body</h3>
                </div>
                <div class="method-content">
                    <div class="data-item">
                        <span class="data-key">fields:</span>
                        <span class="data-value">{{ $dataSummary['input_count'] }} inputs</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">content:</span>
                        <span class="data-value">{{ $dataSummary['is_json'] ? 'JSON' : 'Form Data' }}</span>
                    </div>
                    @if(isset($formData['title']))
                        <div style="margin-top: 10px; font-size: 0.8em; color: #7f8c8d;">
                            Title: {{ $formData['title'] }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="method-card">
                <div class="method-header">
                    <div class="method-icon icon-file">📁</div>
                    <h3 class="method-title">File Uploads</h3>
                </div>
                <div class="method-content">
                    <div class="data-item">
                        <span class="data-key">count:</span>
                        <span class="data-value">{{ $dataSummary['attachment_count'] }} files</span>
                    </div>
                    @if(count($attachments) > 0)
                        <div style="margin-top: 10px;">
                            @foreach($attachments as $attachment)
                                <div style="font-size: 0.8em; color: #7f8c8d;">
                                    📎 {{ $attachment['name'] }} ({{ number_format($attachment['size'] / 1024, 2) }} KB)
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="method-card">
                <div class="method-header">
                    <div class="method-icon icon-header">🔧</div>
                    <h3 class="method-title">Headers</h3>
                </div>
                <div class="method-content">
                    <div class="data-item">
                        <span class="data-key">userAgent:</span>
                        <span class="data-value">{{ $dataSummary['has_user_agent'] ? 'Detected' : 'Not Found' }}</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">contentType:</span>
                        <span class="data-value">{{ $contentType }}</span>
                    </div>
                    <div style="margin-top: 10px; font-size: 0.8em; color: #7f8c8d;">
                        Browser: {{ $userAgent === 'Unknown' ? 'Unknown' : 'Detected' }}
                    </div>
                </div>
            </div>

            <div class="method-card">
                <div class="method-header">
                    <div class="method-icon icon-cookie">🍪</div>
                    <h3 class="method-title">Cookies</h3>
                </div>
                <div class="method-content">
                    <div class="data-item">
                        <span class="data-key">userToken:</span>
                        <span class="data-value">{{ $userToken === 'Not set' ? 'Not Set' : 'Present' }}</span>
                    </div>
                    <div class="data-item">
                        <span class="data-key">sessionData:</span>
                        <span class="data-value">{{ $sessionData === 'Not set' ? 'Not Set' : 'Present' }}</span>
                    </div>
                    <div style="margin-top: 10px; font-size: 0.8em; color: #7f8c8d;">
                        Authentication: {{ $dataSummary['has_token'] ? 'Available' : 'Missing' }}
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 30px 0; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>📊 Data Processing Summary</h3>
            <table class="summary-table">
                <thead>
                    <tr>
                        <th>Input Method</th>
                        <th>Data Type</th>
                        <th>Status</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Path Variable</strong></td>
                        <td>Integer</td>
                        <td><span class="status-badge status-true">✓ Received</span></td>
                        <td>{{ $formId }}</td>
                    </tr>
                    <tr>
                        <td><strong>Query Parameter</strong></td>
                        <td>String</td>
                        <td><span class="status-badge status-true">✓ Received</span></td>
                        <td>{{ $source }} (v{{ $version }})</td>
                    </tr>
                    <tr>
                        <td><strong>Form Data</strong></td>
                        <td>Array</td>
                        <td><span class="status-badge status-true">✓ Received</span></td>
                        <td>{{ $dataSummary['input_count'] }} fields</td>
                    </tr>
                    <tr>
                        <td><strong>File Upload</strong></td>
                        <td>Array</td>
                        <td><span class="status-badge {{ $dataSummary['attachment_count'] > 0 ? 'status-true' : 'status-false' }}">
                            {{ $dataSummary['attachment_count'] > 0 ? '✓' : '✗' }} {{ $dataSummary['attachment_count'] > 0 ? 'Received' : 'None' }}
                        </span></td>
                        <td>{{ $dataSummary['attachment_count'] }} files</td>
                    </tr>
                    <tr>
                        <td><strong>Headers</strong></td>
                        <td>String</td>
                        <td><span class="status-badge status-true">✓ Received</span></td>
                        <td>{{ $contentType }}</td>
                    </tr>
                    <tr>
                        <td><strong>Cookies</strong></td>
                        <td>String</td>
                        <td><span class="status-badge {{ $dataSummary['has_token'] ? 'status-true' : 'status-false' }}">
                            {{ $dataSummary['has_token'] ? '✓' : '✗' }} {{ $dataSummary['has_token'] ? 'Available' : 'Missing' }}
                        </span></td>
                        <td>{{ $userToken === 'Not set' ? 'No Token' : 'Token Present' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if(count($attachments) > 0)
            <div style="margin: 30px 0; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                <h3>📎 Uploaded Files Details</h3>
                <div class="files-grid">
                    @foreach($attachments as $attachment)
                        <div class="file-card">
                            <div class="file-name">{{ $attachment['name'] }}</div>
                            <div class="file-details">
                                Size: {{ number_format($attachment['size'] / 1024, 2) }} KB<br>
                                Type: {{ $attachment['type'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Processing Logic:</h3>
            <div class="code-block">
// Complex mixed method processing
public function complexFormHandling(Request $request, $formId)
{
    // 1. Path variable from URL
    $formId = $formId;
    
    // 2. Query parameters from URL
    $source = $request->query('source', 'unknown');
    $version = $request->query('version', '1.0');
    
    // 3. Form data from request body
    $formData = $request->all();
    
    // 4. Headers from request
    $userAgent = $request->header('User-Agent', 'Unknown');
    $contentType = $request->header('Content-Type', 'Not specified');
    
    // 5. Files from multipart data
    $attachments = [];
    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $attachment) {
            $attachments[] = [
                'name' => $attachment->getClientOriginalName(),
                'size' => $attachment->getSize(),
                'type' => $attachment->getMimeType()
            ];
        }
    }
    
    // 6. Cookies from browser
    $userToken = $request->cookie('user_token', 'Not set');
    $sessionData = $request->cookie('session_data', 'Not set');
    
    // Data analysis and summary
    $dataSummary = [
        'form_id' => $formId,
        'source' => $source,
        'version' => $version,
        'input_count' => count($formData),
        'attachment_count' => count($attachments),
        'has_user_agent' => $userAgent !== 'Unknown',
        'is_json' => strpos($contentType, 'application/json') !== false,
        'has_token' => $userToken !== 'Not set'
    ];
    
    return view('practice.complex-result', compact(...));
}
            </div>

            <h3>💡 Advanced Concepts Demonstrated:</h3>
            <ul style="color: #555;">
                <li><span class="highlight">Multi-source Data:</span> Combining inputs from different sources</li>
                <li><span class="highlight">Data Validation:</span> Different validation rules for each input type</li>
                <li><span class="highlight">File Processing:</span> Multiple file upload handling</li>
                <li><span class="highlight">Security Analysis:</span> Authentication token detection</li>
                <li><span class="highlight">Request Analysis:</strong> Content type and user agent detection</li>
                <li><span class="highlight">Data Aggregation:</strong> Comprehensive data summary generation</li>
            </ul>

            <h3>🎯 Real-world Applications:</h3>
            <ul style="color: #555;">
                <li><strong>API Endpoints:</strong> RESTful APIs with complex data structures</li>
                <li><strong>File Management Systems:</strong> Document upload with metadata</li>
                <li><strong>Form Processing:</strong> Multi-step forms with attachments</li>
                <li><strong>Analytics:</strong> Request tracking and user behavior analysis</li>
                <li><strong>Security:</strong> Authentication and authorization systems</li>
            </ul>

            <div style="margin-top: 20px; text-align: center;">
                <a href="/practice/complex-form" class="btn btn-success">Submit Another Form</a>
                <a href="/practice/forms/456/submit?version=1.0" class="btn btn-warning">Test Different ID</a>
                <a href="/practice/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
