# 📚 Laravel Web Programming - MVC Practice Repository

> Repository ini dibuat untuk mata kuliah **Pemrograman Web Lanjutan** dengan fokus pada **MVC Pattern**, khususnya **Controller** dalam framework Laravel.

## 📖 Informasi Mata Kuliah

- **Mata Kuliah:** Pemrograman Web Lanjutan
- **Kode Mata Kuliah:** TIF1203
- **Total SKS:** 3
- **Kelas:** C

## 🎯 Tujuan Pembelajaran

Repository ini dirancang untuk membantu mahasiswa memahami:
- **MVC Pattern** dalam Laravel
- **Controller** sebagai jembatan antara user input dan application logic
- **Berbagai metode input handling** dalam web development
- **Best practices** dalam pengembangan aplikasi web

## 🏗️ Struktur Project

```
laravel-web-programming/
├── app/
│   ├── Http/Controllers/
│   │   ├── WebProgrammingController.php      # Course 1: Basic MVC
│   │   ├── DataHandlingController.php        # Course 2: Controller-MVC
│   │   ├── FrontendController.php            # Course 3: Frontend Blade
│   │   └── ModelController.php               # Course 4: Model MVC
│   └── Models/
│       └── Product.php                       # Course 4: Product model
├── database/
│   ├── migrations/
│   │   └── 2026_03_12_015941_create_products_table.php
│   └── seeders/
│       └── ProductSeeder.php                 # Course 4: Sample data
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── frontend.blade.php            # Frontend layout
│   │   │   └── model.blade.php               # Model course layout
│   │   ├── model/                            # Course 4 views
│   │   │   ├── dashboard.blade.php           # Model dashboard
│   │   │   ├── without-model.blade.php       # Anti-pattern demo
│   │   │   ├── business-logic.blade.php      # Business logic
│   │   │   ├── validation.blade.php          # Validation
│   │   │   ├── database-intro.blade.php      # DB intro
│   │   │   ├── database-setup.blade.php      # DB setup
│   │   │   ├── raw-query.blade.php           # Raw SQL
│   │   │   ├── query-builder.blade.php       # Query Builder
│   │   │   └── eloquent-orm.blade.php        # Eloquent ORM
│   │   ├── frontend/                         # Course 3 views
│   │   │   ├── dashboard.blade.php           # Frontend dashboard
│   │   │   ├── architecture.blade.php        # MVC architecture
│   │   │   ├── blade-basic.blade.php         # Blade basics
│   │   │   ├── layouts.blade.php             # Layout system
│   │   │   ├── sections.blade.php            # Sections & components
│   │   │   ├── directives.blade.php          # Blade directives
│   │   │   └── advanced.blade.php            # Advanced features
│   │   ├── practice/                         # Course 2 views
│   │   │   ├── dashboard.blade.php           # Practice dashboard
│   │   │   ├── query-*.blade.php             # Query parameter practice
│   │   │   ├── path-*.blade.php              # Path variable practice
│   │   │   ├── body-*.blade.php              # Request body practice
│   │   │   ├── upload-*.blade.php            # File upload practice
│   │   │   ├── headers-result.blade.php      # Headers & cookies
│   │   │   └── complex-*.blade.php           # Mixed methods
│   │   ├── web-programming.blade.php         # Course 1: Intro
│   │   ├── contact-form.blade.php            # Course 1: Form
│   │   └── contact-success.blade.php         # Course 1: Success
│   └── slides/
│       └── model-mvc.md                      # Course 4: Slide materi
└── routes/
    └── web.php                               # All routes
```

## 📋 Materi 

### 🟢 Course 1: `introduce-laravel` - Basic MVC Pattern
**Controller:** `WebProgrammingController.php`

**🎯 Fokus Pembelajaran:** Konsep dasar MVC dan form handling sederhana

**📁 File yang Berkaitan:**
- `app/Http/Controllers/WebProgrammingController.php`
- `resources/views/web-programming.blade.php`
- `resources/views/contact-form.blade.php`
- `resources/views/contact-success.blade.php`

**🛣️ Routes:**
- `GET /web-programming` - Halaman intro web programming
- `GET /contacts` - Form kontak
- `POST /contacts` - Submit form

**📚 Materi Detail:**

#### **1. Web Programming Introduction**
- **URL:** `http://localhost:8000/web-programming`
- **View:** `web-programming.blade.php`
- **Controller Method:** `index()`
- **Learning:** Konsep dasar MVC pattern
- **Content:** Penjelasan Model-View-Controller, Laravel basics

