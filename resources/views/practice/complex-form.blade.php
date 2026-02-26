<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complex Mixed Methods Practice</title>
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
            max-width: 900px;
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #2c3e50;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3498db;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .file-upload-area {
            border: 2px dashed #f39c12;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            background: #fef9e7;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        .file-upload-area:hover {
            border-color: #e67e22;
            background: #fdebd0;
        }
        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .upload-icon {
            font-size: 2em;
            color: #f39c12;
            margin-bottom: 10px;
        }
        .upload-text {
            color: #2c3e50;
            font-size: 1.1em;
            margin-bottom: 5px;
        }
        .upload-hint {
            color: #7f8c8d;
            font-size: 0.9em;
        }
        .file-preview {
            margin-top: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            display: none;
        }
        .file-preview.active {
            display: block;
        }
        .file-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .file-details {
            flex: 1;
        }
        .file-name {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .file-meta {
            color: #7f8c8d;
            font-size: 0.9em;
        }
        .remove-file {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
        }
        .remove-file:hover {
            background: #c0392b;
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
        .btn-warning {
            background: #f39c12;
        }
        .btn-warning:hover {
            background: #e67e22;
        }
        .code-example {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 10px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            margin: 10px 0;
            overflow-x: auto;
        }
        .method-indicator {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.8em;
            margin-right: 5px;
        }
        .method-path { background: #3498db; color: white; }
        .method-query { background: #27ae60; color: white; }
        .method-body { background: #f39c12; color: white; }
        .method-file { background: #e74c3c; color: white; }
        .method-header { background: #9b59b6; color: white; }
        .method-cookie { background: #34495e; color: white; }
        .complexity-indicator {
            background: linear-gradient(90deg, #27ae60, #f39c12, #e74c3c);
            height: 8px;
            border-radius: 4px;
            margin: 20px 0;
            position: relative;
        }
        .complexity-label {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: 0.8em;
            color: #7f8c8d;
        }
        .test-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .test-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/dashboard" class="back-link">← Back to Dashboard</a>
        
        <h1>🔀 Complex Mixed Methods Practice</h1>
        <p class="subtitle">Kombinasi semua metode input dalam satu endpoint</p>

        <div class="info-box">
            <strong>📖 Konsep:</strong> Form ini mendemonstrasikan kombinasi semua metode input:
            Path variables, query parameters, form data, file uploads, headers, dan cookies.
        </div>

        <div style="margin: 20px 0;">
            <h3>📊 Input Methods Complexity:</h3>
            <div class="complexity-indicator"></div>
            <div class="complexity-label">
                <span>Path Variable</span>
                <span>Query Parameter</span>
                <span>Form Body</span>
                <span>File Upload</span>
                <span>Headers</span>
                <span>Cookies</span>
            </div>
        </div>

        <div style="margin: 20px 0; padding: 15px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔗 Expected URL Pattern:</h3>
            <div class="code-example">
POST /practice/forms/{formId}/submit?source={source}&version={version}

Headers:
- Content-Type: multipart/form-data
- User-Agent: [Browser Info]
- X-Custom-Header: [Optional]

Cookies:
- user_token: [Authentication Token]
- session_data: [Session Information]

Body:
- Form fields (text, select, etc.)
- File attachments
            </div>
        </div>

        <form method="POST" action="/practice/forms/123/submit?source=web&version=2.0" enctype="multipart/form-data">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="title">Form Title *</label>
                    <input type="text" id="title" name="title" required placeholder="Enter form title">
                </div>
                <div class="form-group">
                    <label for="category">Category *</label>
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="bug_report">Bug Report</option>
                        <option value="feature_request">Feature Request</option>
                        <option value="feedback">General Feedback</option>
                        <option value="support">Support Request</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea id="description" name="description" rows="4" required placeholder="Provide detailed description..."></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" name="priority">
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option>
                        <option value="high">High</option>
                        <option value="critical">Critical</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="assignee">Assignee</label>
                    <input type="text" id="assignee" name="assignee" placeholder="Assign to (optional)">
                </div>
            </div>

            <div class="form-group">
                <label>Attachments (Multiple files allowed)</label>
                <div class="file-upload-area">
                    <input type="file" id="attachments" name="attachments[]" multiple class="file-input">
                    <div class="upload-icon">📎</div>
                    <div class="upload-text">Click to upload or drag and drop</div>
                    <div class="upload-hint">PDF, DOC, DOCX, TXT, Images up to 5MB each</div>
                </div>
                <div class="file-preview" id="filePreview">
                    <div class="file-info">
                        <div class="file-details">
                            <div class="file-name" id="fileName"></div>
                            <div class="file-meta" id="fileMeta"></div>
                        </div>
                        <button type="button" class="remove-file" onclick="removeFiles()">Remove All</button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tags">Tags (comma separated)</label>
                <input type="text" id="tags" name="tags" placeholder="urgent, frontend, backend, database">
            </div>

            <div class="form-group">
                <label for="notes">Additional Notes</label>
                <textarea id="notes" name="notes" rows="3" placeholder="Any additional information..."></textarea>
            </div>

            <button type="submit" class="btn">Submit Complex Form</button>
            <button type="reset" class="btn btn-secondary">Reset Form</button>
        </form>

        <div class="test-section">
            <h3>🧪 Test Different Scenarios:</h3>
            <p>Try these different URL patterns to see how path variables and query parameters work:</p>
            
            <div class="test-links">
                <a href="/practice/forms/456/submit?version=1.0" class="btn btn-warning" style="text-decoration: none; display: inline-block;">
                    Test Form 456 (v1.0)
                </a>
                <a href="/practice/forms/789/submit?source=api&version=3.0" class="btn btn-warning" style="text-decoration: none; display: inline-block;">
                    Test Form 789 (API v3.0)
                </a>
                <a href="/practice/forms/999/submit?source=mobile&version=2.1" class="btn btn-warning" style="text-decoration: none; display: inline-block;">
                    Test Form 999 (Mobile v2.1)
                </a>
            </div>

            <div style="margin-top: 15px; padding: 15px; background: #fff3cd; border-radius: 4px; border-left: 4px solid #ffc107;">
                <strong>💡 Pro Tip:</strong> Open browser developer tools to see the actual headers and cookies being sent with each request!
            </div>
        </div>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Processing:</h3>
            <div class="code-example">
// Mixed method handling in controller
public function complexFormHandling(Request $request, $formId)
{
    // 1. Path variable
    $formId = $formId;
    
    // 2. Query parameters
    $source = $request->query('source', 'unknown');
    $version = $request->query('version', '1.0');
    
    // 3. Form data (request body)
    $formData = $request->all();
    
    // 4. Headers
    $userAgent = $request->header('User-Agent', 'Unknown');
    $contentType = $request->header('Content-Type', 'Not specified');
    
    // 5. Files
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
    
    // 6. Cookies
    $userToken = $request->cookie('user_token', 'Not set');
    $sessionData = $request->cookie('session_data', 'Not set');
    
    // Process and analyze all data
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

            <h3>📊 Input Methods Summary:</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; margin-top: 15px;">
                <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #3498db;">
                    <span class="method-indicator method-path">PATH</span>
                    <strong>Form ID:</strong> From URL segment<br>
                    <code>/forms/{formId}/submit</code>
                </div>
                <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #27ae60;">
                    <span class="method-indicator method-query">QUERY</span>
                    <strong>Source & Version:</strong> From URL parameters<br>
                    <code>?source=web&version=2.0</code>
                </div>
                <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #f39c12;">
                    <span class="method-indicator method-body">BODY</span>
                    <strong>Form Fields:</strong> From POST data<br>
                    <code>title, category, description, etc.</code>
                </div>
                <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #e74c3c;">
                    <span class="method-indicator method-file">FILES</span>
                    <strong>Attachments:</strong> From file upload<br>
                    <code>multipart/form-data</code>
                </div>
                <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #9b59b6;">
                    <span class="method-indicator method-header">HEADERS</span>
                    <strong>Request Headers:</strong> Auto-sent<br>
                    <code>User-Agent, Content-Type, etc.</code>
                </div>
                <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #34495e;">
                    <span class="method-indicator method-cookie">COOKIES</span>
                    <strong>Cookies:</strong> From browser storage<br>
                    <code>user_token, session_data, etc.</code>
                </div>
            </div>

            <h3>🎯 Learning Objectives:</h3>
            <ul style="color: #555;">
                <li>Understanding how different input methods work together</li>
                <li>Proper validation for mixed input types</li>
                <li>Data organization and processing from multiple sources</li>
                <li>Security considerations for complex forms</li>
                <li>Best practices for API and form handling</li>
            </ul>
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('attachments');
        const filePreview = document.getElementById('filePreview');
        const fileName = document.getElementById('fileName');
        const fileMeta = document.getElementById('fileMeta');

        fileInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                const totalSize = Array.from(files).reduce((sum, file) => sum + file.size, 0);
                fileName.textContent = `${files.length} file(s) selected`;
                fileMeta.textContent = `Total size: ${formatFileSize(totalSize)}`;
                filePreview.classList.add('active');
            } else {
                filePreview.classList.remove('active');
            }
        });

        function removeFiles() {
            fileInput.value = '';
            filePreview.classList.remove('active');
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Drag and drop functionality
        const uploadArea = document.querySelector('.file-upload-area');
        
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#e67e22';
            this.style.backgroundColor = '#fdebd0';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#f39c12';
            this.style.backgroundColor = '#fef9e7';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#f39c12';
            this.style.backgroundColor = '#fef9e7';
            
            const files = e.dataTransfer.files;
            fileInput.files = files;
            
            const event = new Event('change', { bubbles: true });
            fileInput.dispatchEvent(event);
        });
    </script>
</body>
</html>
