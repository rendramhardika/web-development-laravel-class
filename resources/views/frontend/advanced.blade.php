@extends('layouts.frontend')

@section('title', 'Advanced Blade Features - Laravel Blade Practice')

@section('header-title', '🚀 Advanced Blade Features')
@section('header-subtitle', 'Security, Custom Directives & JavaScript Integration')

@section('breadcrumb')
    <div class="breadcrumb">
        <a href="/frontend/dashboard">Frontend</a> / <a href="/frontend/architecture">Architecture</a> / <a href="/frontend/blade-basic">Blade Basic</a> / <a href="/frontend/layouts">Layouts</a> / <a href="/frontend/sections">Sections</a> / <a href="/frontend/directives">Directives</a> / Advanced
    </div>
@endsection

@section('content')
    <div class="content-section">
        <h2>🚀 Advanced Blade Features</h2>
        <p>Mempelajari advanced Blade features seperti AUTH, GUEST, CSRF, METHOD, custom directives, dan JavaScript integration.</p>
        
        <div class="alert alert-info">
            <strong>🎯 Learning Objectives:</strong>
            <ul>
                <li>Authentication directives (AUTH, GUEST)</li>
                <li>Security directives (CSRF, METHOD)</li>
                <li>Custom directives creation</li>
                <li>JavaScript integration techniques</li>
                <li>Form handling best practices</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🔐 Authentication Directives</h2>
        <div class="demo-section">
            <h3>AUTH and GUEST Directives:</h3>
            <p>Blade menyediakan directives untuk authentication checks:</p>
            <ul>
                <li><strong>AUTH:</strong> Menampilkan content hanya untuk authenticated users</li>
                <li><strong>GUEST:</strong> Menampilkan content hanya untuk guest users</li>
                <li><strong>ENDAUTH/ENDGUEST:</strong> Menutup authentication blocks</li>
            </ul>
            
            <h4>Live Demo:</h4>
            <div class="alert alert-success">
                @auth
                    <h3>Welcome, {{ $currentUser['name'] }}!</h3>
                    <a href="/logout">Logout</a>
                @else
                    <p>Please <a href="/login">login</a> to continue.</p>
                @endauth
            </div>
        </div>

        <div class="demo-section">
            <h3>AUTH with Role Check:</h3>
            <p>Kombinasi AUTH dengan conditional statements untuk role-based content:</p>
            <ul>
                <li><strong>Admin Access:</strong> Special features untuk admin users</li>
                <li><strong>User Access:</strong> Standard features untuk regular users</li>
                <li><strong>Role-Based UI:</strong> Different interface berdasarkan user role</li>
            </ul>
            
            <h4>Live Demo:</h4>
            <div class="alert alert-success">
                @auth
                    @if($currentUser['role'] === 'admin')
                        <p style="color: blue;">🔐 Admin Panel</p>
                    @else
                        <p style="color: green;">👤 User Dashboard</p>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🛡️ Security Directives</h2>
        <div class="demo-section">
            <h3>CSRF Token Protection:</h3>
            <p>CSRF directive menambahkan token untuk form security:</p>
            <ul>
                <li><strong>CSRF Token:</strong> Hidden input field dengan unique token</li>
                <li><strong>Automatic Generation:</strong> Laravel generates token secara otomatis</li>
                <li><strong>Form Protection:</strong> Mencegah Cross-Site Request Forgery attacks</li>
                <li><strong>Required for POST:</strong> Semua POST requests harus include CSRF token</li>
            </ul>
            
            <p><strong>Current CSRF Token:</strong> <code>{{ $csrfToken }}</code></p>
        </div>

        <div class="demo-section">
            <h3>METHOD Spoofing:</h3>
            <p>METHOD directive untuk HTTP method spoofing:</p>
            <ul>
                <li><strong>PUT Method:</strong> Update operations</li>
                <li><strong>DELETE Method:</strong> Delete operations</li>
                <li><strong>PATCH Method:</strong> Partial update operations</li>
                <li><strong>HTML Forms:</strong> Only support GET and POST, spoofing needed untuk lainnya</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🎨 Custom Directives</h2>
        <div class="demo-section">
            <h3>Creating Custom Directives:</h3>
            <p>Laravel memungkinkan pembuatan custom Blade directives:</p>
            <ul>
                <li><strong>DateTime Directive:</strong> Format tanggal dan waktu</li>
                <li><strong>Currency Directive:</strong> Format mata uang</li>
                <li><strong>Gravatar Directive:</strong> Generate gravatar URLs</li>
                <li><strong>Custom Logic:</strong> Any PHP logic dapat dijadikan directive</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Custom Directive Examples:</h3>
            <p>Output dari custom directives:</p>
            <div class="alert alert-success">
                <p><strong>DateTime:</strong> {{ now()->format('m/d/Y H:i') }}</p>
                <p><strong>Currency:</strong> Rp {{ number_format(1500000, 0, ',', '.') }}</p>
                <p><strong>Gravatar:</strong> <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim('test@example.com'))) }}?s=20" alt="Gravatar" style="vertical-align: middle; border-radius: 50%;"> test@example.com</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>📝 Form Handling Best Practices</h2>
        <div class="demo-section">
            <h3>Complete Form Concepts:</h3>
            <p>Best practices untuk form handling dengan Blade:</p>
            <ul>
                <li><strong>CSRF Protection:</strong> Always include CSRF token</li>
                <li><strong>Method Spoofing:</strong> Use METHOD directive untuk PUT/DELETE</li>
                <li><strong>Old Input:</strong> Preserve user input on validation errors</li>
                <li><strong>Error Display:</strong> Show validation errors per field</li>
                <li><strong>Form Groups:</strong> Organize fields dengan proper structure</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Live Form Demo:</h3>
            <form id="demoForm" style="border: 1px solid #ddd; padding: 1rem; border-radius: 8px; background: #f8f9fa;">
                <input type="hidden" name="_token" value="{{ $csrfToken }}">
                <input type="hidden" name="_method" value="{{ $formMethod }}">
                
                <div class="form-group">
                    <label for="demoName">Name:</label>
                    <input type="text" id="demoName" name="name" placeholder="Enter name">
                </div>
                
                <div class="form-group">
                    <label for="demoEmail">Email:</label>
                    <input type="email" id="demoEmail" name="email" placeholder="Enter email">
                </div>
                
                <div class="form-group">
                    <label for="demoRole">Role:</label>
                    <select id="demoRole" name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="guest">Guest</option>
                    </select>
                </div>
                
                <button type="submit" class="btn">Submit Form</button>
                <button type="button" onclick="resetForm()" class="btn btn-secondary">Reset</button>
            </form>
            
            <div id="formResult" style="margin-top: 1rem;"></div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎮 Blade Directives Examples</h2>
        <div class="demo-section">
            <h3>Users List Example:</h3>
            <div class="code-block">
                <pre><code>
