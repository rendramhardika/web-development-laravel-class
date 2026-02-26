<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataHandlingController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('practice.dashboard');
    }

    // 1. Query Parameter Practice
    public function searchForm()
    {
        return view('practice.query-form');
    }

    public function searchProducts(Request $request)
    {
        // GET /practice/search?name=laptop&min_price=1000&max_price=5000&category=electronics&sort=price_asc&page=1
        $name = $request->query('name', '');
        $minPrice = $request->query('min_price', 0);
        $maxPrice = $request->query('max_price', 99999999);
        $category = $request->query('category', 'all');
        $sortBy = $request->query('sort', 'name');
        $page = $request->query('page', 1);

        // Handle empty price parameters
        $minPrice = is_numeric($minPrice) && $minPrice > 0 ? (int)$minPrice : 0;
        $maxPrice = is_numeric($maxPrice) && $maxPrice > 0 ? (int)$maxPrice : 99999999;

        // Debug: Log the received parameters
        \Log::info('Search Parameters:', [
            'name' => $name,
            'name_length' => strlen($name),
            'name_empty' => empty($name),
            'category' => $category,
            'min_price' => $minPrice,
            'max_price' => $maxPrice
        ]);

        // Mock products data
        $allProducts = [
            ['id' => 1, 'name' => 'Laptop ASUS ROG', 'price' => 15000000, 'category' => 'electronics'],
            ['id' => 2, 'name' => 'Laptop Lenovo ThinkPad', 'price' => 12000000, 'category' => 'electronics'],
            ['id' => 3, 'name' => 'Mouse Logitech MX Master', 'price' => 1500000, 'category' => 'electronics'],
            ['id' => 4, 'name' => 'Keyboard Mechanical', 'price' => 800000, 'category' => 'electronics'],
            ['id' => 5, 'name' => 'Monitor LG 27 inch', 'price' => 3500000, 'category' => 'electronics'],
            ['id' => 6, 'name' => 'Office Chair', 'price' => 2500000, 'category' => 'furniture'],
            ['id' => 7, 'name' => 'Standing Desk', 'price' => 4500000, 'category' => 'furniture'],
            ['id' => 8, 'name' => 'Webcam HD', 'price' => 750000, 'category' => 'electronics'],
        ];

        // Filter products
        $filteredProducts = collect($allProducts);
        
        \Log::info('Initial Data:', [
            'all_products' => $allProducts,
            'electronics_count' => collect($allProducts)->where('category', 'electronics')->count()
        ]);
        
        // Filter by name (case-insensitive contains)
        if (!empty($name)) {
            $filteredProducts = $filteredProducts->filter(function($product) use ($name) {
                $found = stripos($product['name'], $name) !== false;
                \Log::info('Name Filter Check:', [
                    'product_name' => $product['name'],
                    'search_term' => $name,
                    'found' => $found
                ]);
                return $found;
            });
        }
        
        // Filter by category
        if ($category !== 'all') {
            $filteredProducts = $filteredProducts->where('category', $category);
            \Log::info('After Category Filter:', [
                'category' => $category,
                'count' => $filteredProducts->count(),
                'products' => $filteredProducts->toArray()
            ]);
        }
        
        // Filter by price range
        $filteredProducts = $filteredProducts
            ->where('price', '>=', $minPrice)
            ->where('price', '<=', $maxPrice);

        \Log::info('Search Results:', [
            'search_name' => $name,
            'category' => $category,
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
            'total_products' => count($allProducts),
            'filtered_count' => $filteredProducts->count(),
            'found_products' => $filteredProducts->pluck('name')->toArray()
        ]);

        // Sort products
        if ($sortBy === 'price_asc') {
            $filteredProducts = $filteredProducts->sortBy('price');
        } elseif ($sortBy === 'price_desc') {
            $filteredProducts = $filteredProducts->sortByDesc('price');
        } else {
            $filteredProducts = $filteredProducts->sortBy('name');
        }

        $products = $filteredProducts->values()->all();

        return view('practice.query-result', compact(
            'name', 'minPrice', 'maxPrice', 'category', 'sortBy', 'page', 'products'
        ));
    }

    // 2. Path Variable Practice
    public function userForm()
    {
        return view('practice.path-form');
    }

    public function getUserProfile($userId, $section = 'overview')
    {
        // Mock user data
        $user = [
            'id' => $userId,
            'name' => 'User ' . $userId,
            'email' => 'user' . $userId . '@example.com',
            'role' => 'Student',
            'registration_date' => '2023-01-15',
            'last_login' => '2024-02-19 10:30:00',
            'profile' => [
                'bio' => 'This is a sample bio for user ' . $userId,
                'phone' => '+62 812-3456-789' . $userId,
                'address' => 'Jakarta, Indonesia'
            ],
            'courses' => [
                ['code' => 'WDP1', 'name' => 'Web Programming Basic', 'grade' => 'A'],
                ['code' => 'WDP2', 'name' => 'Web Programming Advanced', 'grade' => 'B+'],
                ['code' => 'PBO', 'name' => 'Object Oriented Programming', 'grade' => 'A-']
            ]
        ];

        return view('practice.path-result', compact('user', 'section'));
    }

    public function getCategoryProducts($category, $subCategory = null)
    {
        // Mock categories
        $categories = [
            'electronics' => ['laptops', 'phones', 'accessories'],
            'furniture' => ['chairs', 'desks', 'storage'],
            'books' => ['programming', 'design', 'business']
        ];

        $mockProducts = [
            'electronics.laptops' => [
                ['name' => 'ASUS ROG Gaming', 'price' => 15000000],
                ['name' => 'MacBook Pro', 'price' => 25000000],
                ['name' => 'Dell XPS', 'price' => 18000000]
            ],
            'electronics.phones' => [
                ['name' => 'iPhone 15', 'price' => 12000000],
                ['name' => 'Samsung Galaxy', 'price' => 10000000],
                ['name' => 'Google Pixel', 'price' => 9000000]
            ],
            'furniture.chairs' => [
                ['name' => 'Office Chair Pro', 'price' => 2500000],
                ['name' => 'Gaming Chair', 'price' => 3500000],
                ['name' => 'Ergonomic Chair', 'price' => 4500000]
            ]
        ];

        $products = [];
        if ($subCategory && isset($mockProducts[$category . '.' . $subCategory])) {
            $products = $mockProducts[$category . '.' . $subCategory];
        } elseif (isset($categories[$category])) {
            // Get all products in category
            foreach ($categories[$category] as $sub) {
                $key = $category . '.' . $sub;
                if (isset($mockProducts[$key])) {
                    $products = array_merge($products, $mockProducts[$key]);
                }
            }
        }

        return view('practice.category-result', compact(
            'category', 'subCategory', 'products', 'categories'
        ));
    }

    // 3. Request Body Practice
    public function formForm()
    {
        return view('practice.body-form');
    }

    public function processFormData(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer|min:17|max:65',
            'gender' => 'required|in:male,female',
            'hobbies' => 'required|array|min:1',
            'hobbies.*' => 'string',
            'education' => 'required|in:sma,s1,s2,s3',
            'message' => 'nullable|string|max:500'
        ]);

        // Process data
        $hobbyCount = count($validated['hobbies']);
        $ageCategory = $validated['age'] < 25 ? 'Young' : 
                      ($validated['age'] < 40 ? 'Adult' : 'Senior');

        return view('practice.body-result', compact(
            'validated', 'hobbyCount', 'ageCategory'
        ));
    }

    public function createProductApi(Request $request)
    {
        // JSON API endpoint
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'tags' => 'array',
            'tags.*' => 'string',
            'in_stock' => 'boolean'
        ]);

        $product = array_merge($validated, [
            'id' => rand(1000, 9999),
            'created_at' => now()->format('Y-m-d H:i:s'),
            'status' => 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }

    // 4. File Upload Practice
    public function uploadForm()
    {
        return view('practice.upload-form');
    }

    public function uploadAvatar(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500'
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filesize = $file->getSize();
            $filetype = $file->getMimeType();
            
            // Simulasi storage (tanpa menyimpan ke disk)
            $path = 'storage/avatars/' . $filename;
            
            return view('practice.upload-result', compact(
                'filename', 'filesize', 'filetype', 'path', 'validated'
            ));
        }
        
        return back()->with('error', 'No file uploaded');
    }

    public function uploadMultipleFiles(Request $request)
    {
        $validated = $request->validate([
            'documents.*' => 'required|file|mimes:pdf,doc,docx,txt|max:10240',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'folder_name' => 'required|string|max:100'
        ]);

        $uploadedFiles = [];
        $totalSize = 0;

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $uploadedFiles[] = [
                    'name' => $document->getClientOriginalName(),
                    'size' => $document->getSize(),
                    'type' => $document->getMimeType(),
                    'category' => 'document'
                ];
                $totalSize += $document->getSize();
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uploadedFiles[] = [
                    'name' => $image->getClientOriginalName(),
                    'size' => $image->getSize(),
                    'type' => $image->getMimeType(),
                    'category' => 'image'
                ];
                $totalSize += $image->getSize();
            }
        }

        return view('practice.multi-upload-result', compact(
            'uploadedFiles', 'totalSize', 'validated'
        ));
    }

    // 5. Headers & Cookies Practice
    public function analyzeRequest(Request $request)
    {
        // Get headers
        $userAgent = $request->header('User-Agent', 'Unknown');
        $contentType = $request->header('Content-Type', 'Not specified');
        $authorization = $request->header('Authorization', 'Not provided');
        $acceptLanguage = $request->header('Accept-Language', 'Not specified');
        $customHeader = $request->header('X-Custom-Header', 'Not provided');

        // Get cookies
        $sessionId = $request->cookie('session_id', 'Not set');
        $userPreference = $request->cookie('user_preference', 'Not set');
        $lastVisit = $request->cookie('last_visit', 'First visit');

        // Parse user agent
        $browser = 'Unknown';
        if (strpos($userAgent, 'Chrome') !== false) $browser = 'Chrome';
        elseif (strpos($userAgent, 'Firefox') !== false) $browser = 'Firefox';
        elseif (strpos($userAgent, 'Safari') !== false) $browser = 'Safari';
        elseif (strpos($userAgent, 'Edge') !== false) $browser = 'Edge';

        // Set response with new cookies
        return response()->view('practice.headers-result', compact(
            'userAgent', 'contentType', 'authorization', 'acceptLanguage',
            'customHeader', 'sessionId', 'userPreference', 'lastVisit', 'browser'
        ))->cookie('current_visit', now()->format('Y-m-d H:i:s'), 60)
          ->cookie('page_views', ($request->cookie('page_views', 0) + 1), 60);
    }

    // 6. Mixed Methods Practice
    public function complexFormForm()
    {
        return view('practice.complex-form');
    }

    public function complexFormHandling(Request $request, $formId)
    {
        // POST /practice/forms/123/submit?source=web&version=2
        
        // Path variable
        $formId = $formId;
        
        // Query parameters
        $source = $request->query('source', 'unknown');
        $version = $request->query('version', '1.0');
        
        // Form data (request body)
        $formData = $request->all();
        
        // Headers
        $userAgent = $request->header('User-Agent', 'Unknown');
        $contentType = $request->header('Content-Type', 'Not specified');
        
        // Files
        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $attachments[] = [
                    'name' => $attachment->getClientOriginalName(),
                    'size' => $attachment->getSize(),
                    'type' => $attachment->getMimeType()
                ];
            }
        }
        
        // Cookies
        $userToken = $request->cookie('user_token', 'Not set');
        $sessionData = $request->cookie('session_data', 'Not set');

        // Process and analyze
        $dataSummary = [
            'form_id' => $formId,
            'source' => $source,
            'version' => $version,
            'input_count' => count($formData),
            'attachment_count' => count($attachments),
            'has_user_agent' => $userAgent !== 'Unknown',
            'is_json' => strpos($contentType, 'application/json') !== false,
            'has_token' => $userToken !== 'Not set'
        ];

        return view('practice.complex-result', compact(
            'formId', 'source', 'version', 'formData', 
            'userAgent', 'contentType', 'attachments', 
            'userToken', 'sessionData', 'dataSummary'
        ));
    }
}
