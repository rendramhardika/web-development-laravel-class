# Course 4: Model pada Arsitektur MVC dan Penerapan di Laravel

**Mata Kuliah:** Pemrograman Web Lanjutan  
**Kode:** TIF1203  
**Kelas:** C

---

## 📋 Agenda Pembelajaran

1. Pengenalan Model dalam MVC
2. Controller Tanpa Model (Anti-Pattern)
3. Model untuk Business Logic
4. Model untuk Validasi
5. Database Interaction Overview
6. Setup Database Connection
7. Raw Query (DB Facade)
8. Query Builder
9. Eloquent ORM

---

## 1️⃣ Pengenalan Model dalam MVC

### Apa itu Model?

**Model** adalah komponen dalam MVC pattern yang bertanggung jawab untuk:
- 📊 **Data Management** - Mengelola data aplikasi
- 🔄 **Business Logic** - Logika bisnis aplikasi
- 🗄️ **Database Interaction** - Komunikasi dengan database
- ✅ **Data Validation** - Validasi data sebelum disimpan

### MVC Pattern Recap

```
┌─────────────┐
│   Request   │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│  CONTROLLER │ ◄─── Traffic Controller
└──────┬──────┘
       │
       ├──────────────┐
       │              │
       ▼              ▼
┌─────────────┐  ┌─────────────┐
│    MODEL    │  │     VIEW    │
│  (Data &    │  │ (Presentation)
│   Logic)    │  │             │
└─────────────┘  └─────────────┘
```

### Tanggung Jawab Model

✅ **HARUS di Model:**
- Business logic (calculations, rules)
- Data validation
- Database queries
- Data relationships
- Data transformations

❌ **TIDAK di Model:**
- HTTP requests/responses
- Session management
- View rendering
- Routing logic

---

## 2️⃣ Controller Tanpa Model (Anti-Pattern)

### ❌ Masalah Fat Controller

```php
public function withoutModel()
{
    // Hardcoded data - tidak ada database
    $products = [
        ['id' => 1, 'name' => 'Laptop', 'price' => 15000000, 'stock' => 10],
        ['id' => 2, 'name' => 'Mouse', 'price' => 500000, 'stock' => 50],
    ];

    // Business logic di controller
    $productId = 1;
    $selectedProduct = null;
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $selectedProduct = $product;
            break;
        }
    }

    // Calculation di controller
    $discountPercentage = 10;
    $discountedPrice = $selectedProduct['price'] - 
        ($selectedProduct['price'] * $discountPercentage / 100);

    // Formatting di controller
    $formattedPrice = 'Rp ' . number_format($selectedProduct['price'], 0, ',', '.');

    // Validation di controller
    $isInStock = $selectedProduct['stock'] > 0;

    return view('model.without-model', compact(...));
}
```

### 🔴 Masalah yang Timbul

1. **Fat Controller** - Controller terlalu besar
2. **Code Duplication** - Logic sama ditulis berulang
3. **Hard to Test** - Sulit unit testing
4. **Violates SRP** - Melanggar Single Responsibility Principle
5. **Not Reusable** - Logic tidak bisa digunakan kembali
6. **Maintenance Hell** - Sulit di-maintain

---

## 3️⃣ Model untuk Business Logic

### ✅ Solusi: Pindahkan Logic ke Model

**Model: Product.php**
```php
class Product extends Model
{
    // Business Logic: Price Calculation
    public function calculateDiscount($percentage)
    {
        return $this->price - ($this->price * $percentage / 100);
    }

    // Accessor: Formatted Price
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    // Business Logic: Stock Check
    public function isInStock()
    {
        return $this->stock > 0;
    }

    // Business Logic: Low Stock Alert
    public function isLowStock($threshold = 10)
    {
        return $this->stock > 0 && $this->stock <= $threshold;
    }

    // Business Logic: Purchase Validation
    public function canBePurchased($quantity)
    {
        return $this->is_active && $this->stock >= $quantity;
    }
}
```

**Controller (Clean & Slim):**
```php
public function businessLogic()
{
    $product = Product::first();
    
    $discount10 = $product->calculateDiscount(10);
    $discount20 = $product->calculateDiscount(20);
    $formattedPrice = $product->formatted_price;
    $inStock = $product->isInStock();
    $lowStock = $product->isLowStock();
    $canPurchase5 = $product->canBePurchased(5);

    return view('model.business-logic', compact(...));
}
```

