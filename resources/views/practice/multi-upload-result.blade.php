<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Files Upload Results</title>
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
        .success-message {
            background: linear-gradient(135deg, #27ae60, #229954);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
        }
        .folder-info {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid #e1e8ed;
            text-align: center;
        }
        .folder-icon {
            font-size: 4em;
            margin-bottom: 15px;
        }
        .folder-name {
            font-size: 2em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .folder-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #ecf0f1;
        }
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 5px;
        }
        .stat-label {
            color: #7f8c8d;
            font-size: 0.9em;
        }
        .files-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .file-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 2px solid #e1e8ed;
            transition: transform 0.3s ease;
        }
        .file-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .file-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .file-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5em;
            margin-right: 15px;
        }
        .icon-document {
            background: #3498db;
        }
        .icon-image {
            background: #27ae60;
        }
        .file-info {
            flex: 1;
        }
        .file-name {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
            word-break: break-all;
        }
        .file-size {
            color: #7f8c8d;
            font-size: 0.9em;
        }
        .file-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 15px;
        }
        .detail-item {
            background: #f8f9fa;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85em;
        }
        .detail-label {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 2px;
        }
        .detail-value {
            color: #555;
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
        .summary-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .progress-bar {
            background: #ecf0f1;
            border-radius: 10px;
            overflow: hidden;
            margin: 10px 0;
            height: 20px;
        }
        .progress-fill {
            background: linear-gradient(90deg, #3498db, #2980b9);
            height: 100%;
            transition: width 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/upload-form" class="back-link">← Back to Upload Form</a>
        
        <h1>📁 Multiple Files Upload Results</h1>
        <p class="subtitle">All files successfully processed and categorized</p>

        <div class="success-message">
            <h3 style="margin: 0;">✅ Multiple Files Upload Successful!</h3>
            <p style="margin: 5px 0 0 0;">{{ count($uploadedFiles) }} files have been processed and organized.</p>
        </div>

        <div class="folder-info">
            <div class="folder-icon">📁</div>
            <div class="folder-name">{{ $validated['folder_name'] }}</div>
            <div style="color: #7f8c8d;">Upload completed successfully</div>
            
            <div class="folder-stats">
                <div class="stat-card">
                    <div class="stat-number">{{ count($uploadedFiles) }}</div>
                    <div class="stat-label">Total Files</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ number_format($totalSize / 1024 / 1024, 2) }}</div>
                    <div class="stat-label">Total Size (MB)</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ collect($uploadedFiles)->where('category', 'image')->count() }}</div>
                    <div class="stat-label">Images</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ collect($uploadedFiles)->where('category', 'document')->count() }}</div>
                    <div class="stat-label">Documents</div>
                </div>
            </div>
        </div>

        <div class="summary-section">
            <h3>📊 Upload Summary</h3>
            
            <div style="margin-bottom: 15px;">
                <strong>File Distribution:</strong>
                <div class="progress-bar">
                    @php
                        $imageCount = collect($uploadedFiles)->where('category', 'image')->count();
                        $documentCount = collect($uploadedFiles)->where('category', 'document')->count();
                        $imagePercentage = count($uploadedFiles) > 0 ? ($imageCount / count($uploadedFiles)) * 100 : 0;
                    @endphp
                    <div class="progress-fill" style="width: {{ $imagePercentage }}%;">
                        {{ $imageCount }} Images
                    </div>
                </div>
                <div class="progress-bar">
                    @php
                        $documentPercentage = count($uploadedFiles) > 0 ? ($documentCount / count($uploadedFiles)) * 100 : 0;
                    @endphp
                    <div class="progress-fill" style="width: {{ $documentPercentage }}%; background: linear-gradient(90deg, #27ae60, #229954);">
                        {{ $documentCount }} Documents
                    </div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div>
                    <strong>Average File Size:</strong><br>
                    {{ count($uploadedFiles) > 0 ? number_format($totalSize / count($uploadedFiles) / 1024, 2) : 0 }} KB
                </div>
                <div>
                    <strong>Largest File:</strong><br>
                    @php
                        $largestFile = collect($uploadedFiles)->sortByDesc('size')->first();
                    @endphp
                    {{ $largestFile ? $largestFile['name'] : 'N/A' }}
                </div>
            </div>
        </div>

        <div class="files-grid">
            @foreach($uploadedFiles as $file)
                <div class="file-card">
                    <div class="file-header">
                        <div class="file-icon {{ $file['category'] === 'image' ? 'icon-image' : 'icon-document' }}">
                            {{ $file['category'] === 'image' ? '🖼️' : '📄' }}
                        </div>
                        <div class="file-info">
                            <div class="file-name">{{ $file['name'] }}</div>
                            <div class="file-size">{{ number_format($file['size'] / 1024, 2) }} KB</div>
                        </div>
                    </div>
                    
                    <div class="file-details">
                        <div class="detail-item">
                            <div class="detail-label">Type</div>
                            <div class="detail-value">{{ strtoupper($file['category']) }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">MIME</div>
                            <div class="detail-value" style="font-size: 0.8em;">{{ $file['type'] }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Size</div>
                            <div class="detail-value">{{ number_format($file['size']) }} bytes</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Extension</div>
                            <div class="detail-value">{{ strtoupper(pathinfo($file['name'], PATHINFO_EXTENSION)) }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Processing:</h3>
            <div class="code-block">
// Multiple files validation and processing
$validated = $request->validate([
    'documents.*' => 'required|file|mimes:pdf,doc,docx,txt|max:10240',
    'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    'folder_name' => 'required|string|max:100'
]);

$uploadedFiles = [];
$totalSize = 0;

// Process documents array
if ($request->hasFile('documents')) {
    foreach ($request->file('documents') as $document) {
        $uploadedFiles[] = [
            'name' => $document->getClientOriginalName(),
            'size' => $document->getSize(),
            'type' => $document->getMimeType(),
            'category' => 'document'
        ];
        $totalSize += $document->getSize();
    }
}

// Process images array
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $uploadedFiles[] = [
            'name' => $image->getClientOriginalName(),
            'size' => $image->getSize(),
            'type' => $image->getMimeType(),
            'category' => 'image'
        ];
        $totalSize += $image->getSize();
    }
}

// File organization and statistics
$imageCount = collect($uploadedFiles)->where('category', 'image')->count();
$documentCount = collect($uploadedFiles)->where('category', 'document')->count();
            </div>

            <h3>💡 Advanced Features Demonstrated:</h3>
            <ul style="color: #555;">
                <li><span class="highlight">Array Validation:</span> Using wildcard (*) for multiple files</li>
                <li><span class="highlight">File Categorization:</span> Automatic type detection and grouping</li>
                <li><span class="highlight">Batch Processing:</span> Loop through multiple file uploads</li>
                <li><span class="highlight">Statistics Calculation:</span> File counts, sizes, and distributions</li>
                <li><span class="highlight">Data Organization:</span> Structured file information storage</li>
            </ul>

            <h3>🔒 Security & Best Practices:</h3>
            <ul style="color: #555;">
                <li>✅ Separate validation rules for different file types</li>
                <li>✅ Individual file size limits</li>
                <li>✅ MIME type verification</li>
                <li>✅ File categorization for better organization</li>
                <li>✅ Comprehensive file metadata collection</li>
            </ul>

            <div style="margin-top: 20px; text-align: center;">
                <a href="/practice/upload-form" class="btn btn-success">Upload More Files</a>
                <a href="/practice/upload-form" class="btn btn-secondary">Try Single Upload</a>
                <a href="/practice/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