#### **2. Contact Form Handling**
- **URL:** `http://localhost:8000/contacts`
- **View:** `contact-form.blade.php`
- **Controller Method:** `showContactForm()`
- **Learning:** Form creation, validation, CSRF protection
- **Fields:** Name, Email, Subject, Message

#### **3. Form Submission Processing**
- **URL:** `POST http://localhost:8000/contacts`
- **View:** `contact-success.blade.php`
- **Controller Method:** `storeContact()`
- **Learning:** Request validation, data processing, redirect handling
- **Features:** Required validation, email format, error messages

**🎯 Learning Outcomes Course 1:**
- ✅ Memahami konsep MVC pattern
- ✅ Membuat controller sederhana
- ✅ Handle form submission
- ✅ Implement basic validation
- ✅ Menggunakan Blade templating
- ✅ CSRF protection implementation

---

### 🔵 Course 2: `controller-mvc` - Advanced Input Handling
**Controller:** `DataHandlingController.php`

**🎯 Fokus Pembelajaran:** Controller pada MVC. 6 metode input handling yang berbeda dalam web development

**📁 File yang Berkaitan:**
- `app/Http/Controllers/DataHandlingController.php`
- `resources/views/practice/dashboard.blade.php`
- `resources/views/practice/query-*.blade.php`
- `resources/views/practice/path-*.blade.php`
- `resources/views/practice/body-*.blade.php`
- `resources/views/practice/upload-*.blade.php`
- `resources/views/practice/headers-result.blade.php`
- `resources/views/practice/complex-*.blade.php`

**🛣️ Routes:**
- `GET /practice/dashboard` - Dashboard navigasi
- `GET /practice/query-form` - Form query parameters
- `GET /practice/search` - Process query parameters
- `GET /practice/path-form` - Form path variables
- `GET /practice/users/{userId}/profile/{section?}` - Process path variables
- `GET /practice/body-form` - Form request body
- `POST /practice/process-form` - Process request body
- `POST /practice/api/products` - JSON API endpoint
- `GET /practice/upload-form` - Form file upload
- `POST /practice/upload/avatar` - Single file upload
- `POST /practice/upload/multiple` - Multiple file upload
- `GET /practice/analyze-request` - Headers & cookies analysis
- `GET /practice/complex-form` - Complex form
- `POST /practice/forms/{formId}/submit` - Mixed methods processing

**📚 Materi Detail:**

#### **1. Dashboard Navigasi**
- **URL:** `http://localhost:8000/practice/dashboard`
- **View:** `dashboard.blade.php`
- **Controller Method:** `dashboard()`
- **Learning:** Central navigation untuk semua practice
- **Features:** Links ke semua 6 metode input

#### **2. Query Parameter Practice** 🔍
- **Form URL:** `http://localhost:8000/practice/query-form`
- **Process URL:** `http://localhost:8000/practice/search`
- **Views:** `query-form.blade.php`, `query-result.blade.php`
- **Controller Methods:** `searchForm()`, `searchProducts()`
- **Learning:** URL-based filtering, search functionality
- **Example:** `?name=Laptop&category=electronics&sort=name`
- **Features:** Case-insensitive search, multiple filters, sorting

#### **3. Path Variable Practice** 🛤️
- **Form URL:** `http://localhost:8000/practice/path-form`
- **Process URL:** `http://localhost:8000/practice/users/123/profile/overview`
- **Views:** `path-form.blade.php`, `path-result.blade.php`
- **Controller Methods:** `userForm()`, `getUserProfile()`, `getCategoryProducts()`
- **Learning:** RESTful routing, resource identification
- **Features:** Required parameters, optional parameters, URL segments

#### **4. Request Body Practice** 📝
- **Form URL:** `http://localhost:8000/practice/body-form`
- **Process URLs:** `POST /practice/process-form`, `POST /practice/api/products`
- **Views:** `body-form.blade.php`, `body-result.blade.php`
- **Controller Methods:** `formForm()`, `processFormData()`, `createProductApi()`
- **Learning:** Form submission, JSON API, array handling
- **Features:** Form validation, JSON response, API endpoints

