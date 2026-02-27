@extends('layouts.frontend')

@section('title', 'Blade Template Basic - Laravel Blade Practice')

@section('header-title', '📝 Blade Template Basic')
@section('header-subtitle', 'Fundamental Blade Syntax & Variable Display')

@section('breadcrumb')
    <div class="breadcrumb">
        <a href="/frontend/dashboard">Frontend</a> / <a href="/frontend/architecture">Architecture</a> / Blade Basic
    </div>
@endsection

@section('content')
    <div class="content-section">
        <h2>📝 Laravel Blade Template Basic</h2>
        <p>Memahami fundamental Blade syntax, variable display, escaping, dan data passing dari controller ke view.</p>
        
        <div class="alert alert-info">
            <strong>🎯 Learning Objectives:</strong>
            <ul>
                <li>Basic Blade syntax dan structure</li>
                <li>Variable display dengan tanda kurung kurawal</li>
                <li>Escaping vs raw output</li>
                <li>Comments dan whitespace control</li>
                <li>Data passing dari controller</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🔤 Variable Display</h2>
        <div class="demo-section">
            <h3>Basic Variable Display:</h3>
            <div class="code-block">
{{-- Blade Comment: This is a comment --}}
&lt;h1&gt;Hello, {{ $name }}!&lt;/h1&gt;
&lt;p&gt;You are {{ $age }} years old.&lt;/p&gt;
&lt;p&gt;Email: {{ $email }}&lt;/p&gt;
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                <h1>Hello, {{ $name }}!</h1>
                <p>You are {{ $age }} years old.</p>
                <p>Email: {{ $email }}</p>
            </div>
        </div>

        <div class="demo-section">
            <h3>Default Values with ?? Operator:</h3>
            <div class="code-block">
&lt;p&gt;Welcome, {{ $username ?? 'Guest' }}!&lt;/p&gt;
&lt;p&gt;Status: {{ $status ?? 'Active' }}&lt;/p&gt;
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                <p>Welcome, {{ $username ?? 'Guest' }}!</p>
                <p>Status: {{ $status ?? 'Active' }}</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔒 Escaping vs Raw Output</h2>
        <div class="demo-section">
            <h3>Escaped Output (Safe - Default):</h3>
            <div class="code-block">
&lt;p&gt;Escaped: {{ '&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;' }}&lt;/p&gt;
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                <p>Escaped: {{ '&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;' }}</p>
            </div>
        </div>

        <div class="demo-section">
            <h3>Raw Output (Use with Caution):</h3>
            <div class="code-block">
