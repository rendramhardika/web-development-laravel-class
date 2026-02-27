@extends('layouts.frontend')

@section('title', 'Blade Directives - Laravel Blade Practice')

@section('header-title', '🔀 Blade Directives')
@section('header-subtitle', 'Control Structures: IF, ELSEIF, ELSE, ENDIF')

@section('breadcrumb')
    <div class="breadcrumb">
        <a href="/frontend/dashboard">Frontend</a> / <a href="/frontend/architecture">Architecture</a> / <a href="/frontend/blade-basic">Blade Basic</a> / <a href="/frontend/layouts">Layouts</a> / <a href="/frontend/sections">Sections</a> / Directives
    </div>
@endsection

@section('content')
    <div class="content-section">
        <h2>🔀 Blade Directives (Control Structures)</h2>
        <p>Master control structures seperti IF, ELSEIF, ELSE, ENDIF, dan lainnya untuk logic rendering dalam template.</p>
        
        <div class="alert alert-info">
            <strong>🎯 Learning Objectives:</strong>
            <ul>
                <li>Conditional statements (IF, ELSEIF, ELSE, ENDIF)</li>
                <li>Looping structures (FOREACH, FOR, WHILE)</li>
                <li>Loop variables (FIRST, LAST, ODD, EVEN)</li>
                <li>Conditional loops (FORELSE, EMPTY)</li>
                <li>Break dan continue statements</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🔀 Conditional Directives</h2>
        <div class="demo-section">
            <h3>Basic IF Statements:</h3>
            <div class="code-block">
                <pre><code>
                    @verbatim
@if($isLoggedIn)
    &lt;p&gt;Welcome back, {{ $userName }}!&lt;/p&gt;
@else
    &lt;p&gt;Please login to continue.&lt;/p&gt;
@endif
@endverbatim
                </code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @if($isLoggedIn)
                    <p>Welcome back, User!</p>
                @else
                    <p>Please login to continue.</p>
                @endif
            </div>
        </div>

        <div class="demo-section">
            <h3>IF ELSEIF ELSE Structure:</h3>
            <div class="code-block">
                <pre><code>
@if($score >= 90)
    &lt;p&gt;Excellent! Grade A&lt;/p&gt;
@elseif($score >= 80)
    &lt;p&gt;Good! Grade B&lt;/p&gt;
@elseif($score >= 70)
    &lt;p&gt;Fair! Grade C&lt;/p&gt;
@else
    &lt;p&gt;Need improvement! Grade D&lt;/p&gt;
@endif
                </code></pre>
            </div>
            
            <h4>Output (Score: {{ $score }}):</h4>
            <div class="alert alert-success">
                @if($score >= 90)
                    <p>Excellent! Grade A</p>
                @elseif($score >= 80)
                    <p>Good! Grade B</p>
                @elseif($score >= 70)
                    <p>Fair! Grade C</p>
                @else
                    <p>Need improvement! Grade D</p>
                @endif
            </div>
        </div>

        <div class="demo-section">
            <h3>UNLESS Directive (Inverse of IF):</h3>
            <div class="code-block">
                <pre><code>
@unless($showContent)
    &lt;p&gt;Content is hidden&lt;/p&gt;
@endunless
                </code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @unless($showContent)
                    <p>Content is hidden</p>
                @endunless
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔁 Looping Directives</h2>
        <div class="demo-section">
            <h3>FOREACH Loop:</h3>
            <div class="code-block">
                <pre><code>
@foreach($users as $user)
    &lt;div class="user-item"&gt;
        &lt;strong&gt;{{ $user['name'] }}&lt;/strong&gt;
        &lt;span&gt;({{ $user['role'] }})&lt;/span&gt;
    &lt;/div&gt;
@endforeach
                </code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($users as $user)
                    <div class="user-item" style="border: 1px solid #ddd; padding: 0.5rem; margin: 0.5rem 0; border-radius: 3px;">
                        <strong>{{ $user['name'] }}</strong>
                        <span style="color: #6c757d;">({{ $user['role'] }})</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="demo-section">
            <h3>FOR Loop:</h3>
            <div class="code-block">
                <pre><code>
@for($i = 1; $i <= 5; $i++)
    &lt;div&gt;Item {{ $i }}&lt;/div&gt;
@endfor
                </code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @for($i = 1; $i <= 5; $i++)
                    <div style="border: 1px solid #ddd; padding: 0.5rem; margin: 0.5rem 0; border-radius: 3px;">Item {{ $i }}</div>
                @endfor
            </div>
        </div>

        <div class="demo-section">
            <h3>WHILE Loop:</h3>
            <div class="code-block">
                <pre><code>