#### **5. File Upload Practice** 📁
- **Form URL:** `http://localhost:8000/practice/upload-form`
- **Process URLs:** `POST /practice/upload/avatar`, `POST /practice/upload/multiple`
- **Views:** `upload-form.blade.php`, `upload-result.blade.php`, `multi-upload-result.blade.php`
- **Controller Methods:** `uploadForm()`, `uploadAvatar()`, `uploadMultipleFiles()`
- **Learning:** File handling, validation, security
- **Features:** Single upload, multiple upload, file validation, preview

#### **6. Headers & Cookies Practice** 🔐
- **URL:** `http://localhost:8000/practice/analyze-request`
- **View:** `headers-result.blade.php`
- **Controller Method:** `analyzeRequest()`
- **Learning:** HTTP headers analysis, cookie management
- **Features:** Browser detection, request metadata, session analysis

#### **7. Mixed Methods Practice** 🔄
- **Form URL:** `http://localhost:8000/practice/complex-form`
- **Process URL:** `POST /practice/forms/{formId}/submit`
- **Views:** `complex-form.blade.php`, `complex-result.blade.php`
- **Controller Methods:** `complexFormForm()`, `complexFormHandling()`
- **Learning:** Combining all input methods
- **Features:** Complex form, data aggregation, advanced validation

**🎯 Learning Outcomes Course 2:**
- ✅ Handle 6 metode input berbeda
- ✅ Implement complex validation
- ✅ Build RESTful APIs
- ✅ Handle file uploads securely
- ✅ Analyze HTTP requests
- ✅ Combine multiple input methods
- ✅ Advanced error handling
- ✅ Security best practices

---

### 🟣 Course 3: `frontend-blade` - Laravel Blade Template Engine
**Controller:** `FrontendController.php`

**🎯 Fokus Pembelajaran:** View pada MVC. Blade templating engine untuk frontend development

**📁 File yang Berkaitan:**
- `app/Http/Controllers/FrontendController.php`
- `resources/views/layouts/frontend.blade.php`
- `resources/views/frontend/dashboard.blade.php`
- `resources/views/frontend/architecture.blade.php`
- `resources/views/frontend/blade-basic.blade.php`
- `resources/views/frontend/layouts.blade.php`
- `resources/views/frontend/sections.blade.php`
- `resources/views/frontend/directives.blade.php`
- `resources/views/frontend/advanced.blade.php`

**🛣️ Routes:**
- `GET /frontend/dashboard` - Dashboard navigasi frontend
- `GET /frontend/architecture` - MVC Architecture overview
- `GET /frontend/blade-basic` - Blade syntax basics
- `GET /frontend/layouts` - Layout system & template inheritance
- `GET /frontend/sections` - Sections & components
- `GET /frontend/directives` - Blade directives & control structures
- `GET /frontend/advanced` - Advanced Blade features

**📚 Materi Detail:**

#### **1. Frontend Dashboard**
- **URL:** `http://localhost:8000/frontend/dashboard`
- **View:** `dashboard.blade.php`
- **Controller Method:** `dashboard()`
- **Learning:** Central navigation untuk semua materi frontend
- **Features:** Course overview, learning path, quick access links

#### **2. MVC Architecture** 🏗️
- **URL:** `http://localhost:8000/frontend/architecture`
- **View:** `architecture.blade.php`
- **Controller Method:** `architecture()`
- **Learning:** Understanding MVC pattern, Laravel architecture
- **Topics:** Model-View-Controller separation, data flow, best practices
- **Features:** Visual diagrams, code examples, practical demonstrations

#### **3. Blade Basic Syntax** 📝
- **URL:** `http://localhost:8000/frontend/blade-basic`
- **View:** `blade-basic.blade.php`
- **Controller Method:** `bladeBasic()`
- **Learning:** Blade templating fundamentals
- **Topics:** 
  - Variable display `{{ $variable }}`
  - Escaped vs unescaped output
  - Comments `{{-- comment --}}`
  - PHP code blocks `@php @endphp`
  - Raw PHP `<?php ?>`
- **Features:** Live examples, syntax comparison, best practices

#### **4. Layout System** 🎨
- **URL:** `http://localhost:8000/frontend/layouts`
- **View:** `layouts.blade.php`
- **Controller Method:** `layouts()`
- **Learning:** Template inheritance, reusable layouts
- **Topics:**
  - `@extends` - Inherit parent layout
  - `@yield` - Define content sections
  - `@section` / `@endsection` - Fill sections
  - `@parent` - Include parent content
  - Multiple layouts strategy
- **Features:** Layout examples, section demonstrations, best practices

