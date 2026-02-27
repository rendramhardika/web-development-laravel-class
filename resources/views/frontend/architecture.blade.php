@extends('layouts.frontend')

@section('title', 'Frontend Architecture - Laravel Blade Practice')

@section('header-title', '🏗️ Arsitektur Frontend MVC')
@section('header-subtitle', 'Memahami Posisi View dalam MVC Pattern')

@section('breadcrumb')
    <div class="breadcrumb">
        <a href="/frontend/dashboard">Frontend</a> / Architecture
    </div>
@endsection

@section('content')
    <div class="content-section">
        <h2>🏗️ Arsitektur Frontend dalam MVC Pattern</h2>
        <p>Memahami peran penting View (Frontend) dalam arsitektur Model-View-Controller dan bagaimana Laravel Blade Template memfasilitasi separation of concerns.</p>
        
        <div class="alert alert-info">
            <strong>🎯 Learning Objectives:</strong>
            <ul>
                <li>Memahami posisi View dalam MVC pattern</li>
                <li>Separation of concerns antara logic dan presentation</li>
                <li>Peran Blade Template dalam arsitektur Laravel</li>
                <li>Best practices dalam frontend organization</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🔄 MVC Pattern Overview</h2>
        <div class="demo-section">
            <h3>Model-View-Controller Flow:</h3>
            <div style="text-align: center; margin: 2rem 0;">
                <div style="display: inline-block; background: #e3f2fd; padding: 1rem; border-radius: 10px; margin: 0.5rem;">
                    <strong>📊 Model</strong><br>
                    <small>Data & Business Logic</small>
                </div>
                <div style="display: inline-block; font-size: 2rem; margin: 0 1rem;">→</div>
                <div style="display: inline-block; background: #fff3cd; padding: 1rem; border-radius: 10px; margin: 0.5rem;">
                    <strong>🎮 Controller</strong><br>
                    <small>Request Handling & Logic</small>
                </div>
                <div style="display: inline-block; font-size: 2rem; margin: 0 1rem;">→</div>
                <div style="display: inline-block; background: #d4edda; padding: 1rem; border-radius: 10px; margin: 0.5rem;">
                    <strong>🎨 View</strong><br>
                    <small>Presentation & UI</small>
                </div>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <h3>📊 Model</h3>
                <p><strong>Responsibility:</strong> Data management dan business logic</p>
                <ul>
                    <li>Database interactions</li>
                    <li>Data validation</li>
                    <li>Business rules</li>
                    <li>Relationships</li>
                </ul>
                <div class="code-block">
                    <pre><code class="language-php">
                    @verbatim
// Example: User Model
class User extends Model {
    protected $fillable = ['name', 'email'];
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
@endverbatim
                    </code></pre>
                </div>
            </div>

            <div class="card">
                <h3>🎮 Controller</h3>
                <p><strong>Responsibility:</strong> Request handling dan coordination</p>
                <ul>
                    <li>Receive HTTP requests</li>
                    <li>Call Model methods</li>
                    <li>Prepare data for View</li>
                    <li>Return responses</li>
                </ul>
                <div class="code-block">
                    <pre><code class="language-php">
                    @verbatim
// Example: Controller
public function index() {
    $users = User::all();
    return view('users.index', ['users' => $users]);
}
@endverbatim
                    </code></pre>
                </div>
            </div>

            <div class="card">
                <h3>🎨 View</h3>
                <p><strong>Responsibility:</strong> Presentation dan user interface</p>
                <ul>
                    <li>Display data</li>
                    <li>User interactions</li>
                    <li>HTML/CSS/JS</li>
                    <li>Template logic</li>
                </ul>
                <div class="code-block">
                    <pre><code class="language-php">
                    @verbatim
// Example: Blade View
@foreach($users as $user)
    &lt;div&gt;{{ $user->name }}&lt;/div&gt;
@endforeach
@endverbatim
                    </code></pre>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎯 Peran View dalam Laravel</h2>
        <div class="demo-section">
            <h3>View Responsibilities:</h3>
            <div class="grid">
                <div>
                    <h4>📝 Presentation Logic</h4>
                    <ul>
                        <li>Display data from Controller</li>
                        <li>Format output untuk user</li>
                        <li>Handle conditional display</li>
                        <li>Loop dan iteration</li>
                    </ul>
                </div>
                <div>
                    <h4>🎨 User Interface</h4>
                    <ul>
                        <li>HTML structure</li>
                        <li>CSS styling</li>
                        <li>JavaScript interactions</li>
                        <li>Responsive design</li>
                    </ul>
                </div>
                <div>
                    <h4>🔧 Template Features</h4>
                    <ul>
                        <li>Template inheritance</li>
                        <li>Component organization</li>
                        <li>Data escaping</li>
                        <li>Form helpers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔍 Laravel Blade Template Engine</h2>
        <div class="demo-section">
            <h3>Why Blade?</h3>
            <div class="alert alert-success">
                <p>Blade adalah powerful template engine yang menyediakan:</p>
                <ul>
                    <li><strong>Clean Syntax</strong> - Simple dan readable</li>
                    <li><strong>Template Inheritance</strong> - Reusable layouts</li>
                    <li><strong>Security</strong> - Auto escaping untuk XSS protection</li>
                    <li><strong>Performance</strong> - Compiled ke PHP untuk speed</li>
                    <li><strong>Extensibility</strong> - Custom directives</li>
                </ul>
            </div>
        </div>

