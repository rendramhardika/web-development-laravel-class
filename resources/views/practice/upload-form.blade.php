<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Practice</title>
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #2c3e50;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }
        input[type="text"]:focus, input[type="file"]:focus {
            outline: none;
            border-color: #3498db;
        }
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
            resize: vertical;
            min-height: 80px;
        }
        textarea:focus {
            outline: none;
            border-color: #3498db;
        }
        .file-upload-area {
            border: 2px dashed #3498db;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            background: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        .file-upload-area:hover {
            border-color: #2980b9;
            background: #e3f2fd;
        }
        .file-upload-area.dragover {
            border-color: #27ae60;
            background: #d5f4e6;
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
            font-size: 3em;
            color: #3498db;
            margin-bottom: 15px;
        }
        .upload-text {
            color: #2c3e50;
            font-size: 1.1em;
            margin-bottom: 10px;
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
        .btn-success {
            background: #27ae60;
        }
        .btn-success:hover {
            background: #229954;
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
            overflow-x: auto;
        }
        .tabs {
            display: flex;
            border-bottom: 2px solid #ecf0f1;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            background: #ecf0f1;
            border: none;
            cursor: pointer;
            border-radius: 8px 8px 0 0;
            margin-right: 5px;
            transition: background 0.3s ease;
        }
        .tab.active {
            background: #3498db;
            color: white;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .multi-file-area {
            border: 2px dashed #f39c12;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            background: #fef9e7;
            margin-bottom: 20px;
        }
        .file-list {
            margin-top: 15px;
        }
        .file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background: white;
            border-radius: 6px;
            margin-bottom: 8px;
            border: 1px solid #ecf0f1;
        }
        .file-type-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8em;
            font-weight: bold;
            margin-left: 10px;
        }
        .type-document {
            background: #3498db;
            color: white;
        }
        .type-image {
            background: #27ae60;
            color: white;
        }
        .validation-info {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 12px;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 0.9em;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/dashboard" class="back-link">← Back to Dashboard</a>
        
        <h1>📁 File Upload Practice</h1>
        <p class="subtitle">Belajar menghandle single dan multiple file uploads dengan validation</p>

        <div class="info-box">
            <strong>📖 Konsep:</strong> File upload memungkinkan user mengirim file ke server.
            Laravel menyediakan cara mudah untuk validate dan process uploaded files.
        </div>

        <div class="tabs">
            <button class="tab active" onclick="showTab('single')">Single Upload</button>
            <button class="tab" onclick="showTab('multiple')">Multiple Upload</button>
        </div>

        <div id="single" class="tab-content active">
            <form method="POST" action="/practice/upload/avatar" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="user_name">Your Name *</label>
                    <input type="text" id="user_name" name="user_name" required placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label>Profile Picture *</label>
                    <div class="file-upload-area" id="singleUploadArea">
                        <input type="file" id="avatar" name="avatar" class="file-input" accept="image/*" required>
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Click to upload or drag and drop</div>
                        <div class="upload-hint">PNG, JPG, GIF up to 2MB</div>
                    </div>
                    <div class="file-preview" id="singleFilePreview">
                        <div class="file-info">
                            <div class="file-details">
                                <div class="file-name" id="singleFileName"></div>
                                <div class="file-meta">
                                    <span id="singleFileSize"></span> • 
                                    <span id="singleFileType"></span>
                                </div>
                            </div>
                            <button type="button" class="remove-file" onclick="removeSingleFile()">Remove</button>
                        </div>
                    </div>
                    <div class="validation-info">
                        <strong>Validation Rules:</strong><br>
                        • Required field<br>
                        • Image files only (jpeg, png, jpg, gif)<br>
                        • Maximum file size: 2MB<br>
                        • File will be processed but not actually stored
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description (Optional)</label>
                    <textarea id="description" name="description" placeholder="Tell us about this profile picture..."></textarea>
                </div>

                <button type="submit" class="btn">Upload Avatar</button>
                <button type="reset" class="btn btn-secondary" onclick="resetSingleForm()">Reset Form</button>
            </form>
        </div>

        <div id="multiple" class="tab-content">
            <form method="POST" action="/practice/upload/multiple" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="folder_name">Folder Name *</label>
                    <input type="text" id="folder_name" name="folder_name" required placeholder="my_documents_2024">
                </div>

                <div class="form-group">
                    <label>Documents (PDF, DOC, DOCX, TXT)</label>
                    <div class="multi-file-area">
                        <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx,.txt">
                        <div class="upload-icon">📄</div>
                        <div class="upload-text">Select multiple documents</div>
                        <div class="upload-hint">Maximum 10MB per file</div>
                    </div>
                    <div class="file-list" id="documentsList"></div>
                    <div class="validation-info">
                        <strong>Document Rules:</strong><br>
                        • Multiple files allowed<br>
                        • PDF, DOC, DOCX, TXT only<br>
                        • Maximum 10MB per file
                    </div>
                </div>

                <div class="form-group">
                    <label>Images (JPEG, PNG, JPG)</label>
                    <div class="multi-file-area">
                        <input type="file" id="images" name="images[]" multiple accept="image/jpeg,image/png,image/jpg">
                        <div class="upload-icon">🖼️</div>
                        <div class="upload-text">Select multiple images</div>
                        <div class="upload-hint">Maximum 2MB per image</div>
                    </div>
                    <div class="file-list" id="imagesList"></div>
                    <div class="validation-info">
                        <strong>Image Rules:</strong><br>
                        • Multiple files allowed<br>
                        • JPEG, PNG, JPG only<br>
                        • Maximum 2MB per image
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Upload All Files</button>
                <button type="reset" class="btn btn-secondary" onclick="resetMultipleForm()">Reset Form</button>
            </form>
        </div>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Code:</h3>
            <div class="code-example">
// Single file upload
$validated = $request->validate([
    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    'user_name' => 'required|string|max:255',
    'description' => 'nullable|string|max:500'
]);

if ($request->hasFile('avatar')) {
    $file = $request->file('avatar');
    $filename = time() . '_' . $file->getClientOriginalName();
    $filesize = $file->getSize();
    $filetype = $file->getMimeType();
    
    // Store file (simulated)
    // $path = $file->storeAs('avatars', $filename, 'public');
}

// Multiple files upload
$validated = $request->validate([
    'documents.*' => 'required|file|mimes:pdf,doc,docx,txt|max:10240',
    'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    'folder_name' => 'required|string|max:100'
]);

$uploadedFiles = [];
if ($request->hasFile('documents')) {
    foreach ($request->file('documents') as $document) {
        $path = $document->store('documents', 'public');
        $uploadedFiles[] = $path;
    }
}
            </div>

            <h3>💡 Key File Methods:</h3>
            <ul style="color: #555;">
                <li><code>$request->hasFile('field')</code> - Check if file exists</li>
                <li><code>$request->file('field')</code> - Get uploaded file object</li>
                <li><code>$file->getClientOriginalName()</code> - Original filename</li>
                <li><code>$file->getSize()</code> - File size in bytes</li>
                <li><code>$file->getMimeType()</code> - MIME type</li>
                <li><code>$file->store('directory', 'disk')</code> - Store file</li>
                <li><code>$file->isValid()</code> - Check if upload is valid</li>
            </ul>

            <h3>🔒 Security Considerations:</h3>
            <ul style="color: #555;">
                <li>Always validate file types and sizes</li>
                <li>Use proper MIME type checking</li>
                <li>Store files outside public directory when possible</li>
                <li>Generate unique filenames to prevent conflicts</li>
                <li>Scan uploaded files for malware</li>
                <li>Implement proper access controls</li>
            </ul>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));
            
            // Show selected tab content
            document.getElementById(tabName).classList.add('active');
            
            // Add active class to clicked tab
            event.target.classList.add('active');
        }

        // Single file upload handling
        const singleFileInput = document.getElementById('avatar');
        const singleUploadArea = document.getElementById('singleUploadArea');
        const singleFilePreview = document.getElementById('singleFilePreview');

        singleFileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                showSingleFilePreview(file);
            }
        });

        // Drag and drop for single file
        singleUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });

        singleUploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });

        singleUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                singleFileInput.files = files;
                showSingleFilePreview(files[0]);
            }
        });

        function showSingleFilePreview(file) {
            document.getElementById('singleFileName').textContent = file.name;
            document.getElementById('singleFileSize').textContent = formatFileSize(file.size);
            document.getElementById('singleFileType').textContent = file.type || 'Unknown';
            singleFilePreview.classList.add('active');
        }

        function removeSingleFile() {
            singleFileInput.value = '';
            singleFilePreview.classList.remove('active');
        }

        function resetSingleForm() {
            removeSingleFile();
            document.getElementById('user_name').value = '';
            document.getElementById('description').value = '';
        }

        // Multiple files handling
        const documentsInput = document.getElementById('documents');
        const imagesInput = document.getElementById('images');

        documentsInput.addEventListener('change', function(e) {
            showMultipleFilesPreview(e.target.files, 'documentsList', 'document');
        });

        imagesInput.addEventListener('change', function(e) {
            showMultipleFilesPreview(e.target.files, 'imagesList', 'image');
        });

        function showMultipleFilesPreview(files, listId, type) {
            const list = document.getElementById(listId);
            list.innerHTML = '';
            
            Array.from(files).forEach(file => {
                const item = document.createElement('div');
                item.className = 'file-item';
                item.innerHTML = `
                    <div>
                        <strong>${file.name}</strong>
                        <span class="file-type-badge type-${type}">${type.toUpperCase()}</span>
                        <div style="color: #7f8c8d; font-size: 0.9em;">
                            ${formatFileSize(file.size)} • ${file.type || 'Unknown'}
                        </div>
                    </div>
                `;
                list.appendChild(item);
            });
        }

        function resetMultipleForm() {
            documentsInput.value = '';
            imagesInput.value = '';
            document.getElementById('documentsList').innerHTML = '';
            document.getElementById('imagesList').innerHTML = '';
            document.getElementById('folder_name').value = '';
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    </script>
</body>
</html>