#### **5. Sections & Components** 🧩
- **URL:** `http://localhost:8000/frontend/sections`
- **View:** `sections.blade.php`
- **Controller Method:** `sections()`
- **Learning:** Modular view organization
- **Topics:**
  - `@include` - Include partial views
  - Component organization
  - Data passing to includes
  - Conditional includes (`@includeIf`, `@includeWhen`)
  - View composers & global data sharing
- **Features:** Component examples, folder structure, reusable patterns

#### **6. Blade Directives** 🔀
- **URL:** `http://localhost:8000/frontend/directives`
- **View:** `directives.blade.php`
- **Controller Method:** `directives()`
- **Learning:** Control structures & loops
- **Topics:**
  - Conditionals: `@if`, `@elseif`, `@else`, `@unless`
  - Loops: `@foreach`, `@for`, `@while`, `@forelse`
  - Loop variables: `$loop->first`, `$loop->last`, `$loop->index`
  - Switch statements: `@switch`, `@case`, `@break`, `@default`
  - Empty checks: `@empty`, `@isset`
- **Features:** Interactive demos, live output, loop variable examples

#### **7. Advanced Blade Features** 🚀
- **URL:** `http://localhost:8000/frontend/advanced`
- **View:** `advanced.blade.php`
- **Controller Method:** `advanced()`
- **Learning:** Security & advanced techniques
- **Topics:**
  - Authentication: `@auth`, `@guest`
  - Security: `@csrf`, `@method`
  - Custom directives creation
  - JavaScript integration with `@verbatim`
  - JSON data passing to JavaScript
  - Form handling best practices
- **Features:** Security examples, custom directive demos, JS integration

**🎯 Learning Outcomes Course 3:**
- ✅ Master Blade templating syntax
- ✅ Build reusable layout systems
- ✅ Create modular components
- ✅ Implement control structures
- ✅ Handle authentication & security
- ✅ Integrate JavaScript with Blade
- ✅ Follow Blade best practices
- ✅ Build maintainable frontend code

---

### 🟠 Course 4: `model-mvc` - Model pada Arsitektur MVC
**Controller:** `ModelController.php`  
**Model:** `Product.php`

**🎯 Fokus Pembelajaran:** Model pada MVC. Database interaction, business logic, dan validation menggunakan Model

**📁 File yang Berkaitan:**
- `app/Http/Controllers/ModelController.php`
- `app/Models/Product.php`
- `database/migrations/2026_03_12_015941_create_products_table.php`
- `database/seeders/ProductSeeder.php`
- `resources/views/layouts/model.blade.php`
- `resources/views/model/dashboard.blade.php`
- `resources/views/model/without-model.blade.php`
- `resources/views/model/business-logic.blade.php`
- `resources/views/model/validation.blade.php`
- `resources/views/model/database-intro.blade.php`
- `resources/views/model/database-setup.blade.php`
- `resources/views/model/raw-query.blade.php`
- `resources/views/model/query-builder.blade.php`
- `resources/views/model/eloquent-orm.blade.php`
- `resources/slides/model-mvc.md`

**🛣️ Routes:**
- `GET /model/dashboard` - Dashboard navigasi Model MVC
- `GET /model/without-model` - Controller tanpa Model (anti-pattern)
- `GET /model/business-logic` - Model untuk business logic
- `GET /model/validation` - Model untuk validation
- `POST /model/validation` - Process validation
- `GET /model/database-intro` - Overview database interaction
- `GET /model/database-setup` - Database connection setup
- `GET /model/raw-query` - Raw SQL queries
- `GET /model/query-builder` - Query Builder API
- `GET /model/eloquent-orm` - Eloquent ORM

**📚 Materi Detail:**

#### **1. Model MVC Dashboard**
- **URL:** `http://localhost:8000/model/dashboard`
- **View:** `dashboard.blade.php`
- **Controller Method:** `dashboard()`
- **Learning:** Central navigation untuk semua materi Model
- **Features:** 8 topic cards, learning objectives, course overview

#### **2. Controller Tanpa Model (Anti-Pattern)** ❌
- **URL:** `http://localhost:8000/model/without-model`
- **View:** `without-model.blade.php`
- **Controller Method:** `withoutModel()`
- **Learning:** Masalah ketika semua logic ada di controller
- **Topics:**
  - Fat Controller problem
  - Code duplication
  - Hard to test & maintain
  - Violates Single Responsibility Principle
  - Not reusable