&lt;p&gt;Raw: {!! '&lt;strong&gt;Bold Text&lt;/strong&gt;' !!}&lt;/p&gt;
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-warning">
                <p>Raw: {!! '&lt;strong&gt;Bold Text&lt;/strong&gt;' !!}</p>
            </div>
            
            <div class="alert alert-danger">
                <strong>⚠️ Security Warning:</strong> Gunakan tanda kurung kurawal dan dua tanda seru hanya untuk trusted content!
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>📝 Blade Comments</h2>
        <div class="demo-section">
            <h3>Comment Syntax:</h3>
            <div class="code-block">
{{-- This is a Blade comment (won't be rendered) --}}
{{-- 
    This is a multi-line comment
    that won't appear in HTML output
 --}}

&lt;!-- This is an HTML comment (will be rendered) --&gt;
            </div>
            
            <p>Blade comments {{ '--' }} tidak akan muncul di HTML output, sedangkan HTML comments akan muncul.</p>
        </div>
    </div>

    <div class="content-section">
        <h2>🔄 Displaying Arrays and Objects</h2>
        <div class="demo-section">
            <h3>Array Display:</h3>
            <div class="code-block">
@foreach($users as $user)
    &lt;p&gt;User: {{ $user }}&lt;/p&gt;
@endforeach
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($users as $user)
                    <p>User: {{ $user }}</p>
                @endforeach
            </div>
        </div>

        <div class="demo-section">
            <h3>Object Property Access:</h3>
            <div class="code-block">
                <pre>
@foreach($products as $product)
    &lt;div&gt;
        &lt;h3&gt;{{ $product['name'] }}&lt;/h3&gt;
        &lt;p&gt;Price: Rp {{ number_format($product['price'], 0, ',', '.') }}&lt;/p&gt;
    &lt;/div&gt;
@endforeach
</pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($products as $product)
                    <div style="border: 1px solid #ddd; padding: 1rem; margin: 0.5rem 0; border-radius: 5px;">
                        <h3>{{ $product['name'] }}</h3>
                        <p>Price: Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎮 Interactive Demo: Live Variable Display</h2>
        <div class="interactive-demo">
            <h3>Coba Live Variable Display:</h3>
            <div class="form-group">
                <label for="nameInput">Masukkan Nama:</label>
                <input type="text" id="nameInput" placeholder="Masukkan nama" onkeyup="updateName()">
            </div>
            <div class="form-group">
                <label for="emailInput">Masukkan Email:</label>
                <input type="email" id="emailInput" placeholder="email@example.com" onkeyup="updateEmail()">
            </div>
            <div class="form-group">
                <label for="ageInput">Umur:</label>
                <input type="number" id="ageInput" placeholder="25" min="1" max="100" onkeyup="updateAge()">
            </div>
            
            <h4>Live Output (Blade-style):</h4>
            <div class="alert alert-info">
                <h3>Hello, <span id="liveName">{{ $name ?? 'Guest' }}</span>!</h3>
                <p>Email: <span id="liveEmail">{{ $email ?? 'Not provided' }}</span></p>
                <p>Age: <span id="liveAge">{{ $age ?? 'Not specified' }}</span></p>
                <p>Status: <span id="liveStatus">{{ $age >= 18 ? 'Adult' : 'Minor' }}</span></p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🛠️ Blade Verbatim Directive</h2>
        <div class="demo-section">
            <h3>When you need to display JavaScript code:</h3>
            <div class="code-block">
@verbatim
    &lt;script&gt;
        let name = "{{ $name }}";
        console.log("Hello, " + name);
    &lt;/script&gt;
@endverbatim
            </div>
            
            <p>Gunakan @verbatim untuk mencegah Blade meng-interpret JavaScript blade syntax.</p>
        </div>
    </div>

    <div class="content-section">
        <h2>📊 Data from Controller</h2>
        <div class="demo-section">
            <h3>Current Data from Controller:</h3>
            <div class="code-block">
            <pre><code class="language-php">
// Controller Data:
$data = [
    'name' => '{{ $name }}',
    'age' => {{ $age }},
    'email' => '{{ $email }}',
    'isLoggedIn' => {{ $isLoggedIn ? 'true' : 'false' }},
    'users' => {{ json_encode($users) }},
    'products' => {{ json_encode(array_column($products, 'name')) }}
];
            </code></pre>
            </div>
            
            <div class="alert alert-info">
                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Age:</strong> {{ $age }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Logged In:</strong> {{ $isLoggedIn ? 'Yes' : 'No' }}</p>
                <p><strong>Users Count:</strong> {{ count($users) }}</p>
                <p><strong>Products Count:</strong> {{ count($products) }}</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🚀 Next Steps</h2>
        <div class="demo-section">
            <p>Setelah memahami Blade basic, Anda siap untuk:</p>
            <ol>
                <li><strong><a href="/frontend/layouts">Layout System</a> - Template inheritance dengan YIELD</li>
                <li><strong><a href="/frontend/sections">Sections & Components</a> - Modular view organization</li>
                <li><strong><a href="/frontend/directives">Blade Directives</a> - Control structures</li>
                <li><strong><a href="/frontend/advanced">Advanced Features</a> - Security & custom directives</li>
            </ol>
        </div>
    </div>
@endsection

@section('javascript')
<script>
function updateName() {
    const name = document.getElementById('nameInput').value;
    document.getElementById('liveName').textContent = name || 'Guest';
    updateStatus();
}

function updateEmail() {
    const email = document.getElementById('emailInput').value;
    document.getElementById('liveEmail').textContent = email || 'Not provided';
}

function updateAge() {
    const age = document.getElementById('ageInput').value;
    document.getElementById('liveAge').textContent = age || 'Not specified';
    updateStatus();
}

function updateStatus() {
    const age = document.getElementById('ageInput').value;
    const status = document.getElementById('liveStatus');
    status.textContent = age && age >= 18 ? 'Adult' : 'Minor';
    
    // Change color based on status
    if (age && age >= 18) {
        status.style.color = '#28a745';
    } else if (age) {
        status.style.color = '#ffc107';
    } else {
        status.style.color = '#6c757d';
    }
}

// Initialize with default values
document.addEventListener('DOMContentLoaded', function() {
    updateName();
    updateEmail();
    updateAge();
});
</script>
@endsection
