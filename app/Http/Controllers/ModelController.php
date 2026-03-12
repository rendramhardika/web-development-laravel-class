<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    public function dashboard()
    {
        return view('model.dashboard');
    }

    public function withoutModel()
    {
        $products = [
            ['id' => 1, 'name' => 'Laptop', 'price' => 15000000, 'stock' => 10],
            ['id' => 2, 'name' => 'Mouse', 'price' => 500000, 'stock' => 50],
            ['id' => 3, 'name' => 'Keyboard', 'price' => 750000, 'stock' => 30],
        ];

        $productId = 1;
        $selectedProduct = null;
        foreach ($products as $product) {
            if ($product['id'] == $productId) {
                $selectedProduct = $product;
                break;
            }
        }

        $discountPercentage = 10;
        $discountedPrice = $selectedProduct['price'] - ($selectedProduct['price'] * $discountPercentage / 100);

        $formattedPrice = 'Rp ' . number_format($selectedProduct['price'], 0, ',', '.');

        $isInStock = $selectedProduct['stock'] > 0;

        return view('model.without-model', compact('products', 'selectedProduct', 'discountedPrice', 'formattedPrice', 'isInStock'));
    }

    public function businessLogic()
    {
        $product = Product::first();
        
        if (!$product) {
            return view('model.business-logic', ['product' => null]);
        }

        $discount10 = $product->calculateDiscount(10);
        $discount20 = $product->calculateDiscount(20);
        $formattedPrice = $product->formatted_price;
        $inStock = $product->isInStock();
        $lowStock = $product->isLowStock();
        $canPurchase5 = $product->canBePurchased(5);

        return view('model.business-logic', compact('product', 'discount10', 'discount20', 'formattedPrice', 'inStock', 'lowStock', 'canPurchase5'));
    }

    public function validation()
    {
        return view('model.validation');
    }

    public function processValidation(Request $request)
    {
        $result = Product::validateProduct($request->all());
        
        if ($result['success']) {
            return back()->with('success', 'Validation passed! Product data is valid.');
        }
        
        return back()->withErrors($result['errors'])->withInput();
    }

    public function databaseIntro()
    {
        $rawQueryExample = "SELECT * FROM products WHERE category = 'Electronics'";
        $queryBuilderExample = "DB::table('products')->where('category', 'Electronics')->get()";
        $eloquentExample = "Product::where('category', 'Electronics')->get()";

        return view('model.database-intro', compact('rawQueryExample', 'queryBuilderExample', 'eloquentExample'));
    }

    public function databaseSetup()
    {
        $envExample = [
            'DB_CONNECTION' => 'mysql',
            'DB_HOST' => '127.0.0.1',
            'DB_PORT' => '3306',
            'DB_DATABASE' => 'laravel',
            'DB_USERNAME' => 'root',
            'DB_PASSWORD' => '',
        ];

        $drivers = ['MySQL', 'PostgreSQL', 'SQLite', 'SQL Server'];

        try {
            DB::connection()->getPdo();
            $connectionStatus = 'success';
            $connectionMessage = 'Database connection successful!';
        } catch (\Exception $e) {
            $connectionStatus = 'error';
            $connectionMessage = 'Database connection failed: ' . $e->getMessage();
        }

        return view('model.database-setup', compact('envExample', 'drivers', 'connectionStatus', 'connectionMessage'));
    }

    public function rawQuery()
    {
        $allProducts = DB::select('SELECT * FROM products LIMIT 5');
        
        $electronics = DB::select('SELECT * FROM products WHERE category = ? AND is_active = ?', ['Electronics', 1]);
        
        $productCount = DB::select('SELECT category, COUNT(*) as total FROM products GROUP BY category');

        return view('model.raw-query', compact('allProducts', 'electronics', 'productCount'));
    }

    public function queryBuilder()
    {
        $allProducts = DB::table('products')->limit(5)->get();
        
        $electronics = DB::table('products')
            ->where('category', 'Electronics')
            ->where('is_active', true)
            ->get();
        
        $productCount = DB::table('products')
            ->select('category', DB::raw('COUNT(*) as total'))
            ->groupBy('category')
            ->get();
        
        $orderedProducts = DB::table('products')
            ->orderBy('price', 'desc')
            ->limit(5)
            ->get();

        return view('model.query-builder', compact('allProducts', 'electronics', 'productCount', 'orderedProducts'));
    }

    public function eloquentOrm()
    {
        $allProducts = Product::limit(5)->get();
        
        $activeProducts = Product::active()->get();
        
        $inStockProducts = Product::inStock()->get();
        
        $electronics = Product::byCategory('Electronics')->get();
        
        $lowStockProducts = Product::lowStock(10)->get();
        
        $expensiveProducts = Product::where('price', '>', 1000000)
            ->orderBy('price', 'desc')
            ->limit(5)
            ->get();

        return view('model.eloquent-orm', compact(
            'allProducts',
            'activeProducts',
            'inStockProducts',
            'electronics',
            'lowStockProducts',
            'expensiveProducts'
        ));
    }
}