- **Features:** Live demo dengan hardcoded data, comparison table

#### **3. Model untuk Business Logic** 💼
- **URL:** `http://localhost:8000/model/business-logic`
- **View:** `business-logic.blade.php`
- **Controller Method:** `businessLogic()`
- **Learning:** Memisahkan business logic ke Model
- **Topics:**
  - Price calculation methods
  - Stock management methods
  - Accessors & mutators
  - Reusable business logic
- **Model Methods:**
  - `calculateDiscount($percentage)` - Calculate discounted price
  - `getFormattedPriceAttribute()` - Format price to Rupiah
  - `isInStock()` - Check stock availability
  - `isLowStock($threshold)` - Low stock alert
  - `canBePurchased($quantity)` - Purchase validation
- **Features:** Live demo dengan Product model, method comparison

#### **4. Model untuk Validasi** ✅
- **URL:** `http://localhost:8000/model/validation`
- **View:** `validation.blade.php`
- **Controller Method:** `validation()`, `processValidation()`
- **Learning:** Centralized validation menggunakan Model
- **Topics:**
  - Validation rules di Model
  - Reusable validation
  - Consistent validation across application
  - Custom validation methods
- **Model Methods:**
  - `validationRules()` - Return validation rules array
  - `validateProduct($data)` - Validate product data
- **Validation Rules:**
  - name: required, string, max:255
  - description: nullable, string
  - price: required, numeric, min:0
  - stock: required, integer, min:0
  - category: required, string, max:255
  - is_active: boolean
- **Features:** Interactive validation form, live validation demo

#### **5. Intro Database Interaction** 🗄️
- **URL:** `http://localhost:8000/model/database-intro`
- **View:** `database-intro.blade.php`
- **Controller Method:** `databaseIntro()`
- **Learning:** Overview 3 cara berinteraksi dengan database
- **Topics:**
  - Raw Query (DB Facade) - Full control, best performance
  - Query Builder - Safe, portable, fluent interface
  - Eloquent ORM - Easy, feature-rich, Active Record
- **Comparison:**
  - Ease of Use: Raw ⭐⭐ | Builder ⭐⭐⭐⭐ | Eloquent ⭐⭐⭐⭐⭐
  - Performance: Raw ⭐⭐⭐⭐⭐ | Builder ⭐⭐⭐⭐ | Eloquent ⭐⭐⭐
  - Security: Raw ⭐⭐⭐ | Builder ⭐⭐⭐⭐⭐ | Eloquent ⭐⭐⭐⭐⭐
  - Flexibility: Raw ⭐⭐⭐⭐⭐ | Builder ⭐⭐⭐⭐ | Eloquent ⭐⭐⭐
- **Features:** Comparison table, use case recommendations

#### **6. Setup Database Connection** ⚙️
- **URL:** `http://localhost:8000/model/database-setup`
- **View:** `database-setup.blade.php`
- **Controller Method:** `databaseSetup()`
- **Learning:** Konfigurasi koneksi database di Laravel
- **Topics:**
  - Environment configuration (.env)
  - Database drivers (MySQL, PostgreSQL, SQLite, SQL Server)
  - Migration basics
  - Common connection errors & solutions
- **Configuration:**
  - DB_CONNECTION, DB_HOST, DB_PORT
  - DB_DATABASE, DB_USERNAME, DB_PASSWORD
- **Commands:**
  - `php artisan migrate` - Run migrations
  - `php artisan migrate:rollback` - Rollback
  - `php artisan migrate:fresh` - Fresh migration
  - `php artisan db:seed` - Seed database
- **Features:** Live connection status, troubleshooting guide, best practices

#### **7. Raw Query (DB Facade)** 📝
- **URL:** `http://localhost:8000/model/raw-query`
- **View:** `raw-query.blade.php`
- **Controller Method:** `rawQuery()`
- **Learning:** Database interaction dengan raw SQL
- **Topics:**
  - SELECT, INSERT, UPDATE, DELETE queries
  - Parameter binding untuk security
  - SQL injection prevention
  - CRUD operations
- **Syntax Examples:**
  ```php
  DB::select('SELECT * FROM products WHERE category = ?', ['Electronics']);
  DB::insert('INSERT INTO products (name, price) VALUES (?, ?)', ['Product', 100000]);
  DB::update('UPDATE products SET stock = ? WHERE id = ?', [100, 1]);
  DB::delete('DELETE FROM products WHERE id = ?', [1]);
  ```
