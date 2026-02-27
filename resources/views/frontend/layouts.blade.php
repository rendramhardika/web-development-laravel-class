@extends('layouts.frontend')

@section('title', 'Layout System - Laravel Blade Practice')

@section('header-title', '🎨 Layout & Yield System')
@section('header-subtitle', 'Template Inheritance dengan YIELD dan SECTION')

@section('breadcrumb')
    <div class="breadcrumb">
        <a href="/frontend/dashboard">Frontend</a> / <a href="/frontend/architecture">Architecture</a> / <a href="/frontend/blade-basic">Blade Basic</a> / Layouts
    </div>
@endsection

@section('content')
    <div class="content-section">
        <h2>🎨 Layout & Yield System</h2>
        <p>Memahami template inheritance dengan YIELD, SECTION, dan ENDSECTION untuk membuat reusable layouts.</p>
        
        <div class="alert alert-info">
            <strong>🎯 Learning Objectives:</strong>
            <ul>
                <li>Template inheritance concepts</li>
                <li>YIELD untuk placeholder definition</li>
                <li>SECTION untuk content definition</li>
                <li>ENDSECTION untuk section closing</li>
                <li>Layout organization best practices</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🏗️ Template Inheritance Concept</h2>
        <div class="demo-section">
            <h3>Layout Inheritance Flow:</h3>
            <div style="text-align: center; margin: 2rem 0;">
                <div style="display: inline-block; background: #e3f2fd; padding: 1rem; border-radius: 10px; margin: 0.5rem;">
                    <strong>📄 Parent Layout</strong><br>
                    <small>app.blade.php</small><br>
                    <pre><code>YIELD content</code></pre>
                </div>
                <div style="display: inline-block; font-size: 2rem; margin: 0 1rem;">↓</div>
                <div style="display: inline-block; background: #fff3cd; padding: 1rem; border-radius: 10px; margin: 0.5rem;">
                    <strong>📝 Child View</strong><br>
                    <small>home.blade.php</small><br>
                    <pre><code>EXTEND app</code></pre><br>
                    <pre><code>SECTION content</code></pre>
                </div>
                <div style="display: inline-block; font-size: 2rem; margin: 0 1rem;">↓</div>
                <div style="display: inline-block; background: #d4edda; padding: 1rem; border-radius: 10px; margin: 0.5rem;">
                    <strong>🌐 Final HTML</strong><br>
                    <small>Rendered Page</small><br>
                    <pre><code>Complete Page</code></pre>
                </div>
            </div>
        </div>

        <div class="demo-section">
            <h3>Key Concepts:</h3>
            <div class="grid">
                <div>
                    <h4>📄 Parent Layout</h4>
                    <ul>
                        <li>Defines page structure</li>
                        <li>Contains YIELD placeholders</li>
                        <li>Reusable across pages</li>
                        <li>Usually in layouts/ folder</li>
                    </ul>
                </div>
                <div>
                    <h4>📝 Child View</h4>
                    <ul>
                        <li>Extends parent layout</li>
                        <li>Fills YIELD sections</li>
                        <li>Page-specific content</li>
                        <li>Can override defaults</li>
                    </ul>
                </div>
                <div>
                    <h4>🔗 YIELD Directive</h4>
                    <ul>
                        <li>Placeholder in parent</li>
                        <li>Optional default value</li>
                        <li>Can be multiple per layout</li>
                        <li>Named sections</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>📝 Basic Layout Structure</h2>
        <div class="demo-section">
            <h3>Parent Layout Concepts:</h3>
            <p>Parent layout mendefinisikan struktur halaman dengan placeholder YIELD directives:</p>
            <ul>
                <li><strong>HTML Structure:</strong> DOCTYPE, head, body tags</li>
                <li><strong>YIELD Placeholders:</strong> Areas untuk dynamic content</li>
                <li><strong>Default Values:</strong> Optional fallback content</li>
                <li><strong>Reusable Structure:</strong> Digunakan oleh multiple pages</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Child View Concepts:</h3>
            <p>Child view meng-extend parent layout dan mengisi YIELD sections:</p>
            <ul>
                <li><strong>EXTENDS Directive:</strong> Menentukan parent layout</li>
                <li><strong>SECTION Definitions:</strong> Content untuk setiap YIELD</li>
                <li><strong>ENDSECTION Closing:</strong> Menggunakan ENDSECTION</li>
                <li><strong>OPTIONAL Sections:</strong> Bisa di-omit untuk menggunakan default</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>This Page Implementation:</h3>
            <p>Halaman ini menggunakan template inheritance pattern:</p>
            <ul>
                <li><strong>Parent Layout:</strong> <code>layouts/frontend.blade.php</code></li>
                <li><strong>Sections Filled:</strong> title, header-title, header-subtitle, breadcrumb, content</li>
                <li><strong>Inheritance Pattern:</strong> Mengikuti best practices Laravel Blade</li>
            </ul>
            
            <div class="alert alert-success">
                <p>✅ Halaman ini menggunakan parent layout yang benar</p>
                <p>✅ Mengisi semua YIELD sections yang diperlukan</p>
                <p>✅ Mengikuti template inheritance pattern yang tepat</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🎯 Current Layout Structure</h2>
        <div class="demo-section">
            <h3>This Page Uses:</h3>
            <p>Halaman ini menggunakan parent layout yang benar:</p>
            <ul>
                <li><strong>Parent Layout:</strong> <code>layouts/frontend.blade.php</code></li>
                <li><strong>Sections Filled:</strong> title, header-title, header-subtitle, breadcrumb, content</li>
                <li><strong>Inheritance Pattern:</strong> Mengikuti best practices Laravel Blade</li>
            </ul>
            
            <div class="alert alert-success">
                <p>✅ Halaman ini menggunakan parent layout yang benar</p>
                <p>✅ Mengisi semua YIELD sections yang diperlukan</p>
                <p>✅ Mengikuti template inheritance pattern yang tepat</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🔄 Advanced Layout Features</h2>
        <div class="demo-section">
            <h3>Named Sections with Defaults:</h3>
            <p>YIELD directives dapat memiliki default values:</p>
            <ul>
                <li><strong>Default Content:</strong> Fallback jika child view tidak define section</li>
                <li><strong>Optional Sections:</strong> Child view bisa meng-override atau menggunakan default</li>
                <li><strong>Flexible Structure:</strong> Memungkinkan partial customization</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Multiple Layouts Strategy:</h3>
            <p>Gunakan layout berbeda untuk different user experiences:</p>
            <ul>
                <li><strong>Main Layout:</strong> General application structure</li>
                <li><strong>Frontend Layout:</strong> Public-facing pages dengan marketing design</li>
                <li><strong>Admin Layout:</strong> Dashboard dengan navigation kompleks</li>
                <li><strong>Auth Layout:</strong> Simple layout untuk login/register forms</li>
                <li><strong>Email Layout:</strong> HTML email templates</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🎮 Layout Section Concepts</h2>
        <div class="demo-section">
            <h3>Common Layout Sections:</h3>
            <p>Typical sections yang sering digunakan dalam layout inheritance:</p>
            <ul>
                <li><strong>Header Section:</strong> Navigation, branding, user menu</li>
                <li><strong>Content Section:</strong> Main page content area</li>
                <li><strong>Footer Section:</strong> Copyright, links, contact info</li>
                <li><strong>Sidebar Section:</strong> Additional navigation, widgets</li>
                <li><strong>Title Section:</strong> Page title and meta information</li>
            </ul>
        </div>

        <div class="demo-section">
            <h3>Section Implementation Patterns:</h3>
            <p>Best practices dalam mendefinisikan dan menggunakan sections:</p>
            <ul>
                <li><strong>Required Sections:</strong> Essential content that must be provided</li>
                <li><strong>Optional Sections:</strong> With default fallbacks</li>
                <li><strong>Conditional Sections:</strong> Based on user roles or page types</li>
                <li><strong>Nested Sections:</strong> Complex layout hierarchies</li>
            </ul>
        </div>
    </div>

    <div class="content-section">
        <h2>🛠️ Best Practices</h2>
        <div class="demo-section">
            <h3>Layout Organization Tips:</h3>
            <div class="grid">
                <div>
                    <h4>✅ Do's:</h4>
                    <ul>
                        <li>Gunakan descriptive section names</li>
                        <li>Provide default values untuk optional sections</li>
                        <li>Keep layouts focused on structure</li>
                        <li>Use semantic HTML5 elements</li>
                        <li>Include common CSS/JS in layouts</li>
                    </ul>
                </div>
                <div>
                    <h4>❌ Don'ts:</h4>
                    <ul>
                        <li>Jangan masukkan business logic di layout</li>
                        <li>Hindari hard-coded content</li>
                        <li>Jangan buat layout terlalu spesifik</li>
                        <li>Hindari nested EXTENDS yang terlalu dalam</li>
                        <li>Jangan lupa ENDSECTION</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="demo-section">
            <h3>Performance Considerations:</h3>
            <div class="alert alert-warning">
                <p><strong>Tip:</strong> Blade compiles templates ke PHP untuk performance. Layout inheritance tidak menambah runtime overhead.</p>
            </div>
        </div>
    </div>

    <div class="content-section">
        <h2>🚀 Next Steps</h2>
        <div class="demo-section">
            <p>Setelah memahami layout system, lanjutkan ke:</p>
            <ol>
                <li><strong><a href="/frontend/sections">Sections & Components</a> - Modular view organization</li>
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
    console.log('Frontend Layouts loaded successfully!');
});
</script>
@endsection