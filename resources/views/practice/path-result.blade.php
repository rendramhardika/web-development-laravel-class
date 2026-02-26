<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Path Variable Results</title>
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
        .params-display {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-family: 'Courier New', monospace;
        }
        .param-item {
            margin: 5px 0;
        }
        .param-key {
            color: #3498db;
            font-weight: bold;
        }
        .param-value {
            color: #2ecc71;
        }
        .user-profile {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 2px solid #e1e8ed;
        }
        .user-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .user-avatar {
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
        .user-info h2 {
            margin: 0 0 5px 0;
            color: #2c3e50;
        }
        .user-meta {
            color: #7f8c8d;
            font-size: 0.9em;
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
        .courses-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .courses-table th,
        .courses-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }
        .courses-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #2c3e50;
        }
        .grade {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.85em;
        }
        .grade-a { background: #d5f4e6; color: #27ae60; }
        .grade-b { background: #fef9e7; color: #f39c12; }
        .grade-c { background: #fadbd8; color: #e74c3c; }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
            font-weight: 500;
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
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .product-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 20px;
            border: 2px solid #e1e8ed;
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .product-name {
            font-size: 1.2em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 1.4em;
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .category-header {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/practice/path-form" class="back-link">← Back to Path Variable Practice</a>
        
        <h1>🛤️ Path Variable Results</h1>
        <p class="subtitle">URL Segments Processing Results</p>

        <div class="params-display">
            <h3 style="margin-top: 0; color: #ecf0f1;">📊 Extracted Path Parameters:</h3>
            @if(isset($user))
                <div class="param-item">
                    <span class="param-key">userId:</span> 
                    <span class="param-value">{{ $user['id'] }}</span>
                </div>
                <div class="param-item">
                    <span class="param-key">section:</span> 
                    <span class="param-value">{{ $section }}</span>
                </div>
            @else
                <div class="param-item">
                    <span class="param-key">category:</span> 
                    <span class="param-value">{{ $category }}</span>
                </div>
                <div class="param-item">
                    <span class="param-key">subCategory:</span> 
                    <span class="param-value">{{ $subCategory ?: '(not specified)' }}</span>
                </div>
            @endif
        </div>

        @if(isset($user))
            <!-- User Profile Display -->
            <div class="user-profile">
                <div class="user-header">
                    <div class="user-avatar">
                        {{ substr($user['name'], -1) }}
                    </div>
                    <div class="user-info">
                        <h2>{{ $user['name'] }}</h2>
                        <div class="user-meta">
                            {{ $user['email'] }} | {{ $user['role'] }} | ID: {{ $user['id'] }}
                        </div>
                    </div>
                </div>

                <div class="tabs">
                    <button class="tab active" onclick="showTab('overview')">Overview</button>
                    <button class="tab" onclick="showTab('profile')">Profile</button>
                    <button class="tab" onclick="showTab('courses')">Courses</button>
                    <button class="tab" onclick="showTab('settings')">Settings</button>
                </div>

                <div id="overview" class="tab-content active">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">User ID</div>
                            <div class="info-value">{{ $user['id'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $user['email'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Role</div>
                            <div class="info-value">{{ $user['role'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Registration Date</div>
                            <div class="info-value">{{ $user['registration_date'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Last Login</div>
                            <div class="info-value">{{ $user['last_login'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Current Section</div>
                            <div class="info-value">{{ ucfirst($section) }}</div>
                        </div>
                    </div>
                </div>

                <div id="profile" class="tab-content">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Bio</div>
                            <div class="info-value">{{ $user['profile']['bio'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Phone</div>
                            <div class="info-value">{{ $user['profile']['phone'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Address</div>
                            <div class="info-value">{{ $user['profile']['address'] }}</div>
                        </div>
                    </div>
                </div>

                <div id="courses" class="tab-content">
                    <h3>Enrolled Courses</h3>
                    <table class="courses-table">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user['courses'] as $course)
                                <tr>
                                    <td>{{ $course['code'] }}</td>
                                    <td>{{ $course['name'] }}</td>
                                    <td>
                                        <span class="grade grade-{{ strtolower(substr($course['grade'], 0, 1)) }}">
                                            {{ $course['grade'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="settings" class="tab-content">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Account Status</div>
                            <div class="info-value">✅ Active</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email Verified</div>
                            <div class="info-value">✅ Yes</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Two-Factor Auth</div>
                            <div class="info-value">❌ Disabled</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Privacy Level</div>
                            <div class="info-value">Public</div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="/practice/users/{{ $user['id'] }}/profile/overview" class="btn">Overview</a>
                <a href="/practice/users/{{ $user['id'] }}/profile/edit" class="btn">Edit Profile</a>
                <a href="/practice/users/{{ $user['id'] }}/profile/settings" class="btn">Settings</a>
            </div>
        @else
            <!-- Category Products Display -->
            <div class="category-header">
                <h2 style="margin: 0;">📦 {{ ucfirst($category) }} Products</h2>
                @if($subCategory)
                    <p style="margin: 5px 0 0 0;">Subcategory: {{ ucfirst($subCategory) }}</p>
                @endif
            </div>

            @if(count($products) > 0)
                <div class="products-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <div class="product-name">{{ $product['name'] }}</div>
                            <div class="product-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                            <div style="color: #7f8c8d; font-size: 0.9em;">
                                {{ $subCategory ? ucfirst($subCategory) : ucfirst($category) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; padding: 40px; background: #f8f9fa; border-radius: 8px;">
                    <h3>😔 No products found</h3>
                    <p>Try selecting a different category or subcategory.</p>
                </div>
            @endif

            <div style="text-align: center; margin-top: 20px;">
                <a href="/practice/products/{{ $category }}" class="btn btn-secondary">All {{ ucfirst($category) }}</a>
                @if(isset($categories[$category]))
                    @foreach($categories[$category] as $sub)
                        <a href="/practice/products/{{ $category }}/{{ $sub }}" class="btn">
                            {{ ucfirst($sub) }}
                        </a>
                    @endforeach
                @endif
            </div>
        @endif

        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
            <h3>🔧 Controller Processing:</h3>
            <pre style="background: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 4px; overflow-x: auto;">
// Path variables automatically injected by Laravel
public function getUserProfile($userId, $section = 'overview')
{
    // $userId comes from {userId} in URL
    // $section comes from {section} in URL (optional)
    
    // Mock user data based on userId
    $user = [
        'id' => $userId,
        'name' => 'User ' . $userId,
        // ... other user data
    ];
    
    return view('practice.path-result', compact('user', 'section'));
}
            </pre>

            <div style="margin-top: 20px; text-align: center;">
                <a href="/practice/path-form" class="btn">Try More Examples</a>
                <a href="/practice/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
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
    </script>
</body>
</html>