### ✅ Keuntungan

- ♻️ **Reusable** - Logic bisa digunakan di berbagai controller
- 🧪 **Testable** - Mudah unit testing
- 🔧 **Maintainable** - Update di satu tempat
- 📖 **Readable** - Code lebih clean dan mudah dibaca
- 🎯 **SRP** - Setiap class punya tanggung jawab jelas

---

## 4️⃣ Model untuk Validasi

### Centralized Validation Rules

**Model: Product.php**
```php
class Product extends Model
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
```

**Controller:**
```php
public function processValidation(Request $request)
{
    $result = Product::validateProduct($request->all());
    
    if ($result['success']) {
        return back()->with('success', 'Validation passed!');
    }
    
    return back()->withErrors($result['errors'])->withInput();
}
```

### ✅ Keuntungan Validation di Model

- 🎯 **Centralized** - Rules terpusat di satu tempat
- ♻️ **Reusable** - Bisa digunakan di berbagai form
- 🔄 **Consistent** - Semua validasi sama
- 🔧 **Easy Update** - Update di satu tempat, semua terupdate

---

## 5️⃣ Database Interaction Overview

### 3 Cara Berinteraksi dengan Database di Laravel

| Aspek | Raw Query | Query Builder | Eloquent ORM |
|-------|-----------|---------------|--------------|
| **Ease of Use** | ⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ |
| **Performance** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ |
| **Security** | ⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ |
| **Flexibility** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ |
| **Maintainability** | ⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ |

### 1. Raw Query (DB Facade)

```php
$products = DB::select('SELECT * FROM products WHERE category = ?', ['Electronics']);
```

**Kapan Digunakan:**
- Complex queries dengan multiple joins
- Performance-critical operations
- Database-specific features

### 2. Query Builder

```php
$products = DB::table('products')
    ->where('category', 'Electronics')
    ->get();
```

**Kapan Digunakan:**
- Dynamic query building
- Reporting queries
- Tidak butuh model features

### 3. Eloquent ORM

```php
$products = Product::where('category', 'Electronics')->get();
```

**Kapan Digunakan:**
- Standard CRUD operations
- Butuh relationships
- Rapid development

---

## 6️⃣ Setup Database Connection

### Environment Configuration (.env)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Database Drivers yang Didukung

1. **MySQL** - Default, paling populer
2. **PostgreSQL** - Advanced features
3. **SQLite** - File-based, cocok untuk testing
4. **SQL Server** - Microsoft SQL Server

### Migration Basics

```bash
# Run migrations
php artisan migrate

# Rollback migration
php artisan migrate:rollback

# Fresh migration
php artisan migrate:fresh

# Seed database
php artisan db:seed
```

### Common Errors & Solutions

**Error:** Connection refused
- **Solusi:** Pastikan database server running

**Error:** Access denied
- **Solusi:** Cek username/password di .env

**Error:** Unknown database
- **Solusi:** Buat database terlebih dahulu

**Error:** PDO driver not found
- **Solusi:** Aktifkan extension di php.ini

---

## 7️⃣ Raw Query (DB Facade)

### Basic Syntax

```php
use Illuminate\Support\Facades\DB;

// SELECT
$results = DB::select('SELECT * FROM products WHERE category = ?', ['Electronics']);

// INSERT
DB::insert('INSERT INTO products (name, price, stock) VALUES (?, ?, ?)', 
    ['New Product', 100000, 50]);

// UPDATE
DB::update('UPDATE products SET stock = ? WHERE id = ?', [100, 1]);

// DELETE
DB::delete('DELETE FROM products WHERE id = ?', [1]);
```

### 🔒 Parameter Binding (Security)

**❌ JANGAN:**
```php
// Vulnerable to SQL Injection!
$category = $_GET['category'];
$results = DB::select("SELECT * FROM products WHERE category = '$category'");
```

**✅ GUNAKAN:**
```php
// Safe with parameter binding
$category = $_GET['category'];
$results = DB::select('SELECT * FROM products WHERE category = ?', [$category]);
```

### Pros & Cons

**✅ Kelebihan:**
- Full control atas SQL query
- Performance optimal untuk complex queries
- Bisa menggunakan semua fitur SQL

**❌ Kekurangan:**
- Rawan SQL injection jika tidak hati-hati
- Database-specific (tidak portable)
- Tidak ada IDE autocomplete
- Manual mapping ke objects

---