- **Security:** Always use parameter binding, never concatenate user input
- **Features:** Live query demos, security comparison, pros & cons

#### **8. Query Builder** 🔧
- **URL:** `http://localhost:8000/model/query-builder`
- **View:** `query-builder.blade.php`
- **Controller Method:** `queryBuilder()`
- **Learning:** Fluent interface Query Builder API
- **Topics:**
  - Method chaining
  - SELECT, WHERE, ORDER BY, LIMIT
  - Aggregate functions
  - Dynamic query building
- **Common Methods:**
  - SELECT: `get()`, `first()`, `find()`, `count()`
  - WHERE: `where()`, `orWhere()`, `whereBetween()`, `whereIn()`
  - AGGREGATE: `count()`, `max()`, `min()`, `avg()`, `sum()`
  - ORDERING: `orderBy()`, `latest()`, `oldest()`, `limit()`
- **Syntax Examples:**
  ```php
  DB::table('products')->where('category', 'Electronics')->get();
  DB::table('products')->orderBy('price', 'desc')->limit(10)->get();
  DB::table('products')->select('category', DB::raw('COUNT(*) as total'))->groupBy('category')->get();
  ```
- **Features:** Live demos, method reference, chaining examples

#### **9. Eloquent ORM** 🚀
- **URL:** `http://localhost:8000/model/eloquent-orm`
- **View:** `eloquent-orm.blade.php`
- **Controller Method:** `eloquentOrm()`
- **Learning:** Object-Relational Mapping dengan Active Record
- **Topics:**
  - Query scopes
  - Accessors & mutators
  - Model events
  - Relationships
  - CRUD operations
- **Query Scopes:**
  - `scopeActive($query)` - Filter active products
  - `scopeInStock($query)` - Filter in-stock products
  - `scopeByCategory($query, $category)` - Filter by category
  - `scopeLowStock($query, $threshold)` - Low stock alert
- **Accessors:**
  - `getFormattedPriceAttribute()` - Auto-format price
- **CRUD Examples:**
  ```php
  Product::all(); // Get all
  Product::find(1); // Find by ID
  Product::where('category', 'Electronics')->get(); // Filter
  Product::create([...]); // Create
  $product->update([...]); // Update
  $product->delete(); // Delete
  ```
- **Features:** Live demos with scopes, CRUD examples, best practices

**🎯 Learning Outcomes Course 4:**
- ✅ Memahami peran Model dalam MVC pattern
- ✅ Membedakan controller dengan dan tanpa model
- ✅ Mengimplementasikan business logic di Model
- ✅ Menerapkan validation di Model
- ✅ Memahami 3 cara database interaction
- ✅ Setup dan troubleshoot database connection
- ✅ Menggunakan Raw Query dengan parameter binding
- ✅ Menggunakan Query Builder dengan method chaining
- ✅ Menggunakan Eloquent ORM dengan fitur lengkap
- ✅ Memilih metode yang tepat untuk kasus berbeda
- ✅ Menerapkan best practices dalam Model development
- ✅ Menghindari N+1 query problem
- ✅ Implement query scopes dan accessors
- ✅ Handle relationships antar models

---

## 🚀 Cara Menggunakan Repository

### Prerequisites
```bash
# Install Laravel dependencies
composer install

# Install npm dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migration (jika ada)
php artisan migrate
```

### Menjalankan Application
```bash
# Start development server
php artisan serve

# Access application
http://localhost:8000
```

### 🎯 Learning Path

#### Step 1: Basic MVC Pattern (Course 1)
1. **Access:** `http://localhost:8000/web-programming`
2. **Learn:** Konsep dasar MVC pattern
3. **Practice:** Contact form handling di `http://localhost:8000/contacts`
4. **Understand:** Controller-View-Model interaction
5. **Master:** Form validation dan CSRF protection

#### Step 2: Advanced Input Handling (Course 2)
1. **Access:** `http://localhost:8000/practice/dashboard`
2. **Learn:** 6 metode input handling
3. **Practice:** Setiap metode input secara berurutan:
   - 🔍 Query Parameter Practice
   - 🛤️ Path Variable Practice  
   - 📝 Request Body Practice
   - 📁 File Upload Practice
   - 🔐 Headers & Cookies Practice
   - 🔄 Mixed Methods Practice
4. **Understand:** Complex controller logic
5. **Master:** Security best practices dan advanced validation

