@extends('layouts.model')

@section('title', 'Model untuk Validasi')

@section('content')
<div class="container">
    <div class="header-section">
        <h1>✅ Model untuk Validasi</h1>
        <p class="subtitle">Centralized validation menggunakan Model untuk konsistensi dan reusability</p>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <strong>✅ Success:</strong> {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <strong>❌ Validation Errors:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="content-section">
        <h2>🎯 Keuntungan Validation di Model</h2>
        <ul>
            <li><strong>Centralized Rules:</strong> Validation rules terpusat di satu tempat</li>
            <li><strong>Reusable:</strong> Rules bisa digunakan di berbagai controller/form</li>
            <li><strong>Consistent:</strong> Semua validasi mengikuti aturan yang sama</li>
            <li><strong>Easy to Update:</strong> Update rules di satu tempat, semua terupdate</li>
            <li><strong>Testable:</strong> Mudah untuk test validation logic</li>
        </ul>
    </div>

    <div class="code-section">
        <h3>📝 Model Validation Implementation</h3>
        <pre><code>class Product extends Model
{
    // Validation Rules
    public static function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
        ];
    }

    // Validate Product Data
    public static function validateProduct($data)
    {
        $validator = validator($data, self::validationRules());
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()
            ];
        }
        
        return [
            'success' => true,
            'data' => $data
        ];
    }
}

// Usage in Controller
$result = Product::validateProduct($request->all());

if ($result['success']) {
    // Validation passed
} else {
    // Validation failed
    return back()->withErrors($result['errors']);
}</code></pre>
    </div>

    <div class="demo-section">
        <h3>🧪 Try Validation Demo</h3>
        <p>Submit form di bawah ini untuk melihat validation bekerja:</p>

        <form action="{{ route('model.validation.process') }}" method="POST" class="validation-form">
            @csrf
            
            <div class="form-group">
                <label for="name">Product Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                <small>Required, max 255 characters</small>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                <small>Optional</small>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="price">Price *</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" class="form-control" step="0.01">
                    <small>Required, numeric, min: 0</small>
                </div>

                <div class="form-group">
                    <label for="stock">Stock *</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" class="form-control">
                    <small>Required, integer, min: 0</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="category">Category *</label>
                    <select id="category" name="category" class="form-control">
                        <option value="">-- Select Category --</option>
                        <option value="Electronics" {{ old('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="Accessories" {{ old('category') == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                        <option value="Books" {{ old('category') == 'Books' ? 'selected' : '' }}>Books</option>
                        <option value="Clothing" {{ old('category') == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                    </select>
                    <small>Required</small>
                </div>

                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select id="is_active" name="is_active" class="form-control">
                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <small>Boolean</small>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Validate Product</button>
                <button type="reset" class="btn btn-secondary">Reset Form</button>
            </div>
        </form>
    </div>

    <div class="rules-section">
        <h3>📋 Validation Rules Reference</h3>
        <table class="rules-table">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Rules</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>name</code></td>
                    <td>required | string | max:255</td>
                    <td>Product name is required, must be string, max 255 chars</td>
                </tr>
                <tr>
                    <td><code>description</code></td>
                    <td>nullable | string</td>
                    <td>Description is optional, must be string if provided</td>
                </tr>
                <tr>
                    <td><code>price</code></td>
                    <td>required | numeric | min:0</td>
                    <td>Price is required, must be numeric, minimum 0</td>
                </tr>
                <tr>
                    <td><code>stock</code></td>
                    <td>required | integer | min:0</td>
                    <td>Stock is required, must be integer, minimum 0</td>
                </tr>
                <tr>
                    <td><code>category</code></td>
                    <td>required | string | max:255</td>
                    <td>Category is required, must be string, max 255 chars</td>
                </tr>
                <tr>
                    <td><code>is_active</code></td>
                    <td>boolean</td>
                    <td>Status must be boolean (true/false or 1/0)</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="navigation-footer">
        <a href="{{ route('model.business-logic') }}" class="btn btn-secondary">← Previous: Business Logic</a>
        <a href="{{ route('model.database-intro') }}" class="btn btn-primary">Next: Database Intro →</a>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .header-section {
        text-align: center;
        margin-bottom: 30px;
        padding: 30px;
        background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        color: white;
        border-radius: 10px;
    }

    .header-section h1 {
        margin: 0 0 10px 0;
        font-size: 2.2em;
    }

    .subtitle {
        font-size: 1.1em;
        opacity: 0.9;
        margin: 0;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .alert-success {
        background: #d4edda;
        border-left: 4px solid #28a745;
        color: #155724;
    }

    .alert-danger {
        background: #f8d7da;
        border-left: 4px solid #dc3545;
        color: #721c24;
    }

    .alert ul {
        margin: 10px 0 0 20px;
    }

    .content-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .content-section h2 {
        color: #333;
        margin-top: 0;
    }

    .content-section ul {
        line-height: 1.8;
    }

    .code-section {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .code-section h3 {
        margin-top: 0;
        color: #17a2b8;
    }

    .code-section pre {
        background: #2d2d2d;
        color: #f8f8f2;
        padding: 20px;
        border-radius: 5px;
        overflow-x: auto;
        margin: 0;
    }

    .code-section code {
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        line-height: 1.6;
    }

    .demo-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .demo-section h3 {
        margin-top: 0;
        color: #17a2b8;
    }

    .validation-form {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px 15px;
        border: 2px solid #dee2e6;
        border-radius: 5px;
        font-size: 1em;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #17a2b8;
    }

    .form-group small {
        display: block;
        margin-top: 5px;
        color: #6c757d;
        font-size: 0.85em;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }

    .rules-section {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .rules-section h3 {
        margin-top: 0;
        color: #17a2b8;
    }

    .rules-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .rules-table th,
    .rules-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .rules-table th {
        background: #17a2b8;
        color: white;
        font-weight: 600;
    }

    .rules-table tbody tr:hover {
        background: #f8f9fa;
    }

    .rules-table code {
        background: #f8f9fa;
        padding: 3px 8px;
        border-radius: 3px;
        color: #e83e8c;
        font-family: 'Courier New', monospace;
    }

    .navigation-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        gap: 15px;
    }

    .btn {
        display: inline-block;
        padding: 12px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }

    .btn-primary {
        background: #17a2b8;
        color: white;
    }

    .btn-primary:hover {
        background: #138496;
    }
</style>
@endsection