## 8️⃣ Query Builder

### Fluent Interface

```php
use Illuminate\Support\Facades\DB;

// Basic query
$products = DB::table('products')->get();

// WHERE clause
$products = DB::table('products')
    ->where('category', 'Electronics')
    ->where('is_active', true)
    ->get();

// ORDER BY & LIMIT
$products = DB::table('products')
    ->orderBy('price', 'desc')
    ->limit(10)
    ->get();

// Aggregate
$count = DB::table('products')
    ->select('category', DB::raw('COUNT(*) as total'))
    ->groupBy('category')
    ->get();
```

### Method Chaining

```php
$products = DB::table('products')
    ->select('id', 'name', 'price', 'stock')
    ->where('is_active', true)
    ->where('stock', '>', 0)
    ->whereBetween('price', [100000, 1000000])
    ->orderBy('price', 'desc')
    ->limit(10)
    ->get();
```

### Common Methods

**SELECT Methods:**
- `get()` - Get all results
- `first()` - Get first result
- `find($id)` - Find by ID
- `count()` - Count results

**WHERE Methods:**
- `where('col', 'val')` - Basic where
- `orWhere('col', 'val')` - OR condition
- `whereBetween('col', [1, 10])` - Between
- `whereIn('col', [1,2,3])` - In array
- `whereNull('col')` - Is NULL

**Aggregate Methods:**
- `count()` - Count rows
- `max('col')` - Maximum value
- `min('col')` - Minimum value
- `avg('col')` - Average value
- `sum('col')` - Sum of values

### Pros & Cons

**✅ Kelebihan:**
- Aman dari SQL injection
- Database-agnostic (portable)
- Clean syntax dengan method chaining
- IDE autocomplete support

**❌ Kekurangan:**
- Tidak ada model features
- Harus manual handle joins
- Returns stdClass, bukan model instances

---

## 9️⃣ Eloquent ORM

### Active Record Pattern

```php
use App\Models\Product;

// SELECT
$products = Product::all();
$product = Product::find(1);
$products = Product::where('category', 'Electronics')->get();

// INSERT
$product = Product::create([
    'name' => 'New Product',
    'price' => 100000,
    'stock' => 50
]);

// UPDATE
$product = Product::find(1);
$product->stock = 100;
$product->save();

// DELETE
$product = Product::find(1);
$product->delete();
```

### Query Scopes

**Define Scope di Model:**
```php
class Product extends Model
{
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
```

**Usage:**
```php
$products = Product::active()->inStock()->get();
$electronics = Product::byCategory('Electronics')->get();
```

### Accessors & Mutators

**Accessor (Get):**
```php
public function getFormattedPriceAttribute()
{
    return 'Rp ' . number_format($this->price, 0, ',', '.');
}

// Usage
echo $product->formatted_price; // Rp 1.500.000
```

**Mutator (Set):**
```php
public function setNameAttribute($value)
{
    $this->attributes['name'] = ucwords($value);
}

// Usage
$product->name = 'laptop asus'; // Stored as "Laptop Asus"
```

### Relationships

```php
// One to Many
public function orders()
{
    return $this->hasMany(Order::class);
}

// Belongs To
public function category()
{
    return $this->belongsTo(Category::class);
}

// Many to Many
public function tags()
{
    return $this->belongsToMany(Tag::class);
}
```

### Model Events

```php
protected static function booted()
{
    static::creating(function ($product) {
        // Before creating
    });
    
    static::created(function ($product) {
        // After created
    });
}
```

### Pros & Cons

**✅ Kelebihan:**
- Paling mudah dan intuitif
- Rich features (accessors, scopes, events)
- Relationships management
- Active Record pattern
- Auto timestamps

**❌ Kekurangan:**
- Performance overhead
- N+1 query problem
- Memory intensive untuk large datasets
- Learning curve untuk advanced features

---

## 📊 Comparison Summary

### Kapan Menggunakan Apa?

**🔴 Raw Query:**
- Complex queries dengan multiple joins/subqueries
- Performance-critical operations
- Database-specific features
- Query optimization yang sangat spesifik

**🟡 Query Builder:**
- Dynamic query building
- Reporting & aggregation
- Bulk operations
- Ketika tidak butuh model features

**🟢 Eloquent ORM:**
- Standard CRUD operations
- Ketika butuh relationships
- Rapid application development
- Ketika butuh model features (accessors, scopes, events)

---

## 💡 Best Practices