@php
    $count = 0;
@endphp

@while($count < 3)
    &lt;p&gt;Count: {{ $count }}&lt;/p&gt;
    @php
        $count++;
    @endphp
@endwhile
                </code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @php
                    $count = 0;
                @endphp
                @while($count < 3)
                    <p>Count: {{ $count }}</p>
                    @php
                        $count++;
                    @endphp
                @endwhile
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎯 Loop Variables</h2>
        <div class="demo-section">
            <h3>FOREACH Loop Variables:</h3>
            <div class="code-block">
                <pre><code>
@foreach($posts as $post)
    @if($loop->first)
        &lt;h3&gt;First Post&lt;/h3&gt;
    @endif
    
    &lt;div class="post {{ $loop->odd ? 'odd' : 'even' }}"&gt;
        {{ $post }}
        @if($loop->last)
            &lt;span&gt;Last Post&lt;/span&gt;
        @endif
    &lt;/div&gt;
@endforeach
                </code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($posts as $post)
                    @if($loop->first)
                        <h3>First Post</h3>
                    @endif
                    
                    <div class="post {{ $loop->odd ? 'odd' : 'even' }}" style="border: 1px solid #ddd; padding: 0.5rem; margin: 0.5rem 0; border-radius: 3px; background: {{ $loop->odd ? '#f8f9fa' : '#e9ecef' }};">
                        {{ $post }}
                        @if($loop->last)
                            <span style="color: #007bff; font-weight: bold;"> (Last Post)</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="demo-section">
            <h3>Available Loop Variables:</h3>
            <div class="grid">
                <div>
                    <h4>Index Variables:</h4>
                    <ul>
                        <li><code>$loop->index</code> - 0-based index</li>
                        <li><code>$loop->iteration</code> - 1-based index</li>
                        <li><code>$loop->remaining</code> - Items remaining</li>
                        <li><code>$loop->count</code> - Total items</li>
                    </ul>
                </div>
                <div>
                    <h4>Boolean Variables:</h4>
                    <ul>
                        <li><code>$loop->first</code> - First iteration</li>
                        <li><code>$loop->last</code> - Last iteration</li>
                        <li><code>$loop->odd</code> - Odd iteration</li>
                        <li><code>$loop->even</code> - Even iteration</li>
                    </ul>
                </div>
                <div>
                    <h4>Parent Variables:</h4>
                    <ul>
                        <li><code>$loop->parent</code> - Parent loop</li>
                        <li><code>$loop->depth</code> - Current depth</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔄 Conditional Loops</h2>
        <div class="demo-section">
            <h3>FORELSE EMPTY Directive:</h3>
            <p>FORELSE adalah kombinasi FOREACH dengan fallback untuk empty arrays:</p>
            <ul>
                <li><strong>FORELSE:</strong> Loop through items jika ada</li>
                <li><strong>EMPTY:</strong> Fallback content jika array kosong</li>
                <li><strong>ENDFORELSE:</strong> Close the loop</li>
            </ul>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @forelse($users as $user)
                    <div style="border: 1px solid #ddd; padding: 0.5rem; margin: 0.5rem 0; border-radius: 3px;">{{ $user['name'] }}</div>
                @empty
                    <p>No users found.</p>
                @endforelse
            </div>
        </div>

        <div class="demo-section">
            <h3>Nested Loops Concept:</h3>
            <p>Loop variables support parent loop access untuk nested loops:</p>
            <ul>
                <li><strong>$loop->parent:</strong> Access parent loop variables</li>
                <li><strong>$loop->depth:</strong> Current nesting level</li>
                <li><strong>Nested Iteration:</strong> Track position dalam multiple levels</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🎮 Interactive Demo: Conditional Logic</h2>
        <div class="interactive-demo">
            <h3>Coba Conditional Logic:</h3>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" id="isLoggedIn" onchange="updateConditionalResult()">
                    User Logged In
                </label>
            </div>
            
            <div class="form-group">
                <label for="userRole">User Role:</label>
                <select id="userRole" onchange="updateRole()">
                    <option value="guest">Guest</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="userScore">Score (0-100):</label>
                <input type="number" id="userScore" min="0" max="100" value="85" onchange="updateConditionalResult()">
            </div>
            
            <h4>Live Output:</h4>
            <div id="conditionalResult" class="alert alert-info">
                <p>Adjust the controls above to see conditional logic in action...</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎮 Array Loop Examples</h2>
        <div class="demo-section">
            <h3>Users Array Loop:</h3>
            <div class="code-block">
                <pre><code>