        <div class="demo-section">
            <h3>Blade vs Plain PHP:</h3>
            <div class="grid">
                <div>
                    <h4>❌ Plain PHP (Messy):</h4>
                    <div class="code-block">
                        <pre><code class="language-php">
@verbatim
&lt;?php if ($user): ?&gt;
    &lt;div class="user"&gt;
        &lt;h3&gt;&lt;?php echo htmlspecialchars($user->name); ?&gt;&lt;/h3&gt;
        &lt;?php if ($user->isAdmin): ?&gt;
            &lt;span&gt;Admin&lt;/span&gt;
        &lt;?php endif; ?&gt;
    &lt;/div&gt;
&lt;?php endif; ?&gt;
@endverbatim
                        </code></pre>
                    </div>
                </div>
                <div>
                    <h4>✅ Blade (Clean):</h4>
                    <div class="code-block">
                        <pre><code class="language-php">
@verbatim
@if($user)
    &lt;div class="user"&gt;
        &lt;h3&gt;{{ $user->name }}&lt;/h3&gt;
        @if($user->isAdmin)
            &lt;span&gt;Admin&lt;/span&gt;
        @endif
    &lt;/div&gt;
@endif
@endverbatim
                        </code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>📁 File Organization Best Practices</h2>
        <div class="demo-section">
            <h3>Recommended Structure:</h3>
            <div class="code-block">
                <pre><code class="language-text">
resources/views/
├── layouts/
│   ├── app.blade.php          # Main layout
│   ├── frontend.blade.php      # Frontend layout
│   └── admin.blade.php         # Admin layout
├── components/
│   ├── header.blade.php        # Header component
│   ├── footer.blade.php        # Footer component
│   └── sidebar.blade.php       # Sidebar component
├── frontend/
│   ├── dashboard.blade.php     # Frontend pages
│   ├── profile.blade.php
│   └── settings.blade.php
├── admin/
│   ├── dashboard.blade.php     # Admin pages
│   └── users.blade.php
└── partials/
    ├── forms/
    │   └── login.blade.php      # Form partials
    └── tables/
        └── users.blade.php      # Table partials
                </code></pre>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎮 Interactive Demo: MVC Flow</h2>
        <div class="interactive-demo">
            <h3>Simulasi MVC Request Flow:</h3>
            <div class="form-group">
                <label>Pilih Action:</label>
                <select id="mvcAction" onchange="showMVCFlow(this.value)">
                    <option value="">Pilih action...</option>
                    <option value="list-users">List Users</option>
                    <option value="create-user">Create User</option>
                    <option value="show-user">Show User Detail</option>
                </select>
            </div>
            <div id="mvcResult">
                <p>Pilih action untuk melihat flow MVC...</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🚀 Next Steps</h2>
        <div class="demo-section">
            <p>Setelah memahami arsitektur frontend MVC, Anda siap untuk:</p>
            <ol>
                <li><strong><a href="/frontend/blade-basic">Blade Template Basic</a> - Learn fundamental syntax</li>
                <li><strong><a href="/frontend/layouts">Layout System</a> - Master template inheritance</li>
                <li><strong><a href="/frontend/sections">Sections & Components</a> - Build modular views</li>
                <li><strong><a href="/frontend/directives">Blade Directives</a> - Implement control structures</li>
            </ol>
        </div>
    </div>
@endsection

@section('javascript')
<script>
function showMVCFlow(action) {
    const result = document.getElementById('mvcResult');
    
    const flows = {
        'list-users': `
            <div class="alert alert-info">
                <h4>🔄 MVC Flow: List Users</h4>
                <ol>
                    <li><strong>Request:</strong> GET /users</li>
                    <li><strong>Route:</strong> UserController@index</li>
                    <li><strong>Controller:</strong>@verbatim $users = User::all(); @endverbatim</li>
                    <li><strong>View:</strong>@verbatim return view('users.index', ['users' => $users]); @endverbatim</li>
                    <li><strong>Blade:</strong>@verbatim @foreach($users as $user) ... @endforeach @endverbatim</li>
                    <li><strong>Response:</strong> HTML page dengan user list</li>
                </ol>
            </div>
        `,
        'create-user': `
            <div class="alert alert-success">
                <h4>🔄 MVC Flow: Create User</h4>
                <ol>
                    <li><strong>Request:</strong> GET /users/create (form) atau POST /users (submit)</li>
                    <li><strong>Route:</strong> UserController@create atau UserController@store</li>
                    <li><strong>Controller:</strong>@verbatim return view('users.create') atau User::create($data); @endverbatim</li>
                    <li><strong>View:</strong>@verbatim Form dengan @csrf dan @method('POST') @endverbatim</li>
                    <li><strong>Blade:</strong>@verbatim Form fields dengan validation errors @endverbatim</li>
                    <li><strong>Response:</strong>@verbatim Form atau redirect dengan success message @endverbatim</li>
                </ol>
            </div>
        `,
        'show-user': `
            <div class="alert alert-warning">
                <h4>🔄 MVC Flow: Show User Detail</h4>
                <ol>
                    <li><strong>Request:</strong> GET /users/{id}</li>
                    <li><strong>Route:</strong> UserController@show dengan parameter</li>
                    <li><strong>Controller:</strong>@verbatim $user = User::find($id); @endverbatim</li>
                    <li><strong>View:</strong>@verbatim return view('users.show', ['user' => $user]); @endverbatim</li>
                    <li><strong>Blade:</strong>@verbatim {{ $user->name }}, {{ $user->email }} @endverbatim</li>
                    <li><strong>Response:</strong> HTML page dengan user detail</li>
                </ol>
            </div>
        `
    };
    
    if (action && flows[action]) {
        result.innerHTML = flows[action];
    } else {
        result.innerHTML = '<p>Pilih action untuk melihat flow MVC...</p>';
    }
}
</script>
@endsection
