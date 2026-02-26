# 📚 Laravel Web Programming - MVC Practice Repository

> Repository ini dibuat untuk mata kuliah **Pemrograman Web Lanjutan** dengan fokus pada **MVC Pattern**, khususnya **Controller** dalam framework Laravel.

## 🎯 Tujuan Pembelajaran

Repository ini dirancang untuk membantu mahasiswa memahami:
- **MVC Pattern** dalam Laravel
- **Controller** sebagai jembatan antara user input dan application logic
- **Berbagai metode input handling** dalam web development
- **Best practices** dalam pengembangan aplikasi web

## 🏗️ Struktur Project

```
laravel-web-programming/
├── app/Http/Controllers/
│   ├── WebProgrammingController.php      # Materi dasar instalasi Laravel
│   └── DataHandlingController.php        # Materi Controller-mvc
├── resources/views/
│   ├── web-programming.blade.php         # Halaman intro web programming
│   ├── contact-form.blade.php           # Form kontak dasar
│   ├── contact-success.blade.php        # Halaman sukses
│   └── practice/                         # Folder praktik lanjutan
│       ├── dashboard.blade.php           # Dashboard navigasi
│       ├── query-*.blade.php             # Query parameter practice
│       ├── path-*.blade.php              # Path variable practice
│       ├── body-*.blade.php              # Request body practice
│       ├── upload-*.blade.php            # File upload practice
│       ├── headers-result.blade.php      # Headers & cookies analysis
│       └── complex-*.blade.php           # Mixed methods practice
└── routes/
    └── web.php                            # Routes untuk semua fitur
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

### ✅ Professional Skills
- Write clean, maintainable code
- Implement security best practices
- Debug and test applications
- Build production-ready features
- Design RESTful APIs
- Handle complex form scenarios

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

Repository ini adalah panduan lengkap untuk mempelajari **Controller pada MVC** dengan Laravel. Mulai dari dasar hingga advanced, semua materi sudah disusun secara sistematis untuk membantu Anda menguasai web development.

**Happy Coding! 🚀**
