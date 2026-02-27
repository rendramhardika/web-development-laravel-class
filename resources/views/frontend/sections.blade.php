@extends('layouts.frontend')

@section('title', 'Sections & Components - Laravel Blade Practice')

@section('header-title', '🧩 Section & Include')
@section('header-subtitle', 'Modular View Organization dengan @section dan @include')

@section('breadcrumb')
    <div class="breadcrumb">
        <a href="/frontend/dashboard">Frontend</a> / <a href="/frontend/architecture">Architecture</a> / <a href="/frontend/blade-basic">Blade Basic</a> / <a href="/frontend/layouts">Layouts</a> / Sections
    </div>
@endsection

@section('content')
    <div class="content-section">
        <h2>🧩 Section & Include System</h2>
        <p>Memahami modular view organization dengan SECTION, INCLUDE, dan component-based development.</p>
        
        <div class="alert alert-info">
            <strong>🎯 Learning Objectives:</strong>
            <ul>
                <li>INCLUDE untuk partial views</li>
                <li>Component organization strategies</li>
                <li>Passing data to includes</li>
                <li>Conditional includes</li>
                <li>Reusable view components</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>📦 INCLUDE Directive</h2>
        <div class="demo-section">
            <h3>Basic INCLUDE Usage:</h3>
            <p>INCLUDE directive memungkinkan reusable partial views:</p>
            <ul>
                <li><strong>Basic Include:</strong> Include partial view tanpa data</li>
                <li><strong>Include with Data:</strong> Pass variables ke partial view</li>
                <li><strong>Multiple Data:</strong> Pass multiple variables sekaligus</li>
                <li><strong>Parent Variables:</strong> Partial views punya akses ke parent scope</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Header Component Concept:</h3>
            <p>Contoh penggunaan INCLUDE untuk header component:</p>
            <ul>
                <li><strong>Reusable Header:</strong> Header yang bisa digunakan di multiple pages</li>
                <li><strong>Dynamic Title:</strong> Title dapat di-customize per page</li>
                <li><strong>Default Values:</strong> Fallback jika data tidak provided</li>
                <li><strong>Navigation:</strong> Consistent navigation across pages</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🎯 Component Organization</h2>
        <div class="demo-section">
            <h3>Recommended Folder Structure:</h3>
            <p>Organize views dengan folder structure yang jelas:</p>
            <ul>
                <li><strong>layouts/:</strong> Parent layouts untuk template inheritance</li>
                <li><strong>components/:</strong> Reusable UI components</li>
                <li><strong>partials/:</strong> Partial views untuk specific features</li>
                <li><strong>pages/:</strong> Full page views</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Component Types:</h3>
            <div class="grid">
                <div>
                    <h4>🧩 Layout Components</h4>
                    <ul>
                        <li>Header, footer, navigation</li>
                        <li>Sidebar, breadcrumbs</li>
                        <li>Page structure elements</li>
                        <li>Reusable across pages</li>
                    </ul>
                </div>
                <div>
                    <h4>📝 Content Components</h4>
                    <ul>
                        <li>User cards, product cards</li>
                        <li>Form elements</li>
                        <li>Table layouts</li>
                        <li>Content blocks</li>
                    </ul>
                </div>
                <div>
                    <h4>🔧 Functional Components</h4>
                    <ul>
                        <li>Alert boxes, modals</li>
                        <li>Pagination, filters</li>
                        <li>Search bars</li>
                        <li>Interactive elements</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔄 Passing Data to Includes</h2>
        <div class="demo-section">
            <h3>Data Passing Methods:</h3>
            <p>Beberapa cara untuk pass data ke included views:</p>
            <ul>
                <li><strong>Direct Array:</strong> Pass data sebagai array langsung</li>
                <li><strong>With Method:</strong> Chain with() method untuk multiple variables</li>
                <li><strong>Compact Method:</strong> Use compact() untuk pass variables by name</li>
                <li><strong>Parent Scope:</strong> Included views inherit parent variables automatically</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>User Card Component Concept:</h3>
            <p>Example component dengan data passing:</p>
            <ul>
                <li><strong>User Data:</strong> Name, email, role, avatar</li>
                <li><strong>Conditional Display:</strong> Show/hide email based on parameter</li>
                <li><strong>Default Values:</strong> Fallback untuk missing data</li>
                <li><strong>Custom Classes:</strong> Dynamic CSS classes</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🎮 Component Examples</h2>
        <div class="demo-section">
            <h3>Card Component Example:</h3>
            <p>Simple card component untuk content display:</p>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 1rem;">
                    <div class="card-header" style="border-bottom: 1px solid #eee; padding-bottom: 0.5rem; margin-bottom: 0.5rem;">
                        <h4>Card Title</h4>
                    </div>
                    <div class="card-body">
                        <p>This is card content from component.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="demo-section">
            <h3>Alert Component Example:</h3>
            <p>Alert component untuk notifications:</p>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                <strong>Success!</strong> This is an alert component.
            </div>
        </div>

        <div class="demo-section">
            <h3>Form Component Example:</h3>
            <p>Form component dengan dynamic fields:</p>
            
            <h4>Output:</h4>
            <div class="alert alert-success">
                <form style="border: 1px solid #ddd; padding: 1rem; border-radius: 8px;">
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label>Name:</label>
                        <input type="text" name="name" style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 3px;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label>Email:</label>
                        <input type="email" name="email" style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 3px;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label>Password:</label>
                        <input type="password" name="password" style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 3px;">
                    </div>
                    <button type="submit" style="background: #007bff; color: white; padding: 0.5rem 1rem; border: none; border-radius: 3px;">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔍 Conditional Includes</h2>
        <div class="demo-section">
            <h3>Conditional Component Loading:</h3>
            <p>Include components berdasarkan conditions:</p>
            <ul>
                <li><strong>INCLUDEIF:</strong> Include hanya jika view exists</li>
                <li><strong>INCLUDEWHEN:</strong> Include berdasarkan boolean condition</li>
                <li><strong>INCLUDEFIRST:</strong> Include first available view dari array</li>
                <li><strong>Conditional Logic:</strong> Use IF statements untuk complex conditions</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🛠️ Advanced Include Features</h2>
        <div class="demo-section">
            <h3>View Composers & Share Concept:</h3>
            <p>Advanced features untuk data sharing across includes:</p>
            <ul>
                <li><strong>View Composers:</strong> Bind data ke specific views automatically</li>
                <li><strong>Global Share:</strong> Make data available to all views</li>
                <li><strong>Service Providers:</strong> Register composers di AppServiceProvider</li>
                <li><strong>Automatic Injection:</strong> Data tersedia tanpa manual passing</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Looping Includes Concept:</h3>
            <p>Include components dalam loop untuk dynamic lists:</p>
            <ul>
                <li><strong>User Cards:</strong> Loop through users dan include card component</li>
                <li><strong>Product Lists:</strong> Dynamic product displays</li>
                <li><strong>Data Passing:</strong> Pass current item ke each include</li>
                <li><strong>Consistent UI:</strong> Reusable component untuk consistent design</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>📊 Current Components Demo</h2>
        <div class="demo-section">
            <h3>Sample Components from Controller:</h3>
            <div class="grid">
                <div>
                    <h4>Header Component:</h4>
                    <div style="border: 1px solid #ddd; padding: 1rem; border-radius: 5px; background: #e3f2fd;">
                        <h5>{{ $components['header'] }}</h5>
                    </div>
                </div>
                <div>
                    <h4>Sidebar Component:</h4>
                    <div style="border: 1px solid #ddd; padding: 1rem; border-radius: 5px; background: #fff3cd;">
                        <h5>{{ $components['sidebar'] }}</h5>
                    </div>
                </div>
                <div>
                    <h4>Main Component:</h4>
                    <div style="border: 1px solid #ddd; padding: 1rem; border-radius: 5px; background: #d4edda;">
                        <h5>{{ $components['main'] }}</h5>
                    </div>
                </div>
                <div>
                    <h4>Footer Component:</h4>
                    <div style="border: 1px solid #ddd; padding: 1rem; border-radius: 5px; background: #f8f9fa;">
                        <h5>{{ $components['footer'] }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🚀 Next Steps</h2>
        <div class="demo-section">
            <p>Setelah memahami sections & includes, lanjutkan ke:</p>
            <ol>
                <li><strong><a href="/frontend/directives">Blade Directives</a> - Control structures</li>
                <li><strong><a href="/frontend/advanced">Advanced Features</a> - Security & custom directives</li>
            </ol>
        </div>
    </div>
@endsection

@section('javascript')
<script>
// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    console.log('Frontend Sections loaded successfully!');
});
</script>
@endsection