### 1. Model Organization

```php
class Product extends Model
{
    // 1. Table & Connection
    protected $table = 'products';
    protected $connection = 'mysql';
    
    // 2. Mass Assignment
    protected $fillable = ['name', 'price', 'stock'];
    protected $guarded = ['id'];
    
    // 3. Casts
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
    
    // 4. Relationships
    public function category() { }
    
    // 5. Scopes
    public function scopeActive($query) { }
    
    // 6. Accessors & Mutators
    public function getFormattedPriceAttribute() { }
    
    // 7. Business Logic
    public function calculateDiscount($percentage) { }
    
    // 8. Validation
    public static function validationRules() { }
}
```

### 2. Avoid N+1 Query Problem

**❌ Bad (N+1 Problem):**
```php
$products = Product::all();
foreach ($products as $product) {
    echo $product->category->name; // N queries!
}
```

**✅ Good (Eager Loading):**
```php
$products = Product::with('category')->all();
foreach ($products as $product) {
    echo $product->category->name; // 1 query!
}
```

### 3. Use Chunking for Large Datasets

```php
Product::chunk(100, function($products) {
    foreach ($products as $product) {
        // Process each product
    }
});
```

### 4. Mass Assignment Protection

```php
// Define fillable
protected $fillable = ['name', 'price', 'stock'];

// Or guarded
protected $guarded = ['id', 'created_at'];
```

### 5. Use Transactions

```php
DB::transaction(function () {
    $product = Product::create([...]);
    $order = Order::create([...]);
});
```

---

## 🎯 Learning Outcomes

Setelah mempelajari materi ini, mahasiswa diharapkan dapat:

1. ✅ Memahami peran Model dalam MVC pattern
2. ✅ Membedakan controller dengan dan tanpa model
3. ✅ Mengimplementasikan business logic di Model
4. ✅ Menerapkan validation di Model
5. ✅ Memahami 3 cara database interaction di Laravel
6. ✅ Menggunakan Raw Query dengan parameter binding
7. ✅ Menggunakan Query Builder dengan method chaining
8. ✅ Menggunakan Eloquent ORM dengan fitur lengkapnya
9. ✅ Memilih metode yang tepat untuk kasus yang berbeda
10. ✅ Menerapkan best practices dalam penggunaan Model

---

## 📝 Latihan

### Latihan 1: Business Logic
Buat Model `Order` dengan business logic:
- `calculateTotal()` - Hitung total order
- `applyDiscount($code)` - Apply discount code
- `canBeCancelled()` - Check apakah bisa dibatalkan

### Latihan 2: Validation
Buat validation rules untuk Model `Order`:
- customer_name: required, string
- total_amount: required, numeric, min:0
- status: required, in:pending,completed,cancelled

### Latihan 3: Query Scopes
Buat query scopes untuk Model `Order`:
- `scopePending()` - Order dengan status pending
- `scopeCompleted()` - Order yang sudah selesai
- `scopeByCustomer($name)` - Order berdasarkan customer

### Latihan 4: Database Interaction
Implementasikan CRUD operations untuk `Order` menggunakan:
1. Raw Query
2. Query Builder
3. Eloquent ORM

Bandingkan kode dan performance masing-masing!

---

## 📚 Referensi

1. **Laravel Documentation**
   - https://laravel.com/docs/eloquent
   - https://laravel.com/docs/queries

2. **Database Best Practices**
   - https://laravel.com/docs/database

3. **Model Best Practices**
   - https://laravel.com/docs/eloquent-relationships

4. **Security**
   - https://laravel.com/docs/queries#raw-expressions

---

## 🎓 Kesimpulan

### Key Takeaways

1. **Model adalah jantung aplikasi** - Semua business logic dan data management ada di Model
2. **Pisahkan concerns** - Controller untuk routing, Model untuk logic, View untuk presentation
3. **Pilih metode yang tepat** - Raw Query untuk complex, Query Builder untuk dynamic, Eloquent untuk standard
4. **Security first** - Selalu gunakan parameter binding untuk raw queries
5. **Performance matters** - Gunakan eager loading, chunking, dan caching
6. **Follow best practices** - Mass assignment protection, validation, transactions

### Next Steps

- **Course 5:** Relationships & Advanced Eloquent
- **Course 6:** API Development dengan Laravel
- **Course 7:** Testing & Debugging

---

**Terima kasih! 🙏**

**Questions?**