#### Step 3: Frontend Blade Templating (Course 3)
1. **Access:** `http://localhost:8000/frontend/dashboard`
2. **Learn:** Blade templating engine fundamentals
3. **Practice:** Setiap materi frontend secara berurutan:
   - 🏗️ MVC Architecture Overview
   - 📝 Blade Basic Syntax
   - 🎨 Layout System & Template Inheritance
   - 🧩 Sections & Components
   - 🔀 Blade Directives & Control Structures
   - 🚀 Advanced Blade Features
4. **Understand:** View layer dalam MVC pattern
5. **Master:** Reusable layouts, components, dan best practices

#### Step 4: Model pada Arsitektur MVC (Course 4)
1. **Access:** `http://localhost:8000/model/dashboard`
2. **Learn:** Model layer, business logic, dan database interaction
3. **Practice:** Setiap materi Model secara berurutan:
   - ❌ Controller Tanpa Model (Anti-Pattern)
   - 💼 Model untuk Business Logic
   - ✅ Model untuk Validasi
   - 🗄️ Intro Database Interaction
   - ⚙️ Setup Database Connection
   - 📝 Raw Query (DB Facade)
   - 🔧 Query Builder
   - 🚀 Eloquent ORM
4. **Understand:** Model layer dalam MVC pattern
5. **Master:** Business logic, validation, database interaction, dan best practices

---

## 🛠️ Teknologi yang Digunakan

- **Laravel 12** - PHP Framework
- **Blade Templating** - Template Engine
- **HTML5, CSS3, JavaScript** - Frontend
- **Bootstrap-style Design** - Responsive UI
- **PHP 8.4** - Backend Language

---

## 📖 Best Practices yang Dipelajari

### Controller Best Practices
1. **Single Responsibility** - Satu method untuk satu tugas
2. **Validation** - Selalu validasi input
3. **Error Handling** - Return proper error responses
4. **Dependency Injection** - Inject Request object
5. **Return Types** - Consistent response format

### Security Considerations
1. **Input Validation** - Never trust user input
2. **CSRF Protection** - Use CSRF tokens
3. **File Upload Security** - Validate file types and sizes
4. **Authentication** - Check user permissions
5. **Data Sanitization** - Clean input data

---

## 🧪 Testing & Debugging

### Debugging Techniques
```php
// Debug dengan dump and die
dd($request->all());

// Debug dengan logging
\Log::info('Data received:', $data);

// Debug dengan browser console
console.log($data);
```

### Testing Methods
- **Unit Tests** - Test individual methods
- **Feature Tests** - Test HTTP requests
- **Browser Tests** - Test user interactions

---

## 🎯 Learning Outcomes

Setelah mempelajari repository ini, mahasiswa diharapkan bisa:

### ✅ Course 1: Basic MVC Competencies
- Memahami konsep MVC pattern
- Membuat controller sederhana
- Handle form submission
- Implement basic validation
- Menggunakan Blade templating
- CSRF protection implementation
- Error handling dasar

### ✅ Course 2: Advanced Input Handling Competencies
- Handle 6 metode input berbeda
- Implement complex validation
- Build RESTful APIs
- Handle file uploads securely
- Analyze HTTP requests
- Combine multiple input methods
- Advanced error handling
- Security best practices

### ✅ Course 3: Frontend Blade Templating Competencies
- Master Blade templating syntax
- Build reusable layout systems
- Create modular components
- Implement control structures & loops
- Handle authentication & security directives
- Integrate JavaScript with Blade
- Follow Blade best practices
- Build maintainable frontend code
- Understand View layer in MVC

### ✅ Course 4: Model MVC Competencies
- Memahami peran Model dalam MVC pattern
- Membedakan controller dengan dan tanpa model
- Mengimplementasikan business logic di Model
- Menerapkan centralized validation
- Memahami 3 cara database interaction (Raw Query, Query Builder, Eloquent)
- Setup dan troubleshoot database connection
- Menggunakan Raw Query dengan parameter binding untuk security
- Menggunakan Query Builder dengan method chaining
- Menggunakan Eloquent ORM dengan query scopes dan accessors
- Memilih metode database interaction yang tepat
- Menerapkan best practices dalam Model development
- Menghindari N+1 query problem dengan eager loading
- Implement reusable business logic methods
- Handle model relationships

### ✅ Professional Skills
- Write clean, maintainable code
- Implement security best practices
- Debug and test applications
- Build production-ready features
- Design RESTful APIs
- Handle complex form scenarios
- Create reusable UI components
- Optimize frontend performance

