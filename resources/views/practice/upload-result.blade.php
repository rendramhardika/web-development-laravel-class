<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Results</title>
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
        .file-info-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid #e1e8ed;
        }
        .file-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .file-icon {
            width: 80px;
            height: 80px;
            background: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2em;
            margin-right: 20px;
        }
        .file-details h2 {
            margin: 0 0 5px 0;
            color: #2c3e50;
        }
        .file-meta {
            color: #7f8c8d;
            font-size: 0.9em;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        .info-item {
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ecf0f1;
        }
        .info-label {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .info-value {
            color: #555;
            word-break: break-all;
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
        .files-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .file-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 20px;
            border: 2px solid #e1e8ed;
            transition: transform 0.3s ease;
        }
        .file-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .file-name {
            font-size: 1.1em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
            word-break: break-all;
        }
        .file-size {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .file-type {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .type-document {
            background: #3498db;
            color: white;
        }
        .type-image {
            background: #27ae60;
            color: white;
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
        .description-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #3498db;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/upload-form" class="back-link">← Back to Upload Form</a>
        
        <h1>📁 File Upload Results</h1>
        <p class="subtitle">File successfully processed and validated</p>

        <div class="success-message">
            <h3 style="margin: 0;">✅ File Upload Successful!</h3>
            <p style="margin: 5px 0 0 0;">Your file has been processed and validated by the controller.</p>
        </div>

        @if(isset($filename))
            <!-- Single File Upload Results -->
            <div class="file-info-card">
                <div class="file-header">
                    <div class="file-icon">📷</div>
                    <div class="file-details">
                        <h2>{{ $validated['user_name'] }}'s Avatar</h2>
                        <div class="file-meta">Profile picture uploaded successfully</div>
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">📄 Filename</div>
                        <div class="info-value">{{ $filename }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">📏 File Size</div>
                        <div class="info-value">{{ number_format($filesize / 1024, 2) }} KB</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">🎯 MIME Type</div>
                        <div class="info-value">{{ $filetype }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">📂 Storage Path</div>
                        <div class="info-value">{{ $path }}</div>
                    </div>
                </div>

                @if(isset($validated['description']) && !empty($validated['description']))
                    <div class="description-box">
                        <div class="info-label">💬 Description:</div>
                        <div>{{ $validated['description'] }}</div>
                    </div>
                @endif

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">{{ number_format($filesize / 1024, 1) }}</div>
                        <div class="stat-label">File Size (KB)</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ strtoupper(pathinfo($filename, PATHINFO_EXTENSION)) }}</div>
                        <div class="stat-label">File Extension</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $filetype === 'image/jpeg' ? 'JPEG' : ($filetype === 'image/png' ? 'PNG' : 'Other') }}</div>
                        <div class="stat-label">Image Type</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $filesize < 1048576 ? '✅' : '⚠️' }}</div>
                        <div class="stat-label">Size Check</div>
                    </div>
                </div>
            </div>
        @else
            <!-- Multiple Files Upload Results -->
            <div class="file-info-card">
                <div class="file-header">
                    <div class="file-icon">📁</div>
                    <div class="file-details">
                        <h2>{{ $validated['folder_name'] }}</h2>
                        <div class="file-meta">{{ count($uploadedFiles) }} files uploaded successfully</div>
                    </div>
                </div>

                <div class="stats-grid">
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

                <div class="files-grid">
                    @foreach($uploadedFiles as $file)
                        <div class="file-card">
                            <div class="file-name">{{ $file['name'] }}</div>
                            <div class="file-size">{{ number_format($file['size'] / 1024, 2) }} KB</div>
                            <div class="file-type type-{{ $file['category'] }}">
                                {{ strtoupper($file['category']) }}
                            </div>
                            <div style="color: #7f8c8d; font-size: 0.9em;">
                                {{ $file['type'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Processing:</h3>
            @if(isset($filename))
                <div class="code-block">
// Single file validation
$validated = $request->validate([
    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    'user_name' => 'required|string|max:255',
    'description' => 'nullable|string|max:500'
]);

// File processing
if ($request->hasFile('avatar')) {
    $file = $request->file('avatar');
    $filename = time() . '_' . $file->getClientOriginalName();
    $filesize = $file->getSize();
    $filetype = $file->getMimeType();
    
    // Simulated storage path
    $path = 'storage/avatars/' . $filename;
    
    // In real application:
    // $path = $file->storeAs('avatars', $filename, 'public');
}
                </div>
            @else
                <div class="code-block">
// Multiple files validation
$validated = $request->validate([
    'documents.*' => 'required|file|mimes:pdf,doc,docx,txt|max:10240',
    'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    'folder_name' => 'required|string|max:100'
]);

$uploadedFiles = [];
$totalSize = 0;

// Process documents
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

// Process images
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
                </div>
            @endif

            <h3>💡 Key Concepts Demonstrated:</h3>
            <ul style="color: #555;">
                <li><span class="highlight">File Validation:</span> MIME types, size limits, required files</li>
                <li><span class="highlight">File Information:</span> Name, size, type extraction</li>
                <li><span class="highlight">Multiple Files:</span> Array validation and processing</li>
                <li><span class="highlight">File Organization:</span> Folder structure and naming</li>
                <li><span class="highlight">Security:</span> File type restrictions and size limits</li>
            </ul>

            <h3>🔒 Security Features:</h3>
            <ul style="color: #555;">
                <li>✅ File type validation (MIME and extension)</li>
                <li>✅ File size limits (2MB for images, 10MB for documents)</li>
                <li>✅ Unique filename generation with timestamp</li>
                <li>✅ Proper file categorization</li>
                <li>✅ Sanitized file paths</li>
            </ul>

            <div style="margin-top: 20px; text-align: center;">
                <a href="/practice/upload-form" class="btn btn-success">Upload More Files</a>
                <a href="/practice/upload-form" class="btn btn-secondary">Try Different Upload</a>
                <a href="/practice/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
