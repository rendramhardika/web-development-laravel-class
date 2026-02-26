<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Body Results</title>
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
        .data-display {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-family: 'Courier New', monospace;
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
        .array-value {
            color: #f39c12;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
        .profile-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid #e1e8ed;
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .profile-avatar {
            width: 80px;
            height: 80px;
            background: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2em;
            font-weight: bold;
            margin-right: 20px;
        }
        .profile-info h2 {
            margin: 0 0 5px 0;
            color: #2c3e50;
        }
        .profile-meta {
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
        }
        .hobbies-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }
        .hobby-tag {
            background: #3498db;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 500;
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
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/body-form" class="back-link">← Back to Form</a>
        
        <h1>📝 Request Body Processing Results</h1>
        <p class="subtitle">Form data successfully processed and validated</p>

        <div class="success-message">
            <h3 style="margin: 0;">✅ Form Successfully Processed!</h3>
            <p style="margin: 5px 0 0 0;">All data has been validated and processed by the controller.</p>
        </div>

        <div class="data-display">
            <h3 style="margin-top: 0; color: #ecf0f1;">📊 Received Form Data:</h3>
            <div class="data-item">
                <span class="data-key">name:</span>
                <span class="data-value">{{ $validated['name'] }}</span>
            </div>
            <div class="data-item">
                <span class="data-key">email:</span>
                <span class="data-value">{{ $validated['email'] }}</span>
            </div>
            <div class="data-item">
                <span class="data-key">age:</span>
                <span class="data-value">{{ $validated['age'] }} years</span>
            </div>
            <div class="data-item">
                <span class="data-key">gender:</span>
                <span class="data-value">{{ ucfirst($validated['gender']) }}</span>
            </div>
            <div class="data-item">
                <span class="data-key">education:</span>
                <span class="data-value">{{ strtoupper($validated['education']) }}</span>
            </div>
            <div class="data-item">
                <span class="data-key">hobbies:</span>
                <span class="data-value array-value">[{{ implode(', ', $validated['hobbies']) }}]</span>
            </div>
            @if(isset($validated['message']))
                <div class="data-item">
                    <span class="data-key">message:</span>
                    <span class="data-value">{{ $validated['message'] }}</span>
                </div>
            @endif
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ $hobbyCount }}</div>
                <div class="stat-label">Hobbies Selected</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $ageCategory }}</div>
                <div class="stat-label">Age Category</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $validated['age'] }}</div>
                <div class="stat-label">Age</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ strtoupper($validated['education']) }}</div>
                <div class="stat-label">Education</div>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ substr($validated['name'], 0, 1) }}
                </div>
                <div class="profile-info">
                    <h2>{{ $validated['name'] }}</h2>
                    <div class="profile-meta">
                        {{ $validated['email'] }} | {{ ucfirst($validated['gender']) }} | {{ $ageCategory }}
                    </div>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">📧 Email</div>
                    <div class="info-value">{{ $validated['email'] }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">🎂 Age</div>
                    <div class="info-value">{{ $validated['age'] }} years ({{ $ageCategory }})</div>
                </div>
                <div class="info-item">
                    <div class="info-label">👤 Gender</div>
                    <div class="info-value">{{ ucfirst($validated['gender']) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">🎓 Education</div>
                    <div class="info-value">{{ strtoupper($validated['education']) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">🎯 Hobbies Count</div>
                    <div class="info-value">{{ $hobbyCount }} selected</div>
                </div>
                <div class="info-item">
                    <div class="info-label">📊 Category</div>
                    <div class="info-value">
                        @if($hobbyCount >= 5)
                            Multi-talented
                        @elseif($hobbyCount >= 3)
                            Hobby Enthusiast
                        @else
                            Focused
                        @endif
                    </div>
                </div>
            </div>

            @if(count($validated['hobbies']) > 0)
                <div style="margin-top: 20px;">
                    <div class="info-label">🎨 Hobbies:</div>
                    <div class="hobbies-list">
                        @foreach($validated['hobbies'] as $hobby)
                            <span class="hobby-tag">{{ ucfirst($hobby) }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(isset($validated['message']))
                <div style="margin-top: 20px;">
                    <div class="info-label">💬 Message:</div>
                    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #3498db;">
                        {{ $validated['message'] }}
                    </div>
                </div>
            @endif
        </div>

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Processing:</h3>
            <div class="code-block">
// Validation rules
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

// Data processing
$hobbyCount = count($validated['hobbies']);
$ageCategory = $validated['age'] < 25 ? 'Young' : 
              ($validated['age'] < 40 ? 'Adult' : 'Senior');

// Pass data to view
return view('practice.body-result', compact(
    'validated', 'hobbyCount', 'ageCategory'
));
            </div>

            <h3>💡 Key Concepts Demonstrated:</h3>
            <ul style="color: #555;">
                <li><span class="highlight">Form Validation:</span> Required fields, type checking, min/max values</li>
                <li><span class="highlight">Array Handling:</span> Multiple hobbies selection with array validation</li>
                <li><span class="highlight">Conditional Fields:</span> Optional message field</li>
                <li><span class="highlight">Data Processing:</span> Age categorization and hobby counting</li>
                <li><span class="highlight">View Rendering:</span> Dynamic content based on processed data</li>
            </ul>

            <div style="margin-top: 20px; text-align: center;">
                <a href="/practice/body-form" class="btn btn-success">Submit Another Form</a>
                <a href="/practice/body-form" class="btn btn-secondary">Reset Form</a>
                <a href="/practice/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