@foreach($users as $user)
    &lt;div class="user-item"&gt;
        &lt;strong&gt;{{ $user['name'] }}&lt;/strong&gt;
        &lt;span&gt;({{ $user['role'] }})&lt;/span&gt;
    &lt;/div&gt;
@endforeach
</code/</pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($users as $user)
                    <div class="user-item" style="border: 1px solid #ddd; padding: 0.5rem; margin: 0.5rem 0; border-radius: 3px;">
                        <strong>{{ $user['name'] }}</strong>
                        <span style="color: #6c757d;">({{ $user['role'] }})</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="demo-section">
            <h3>Posts Array Loop with Loop Variables:</h3>
            <div class="code-block">
                <pre><code>
@foreach($posts as $post)
    @if($loop->first)
        &lt;h3&gt;First Post&lt;/h3&gt;
    @endif
    
    &lt;div class="post {{ $loop->odd ? 'odd' : 'even' }}"&gt;
        {{ $post }}
        @if($loop->last)
            &lt;span&gt;Last Post&lt;/span&gt;
        @endif
    &lt;/div&gt;
@endforeach
</code></pre>
            </div>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                @foreach($posts as $post)
                    @if($loop->first)
                        <h3>First Post</h3>
                    @endif
                    
                    <div class="post" style="border: 1px solid #ddd; padding: 0.5rem; margin: 0.5rem 0; border-radius: 3px; background: {{ $loop->odd ? '#f8f9fa' : '#e9ecef' }};">
                        {{ $post }}
                        @if($loop->last)
                            <span style="color: #007bff; font-weight: bold;"> (Last Post)</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🛠️ Advanced Directive Features</h2>
        <div class="demo-section">
            <h3>SWITCH Directive (PHP 8+):</h3>
            <div class="code-block">
                <pre><code>
SWITCH($userRole)
    CASE('admin')
        &lt;p&gt;Admin access granted&lt;/p&gt;
        BREAK
    CASE('user')
        &lt;p&gt;User access granted&lt;/p&gt;
        BREAK
    DEFAULT
        &lt;p&gt;Limited access&lt;/p&gt;
ENDSWITCH
</code></pre>
            </div>
        </div>

        <div class="demo-section">
            
            <h3>Custom Directives:</h3>
            <div class="code-block">
                <pre><code>

                </code></pre>
            </div>
        </div>
    </div> 

    <div class="content-section">
        <h2>🚀 Next Steps</h2>
        <div class="demo-section">
            <p>Setelah memahami Blade directives, lanjutkan ke:</p>
            <ol>
                <li><strong><a href="/frontend/advanced">Advanced Features</a> - Security & custom directives</li>
            </ol>
        </div>
    </div>
@endsection

@section('javascript')
<script>
// Simple conditional logic demo
function updateConditionalResult() {
    const isLoggedIn = document.getElementById('isLoggedIn').checked;
    const userRole = document.getElementById('userRole').value;
    const score = parseInt(document.getElementById('userScore').value) || 0;
    const result = document.getElementById('conditionalResult');
    
    let output = '';
    
    // Auth logic
    if (isLoggedIn) {
        output += `<p style="color: green;">✅ Welcome back!</p>`;
        
        // Role logic
        if (userRole === 'admin') {
            output += `<p style="color: blue;">🔐 Admin access granted</p>`;
        } else if (userRole === 'user') {
            output += `<p style="color: green;">👤 User access granted</p>`;
        } else {
            output += `<p style="color: orange;">👤 Guest access</p>`;
        }
    } else {
        output += `<p style="color: red;">❌ Please login to continue</p>`;
    }
    
    // Grade logic
    if (score >= 90) {
        output += `<p style="color: green;">🏆 Excellent! Grade A (Score: ${score})</p>`;
    } else if (score >= 80) {
        output += `<p style="color: blue;">👍 Good! Grade B (Score: ${score})</p>`;
    } else if (score >= 70) {
        output += `<p style="color: orange;">👌 Fair! Grade C (Score: ${score})</p>`;
    } else {
        output += `<p style="color: red;">📚 Need improvement! (Score: ${score})</p>`;
    }
    
    result.innerHTML = output;
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updateConditionalResult();
});
</script>
@endsection