---

## 📱 Quick Access Links

### 🟢 Course 1: Basic MVC Pattern (WebProgrammingController)

| Feature | URL | Description |
|---------|-----|-------------|
| **Web Programming Intro** | `/web-programming` | Pengenalan konsep MVC |
| **Contact Form** | `/contacts` | Form kontak dasar |

### 🔵 Course 2: Controller-MVC, Advanced Input Handling (DataHandlingController)

| Feature | URL | Description |
|---------|-----|-------------|
| **Dashboard** | `/practice/dashboard` | Navigasi utama semua praktik |
| **Query Parameters** | `/practice/query-form` | Filter dengan URL parameters |
| **Path Variables** | `/practice/path-form` | RESTful routing |
| **Request Body** | `/practice/body-form` | Form dan JSON handling |
| **File Upload** | `/practice/upload-form` | Single & multiple uploads |
| **Headers Analysis** | `/practice/analyze-request` | HTTP headers & cookies |
| **Complex Form** | `/practice/complex-form` | Mixed methods |

### 🟣 Course 3: Frontend Blade Templating (FrontendController)

| Feature | URL | Description |
|---------|-----|-------------|
| **Frontend Dashboard** | `/frontend/dashboard` | Navigasi utama materi frontend |
| **MVC Architecture** | `/frontend/architecture` | Understanding MVC pattern |
| **Blade Basic** | `/frontend/blade-basic` | Blade syntax fundamentals |
| **Layout System** | `/frontend/layouts` | Template inheritance |
| **Sections & Components** | `/frontend/sections` | Modular view organization |
| **Blade Directives** | `/frontend/directives` | Control structures & loops |
| **Advanced Features** | `/frontend/advanced` | Security & JS integration |

### 🟠 Course 4: Model MVC (ModelController)

| Feature | URL | Description |
|---------|-----|-------------|
| **Model Dashboard** | `/model/dashboard` | Navigasi utama materi Model |
| **Without Model** | `/model/without-model` | Anti-pattern demonstration |
| **Business Logic** | `/model/business-logic` | Model business logic methods |
| **Validation** | `/model/validation` | Centralized validation |
| **Database Intro** | `/model/database-intro` | 3 cara database interaction |
| **Database Setup** | `/model/database-setup` | Database configuration |
| **Raw Query** | `/model/raw-query` | Raw SQL dengan DB Facade |
| **Query Builder** | `/model/query-builder` | Fluent interface API |
| **Eloquent ORM** | `/model/eloquent-orm` | Active Record pattern |

---

## 🤝 Contributing

Repository ini dirancang untuk pembelajaran. Jika ingin menambah materi:
1. Fork repository
2. Buat branch baru
3. Add fitur baru
4. Submit pull request

---

## 📄 License

Repository ini untuk keperluan pendidikan mata kuliah Pemrograman Web Lanjutan.

---

## 👨‍🏫 Instructor Notes

### Untuk Dosen:
- Gunakan commit history untuk menjelaskan perkembangan materi
- Demo setiap metode input secara live coding
- Berikan challenge tambahan untuk praktik mandiri
- Gunakan log files untuk debugging demonstration

### Untuk Mahasiswa:
- Pelajari commit history untuk memahami alur development
- Praktikkan setiap metode input
- Analisis code untuk memahami best practices
- Coba tambahkan fitur baru sebagai latihan

---

## 🎉 Selamat Belajar!

Repository ini adalah panduan lengkap untuk mempelajari **Laravel MVC Pattern** dari dasar hingga advanced. Dengan 4 course yang sistematis:

- **🟢 Course 1:** Basic MVC Pattern & Form Handling
- **🔵 Course 2:** Advanced Controller & Input Handling  
- **🟣 Course 3:** Frontend Blade Templating Engine
- **🟠 Course 4:** Model pada Arsitektur MVC & Database Interaction

Semua materi disusun secara bertahap untuk membantu Anda menguasai:
- ✅ **Model-View-Controller Pattern**
- ✅ **Controller Logic & Input Handling**
- ✅ **Blade Templating & Frontend Development**
- ✅ **Model Layer & Business Logic**
- ✅ **Database Interaction (Raw Query, Query Builder, Eloquent ORM)**
- ✅ **Validation & Security Best Practices**
- ✅ **Production-Ready Code**

**Happy Coding! 🚀**

