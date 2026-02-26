<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Body Practice</title>
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
        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }
        .checkbox-item {
            display: flex;
            align-items: center;
            padding: 8px;
            background: #f8f9fa;
            border-radius: 6px;
            transition: background 0.3s ease;
        }
        .checkbox-item:hover {
            background: #e3f2fd;
        }
        .checkbox-item input {
            width: auto;
            margin-right: 8px;
        }
        .radio-group {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }
        .radio-item {
            display: flex;
            align-items: center;
            padding: 8px 15px;
            background: #f8f9fa;
            border-radius: 6px;
            transition: background 0.3s ease;
        }
        .radio-item:hover {
            background: #e3f2fd;
        }
        .radio-item input {
            width: auto;
            margin-right: 6px;
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
        .api-demo {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .json-example {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.85em;
            overflow-x: auto;
            white-space: pre;
        }
        .http-method {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.8em;
            margin-right: 10px;
        }
        .method-post {
            background: #27ae60;
            color: white;
        }
        .method-get {
            background: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/dashboard" class="back-link">← Back to Dashboard</a>
        
        <h1>📝 Request Body Practice</h1>
        <p class="subtitle">Belajar menerima data melalui form submission dan JSON payload</p>

        <div class="info-box">
            <strong>📖 Konsep:</strong> Request body digunakan untuk mengirim data dari client ke server melalui POST/PUT requests.
            Cocok untuk form submission, API calls, dan file uploads.
        </div>

        <div class="tabs">
            <button class="tab active" onclick="showTab('form')">HTML Form</button>
            <button class="tab" onclick="showTab('api')">JSON API</button>
        </div>

        <div id="form" class="tab-content active">
            <form method="POST" action="/practice/process-form">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="john@example.com">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="age">Age *</label>
                        <input type="number" id="age" name="age" required min="17" max="65" placeholder="25">
                    </div>
                    <div class="form-group">
                        <label>Gender *</label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" id="male" name="gender" value="male" required>
                                <label for="male">Male</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="female" name="gender" value="female" required>
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="education">Education Level *</label>
                    <select id="education" name="education" required>
                        <option value="">Select Education</option>
                        <option value="sma">High School (SMA)</option>
                        <option value="s1">Bachelor's Degree (S1)</option>
                        <option value="s2">Master's Degree (S2)</option>
                        <option value="s3">Doctoral Degree (S3)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Hobbies (Select at least one) *</label>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="reading" name="hobbies[]" value="reading">
                            <label for="reading">📚 Reading</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="coding" name="hobbies[]" value="coding">
                            <label for="coding">💻 Coding</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="gaming" name="hobbies[]" value="gaming">
                            <label for="gaming">🎮 Gaming</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="music" name="hobbies[]" value="music">
                            <label for="music">🎵 Music</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="sports" name="hobbies[]" value="sports">
                            <label for="sports">⚽ Sports</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="travel" name="hobbies[]" value="travel">
                            <label for="travel">✈️ Travel</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Additional Message (Optional)</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us more about yourself..."></textarea>
                    <small style="color: #7f8c8d;">Maximum 500 characters</small>
                </div>

                <button type="submit" class="btn">Submit Form</button>
                <button type="reset" class="btn btn-secondary">Reset Form</button>
            </form>
        </div>

        <div id="api" class="tab-content">
            <div class="api-demo">
                <h3>🔌 JSON API Endpoint</h3>
                <p>Test the API endpoint that accepts JSON data:</p>
                
                <div style="margin: 15px 0;">
                    <span class="http-method method-post">POST</span>
                    <code>/practice/api/products</code>
                </div>

                <h4>Request Headers:</h4>
                <div class="code-example">
Content-Type: application/json
Accept: application/json
X-Requested-With: XMLHttpRequest
                </div>

                <h4>Request Body (JSON):</h4>
                <div class="json-example">{
  "name": "Laptop Gaming ROG",
  "price": 15000000,
  "category": "electronics",
  "description": "High-performance gaming laptop",
  "tags": ["gaming", "laptop", "rog"],
  "in_stock": true
}</div>

                <h4>Try it with JavaScript:</h4>
                <div class="code-example">
fetch('/practice/api/products', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
  },
  body: JSON.stringify({
    name: 'Test Product',
    price: 1000000,
    category: 'electronics',
    tags: ['test'],
    in_stock: true
  })
})
.then(response => response.json())
.then(data => console.log(data));
                </div>

                <button onclick="testApi()" class="btn" style="margin-top: 15px;">Test API Call</button>
                <div id="api-result" style="margin-top: 15px; display: none;">
                    <h4>API Response:</h4>
                    <div id="api-response" class="json-example"></div>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Code:</h3>
            <div class="code-example">
// Form data validation
$validated = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|max:255',
    'age' => 'required|integer|min:17|max:65',
    'gender' => 'required|in:male,female',
    'hobbies' => 'required|array|min:1',
    'hobbies.*' => 'string',
    'education' => 'required|in:sma,s1,s2,s3',
    'message' => 'nullable|string|max:500'
]);

// Access individual fields
$name = $request->input('name');
$email = $request->get('email');
$hobbies = $request->get('hobbies', []);

// Check if field exists
if ($request->has('message')) {
    $message = $request->input('message');
}

// JSON API handling
$jsonData = $request->json()->all();
$productName = $request->input('name'); // Works for both form and JSON
            </div>

            <h3>💡 Key Differences:</h3>
            <ul style="color: #555;">
                <li><strong>Form Data:</strong> application/x-www-form-urlencoded or multipart/form-data</li>
                <li><strong>JSON:</strong> application/json content type</li>
                <li><strong>Validation:</strong> Same rules apply to both types</li>
                <li><strong>Access:</strong> $request->input() works for both, $request->json() for JSON only</li>
                <li><strong>CSRF:</strong> Required for form submissions, optional for API</li>
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

        async function testApi() {
            const resultDiv = document.getElementById('api-result');
            const responseDiv = document.getElementById('api-response');
            
            try {
                const response = await fetch('/practice/api/products', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: 'Test Product ' + Date.now(),
                        price: Math.floor(Math.random() * 10000000) + 1000000,
                        category: 'electronics',
                        description: 'Test product from JavaScript',
                        tags: ['test', 'demo', 'javascript'],
                        in_stock: true
                    })
                });
                
                const data = await response.json();
                responseDiv.textContent = JSON.stringify(data, null, 2);
                resultDiv.style.display = 'block';
            } catch (error) {
                responseDiv.textContent = 'Error: ' + error.message;
                resultDiv.style.display = 'block';
            }
        }
    </script>
</body>
</html>