@foreach($users as $user)
    &lt;div class="user-card"&gt;
        &lt;strong&gt;{{ $user['name'] }}&lt;/strong&gt;&lt;br&gt;
        &lt;small&gt;{{ $user['email'] }}&lt;/small&gt;&lt;br&gt;
        &lt;span&gt;{{ $user['role'] }}&lt;/span&gt;
    &lt;/div&gt;
@endforeach
</code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($users as $user)
                    <div class="user-card" style="border: 1px solid #ddd; padding: 1rem; margin: 0.5rem 0; border-radius: 5px;">
                        <strong>{{ $user['name'] }}</strong><br>
                        <small>{{ $user['email'] }}</small><br>
                        <span style="color: {{ $user['role'] === 'admin' ? 'blue' : 'green' }};">{{ $user['role'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="demo-section">
            <h3>Products List Example:</h3>
            <div class="code-block">
                <pre><code>
@foreach($products as $product)
    &lt;div class="product-card"&gt;
        &lt;strong&gt;{{ $product['name'] }}&lt;/strong&gt;&lt;br&gt;
        &lt;span&gt;Rp {{ number_format($product['price'], 0, ',', '.') }}&lt;/span&gt;&lt;br&gt;
        &lt;small&gt;{{ $product['category'] }}&lt;/small&gt;
    &lt;/div&gt;
@endforeach
</code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($products as $product)
                    <div class="product-card" style="border: 1px solid #ddd; padding: 1rem; margin: 0.5rem 0; border-radius: 5px;">
                        <strong>{{ $product['name'] }}</strong><br>
                        <span style="color: green;">Rp {{ number_format($product['price'], 0, ',', '.') }}</span><br>
                        <small>{{ $product['category'] }}</small>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="demo-section">
            <h3>Posts List Example:</h3>
            <div class="code-block">
                <pre><code>
@foreach($posts as $post)
    &lt;div class="post-card"&gt;
        &lt;h4&gt;{{ $post['title'] }}&lt;/h4&gt;
        &lt;small&gt;{{ $post['date'] }} by {{ $post['author'] }}&lt;/small&gt;
    &lt;/div&gt;
@endforeach
</code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($posts as $post)
                    <div class="post-card" style="border: 1px solid #ddd; padding: 1rem; margin: 0.5rem 0; border-radius: 5px;">
                        <h4>{{ $post['title'] }}</h4>
                        <small>{{ $post['date'] }} by {{ $post['author'] }}</small>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="demo-section">
            <h3>Settings Panel Example:</h3>
            <div class="code-block">
                <pre><code>
@php
    $settings = [
        'theme' => 'dark',
        'notifications' => true,
        'language' => 'en',
        'timezone' => 'Asia/Jakarta'
    ];
@endphp

&lt;div class="settings-panel"&gt;
    &lt;h4&gt;Application Settings&lt;/h4&gt;
    &lt;p&gt;&lt;strong&gt;Theme:&lt;/strong&gt; {{ $settings['theme'] }}&lt;/p&gt;
    &lt;p&gt;&lt;strong&gt;Notifications:&lt;/strong&gt; {{ $settings['notifications'] ? 'Enabled' : 'Disabled' }}&lt;/p&gt;
    &lt;p&gt;&lt;strong&gt;Language:&lt;/strong&gt; {{ $settings['language'] }}&lt;/p&gt;
    &lt;p&gt;&lt;strong&gt;Timezone:&lt;/strong&gt; {{ $settings['timezone'] }}&lt;/p&gt;
&lt;/div&gt;
</code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @php
                    $settings = [
                        'theme' => 'dark',
                        'notifications' => true,
                        'language' => 'en',
                        'timezone' => 'Asia/Jakarta'
                    ];
                @endphp
                
                <div class="settings-panel" style="border: 1px solid #ddd; padding: 1rem; border-radius: 5px;">
                    <h4>Application Settings</h4>
                    <p><strong>Theme:</strong> {{ $settings['theme'] }}</p>
                    <p><strong>Notifications:</strong> {{ $settings['notifications'] ? 'Enabled' : 'Disabled' }}</p>
                    <p><strong>Language:</strong> {{ $settings['language'] }}</p>
                    <p><strong>Timezone:</strong> {{ $settings['timezone'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔧 JavaScript Integration Techniques</h2>
        <div class="demo-section">
            <h3>Passing Data to JavaScript:</h3>
            <div class="code-block">
                <pre><code>
{{-- Method 1: Using json_encode --}}
&lt;script&gt;
    const userData = {{ json_encode($currentUser) }};
    const settings = {{ json_encode($settings) }};
&lt;/script&gt;

{{-- Method 2: Using @json directive (Laravel 5.5+) --}}
&lt;script&gt;
    const userData = @json($currentUser);
    const settings = @json($settings);
&lt;/script&gt;

{{-- Method 3: Individual variables --}}
&lt;script&gt;
    const userName = "{{ $currentUser['name'] }}";
    const userRole = "{{ $currentUser['role'] }}";
&lt;/script&gt;
</code></pre>            </div>
        </div>

        <div class="demo-section">
            <h3>Verbatim for Raw JavaScript:</h3>
            <div class="code-block">
                <pre><code>
@verbatim
    &lt;script&gt;
        // This won't be processed by Blade
        let template = "Hello {{ name }}"; // Literal string
        console.log("Raw JavaScript code");
    &lt;/script&gt;
@endverbatim
</code></pre>            </div>
        </div>

        <div class="demo-section">
            <h3>AJAX with CSRF Token:</h3>
            <div class="code-block">
                <pre><code>
&lt;script&gt;
    const csrfToken = "{{ csrf_token() }}";
    
    fetch('/api/data', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ data: 'example' })
    })
    .then(response => response.json())
    .then(data => console.log(data));
&lt;/script&gt;
</code></pre>            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>📊 Current Data from Controller</h2>
        <div class="demo-section">
            <h3>Advanced Features Data:</h3>
            <div class="code-block">
                <pre><code>
// Controller Data:
$currentUser = {{ json_encode($currentUser) }};
$settings = {{ json_encode($settings) }};
$formMethod = '{{ $formMethod }}';
$csrfToken = '{{ $csrfToken }}';
$apiEndpoint = '{{ $apiEndpoint }}';

</code></pre>            </div>
            
            <div class="alert alert-info">
                <p><strong>Current User:</strong> {{ $currentUser['name'] }} ({{ $currentUser['role'] }})</p>
                <p><strong>Settings:</strong> Theme: {{ $settings['theme'] }}, Notifications: {{ $settings['notifications'] ? 'On' : 'Off' }}</p>
                <p><strong>Form Method:</strong> {{ $formMethod }}</p>
                <p><strong>API Endpoint:</strong> {{ $apiEndpoint }}</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🚀 Course 3 Summary</h2>
        <div class="demo-section">
            <h3>✅ What You've Learned:</h3>
            <div class="grid">
                <div>
                    <h4>🏗️ Architecture</h4>
                    <ul>
                        <li>MVC pattern understanding</li>
                        <li>View responsibilities</li>
                        <li>Separation of concerns</li>
                    </ul>
                </div>
                <div>
                    <h4>📝 Blade Basics</h4>
                    <ul>
                        <li>Variable display</li>
                        <li>Escaping vs raw</li>
                        <li>Comments and syntax</li>
                    </ul>
                </div>
                <div>
                    <h4>🎨 Layouts</h4>
                    <ul>
                        <li>Template inheritance</li>
                        <li>YIELD and SECTION</li>
                        <li>Reusable layouts</li>
                    </ul>
                </div>
                <div>
                    <h4>🧩 Components</h4>
                    <ul>
                        <li>INCLUDE directive</li>
                        <li>Component organization</li>
                        <li>Data passing</li>
                    </ul>
                </div>
                <div>
                    <h4>🔀 Directives</h4>
                    <ul>
                        <li>Conditionals</li>
                        <li>Loops</li>
                        <li>Loop variables</li>
                    </ul>
                </div>
                <div>
                    <h4>🚀 Advanced</h4>
                    <ul>
                        <li>Security directives</li>
                        <li>Custom directives</li>
                        <li>JavaScript integration</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="demo-section">
            <h3>🎯 Ready for Production:</h3>
            <div class="alert alert-success">
                <p>Congratulations! You've completed Course 3: Frontend Development with Laravel Blade.</p>
                <p>You now have the skills to:</p>
                <ul>
                    <li>Build responsive, maintainable frontend applications</li>
                    <li>Implement secure forms and user interactions</li>
                    <li>Create reusable, modular view components</li>
                    <li>Integrate JavaScript with Blade templates effectively</li>
                    <li>Follow Laravel best practices for frontend development</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
// Simple form handling
function resetForm() {
    document.getElementById('demoForm').reset();
    document.getElementById('formResult').innerHTML = '';
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    console.log('Frontend Advanced Features loaded successfully!');
});
</script>
@endsection
