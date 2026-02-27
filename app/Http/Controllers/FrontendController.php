<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display dashboard for frontend practice
     */
    public function dashboard()
    {
        return view('frontend.dashboard');
    }

    /**
     * Display MVC architecture explanation
     */
    public function architecture()
    {
        return view('frontend.architecture');
    }

    /**
     * Display basic Blade template practice
     */
    public function bladeBasic()
    {
        // Sample data for Blade practice
        $data = [
            'name' => 'John Doe',
            'age' => 25,
            'email' => 'john@example.com',
            'isLoggedIn' => false,
            'users' => ['Alice', 'Bob', 'Charlie'],
            'products' => [
                ['name' => 'Laptop', 'price' => 15000000],
                ['name' => 'Mouse', 'price' => 500000],
                ['name' => 'Keyboard', 'price' => 750000]
            ]
        ];

        return view('frontend.blade-basic', $data);
    }

    /**
     * Display layout and yield system practice
     */
    public function layouts()
    {
        $pageData = [
            'title' => 'Layout Practice',
            'header' => 'Welcome to Layout System',
            'content' => 'This is the main content area.',
            'footer' => '© 2024 Laravel Practice'
        ];

        return view('frontend.layouts', $pageData);
    }

    /**
     * Display section and include practice
     */
    public function sections()
    {
        $components = [
            'header' => 'This is header component',
            'sidebar' => 'This is sidebar component',
            'main' => 'This is main content component',
            'footer' => 'This is footer component'
        ];

        return view('frontend.sections', ['components' => $components]);
    }

    /**
     * Display Blade directives practice
     */
    public function directives()
    {
        $directiveData = [
            'users' => [
                ['name' => 'John', 'age' => 25, 'role' => 'admin'],
                ['name' => 'Jane', 'age' => 30, 'role' => 'user'],
                ['name' => 'Bob', 'age' => 35, 'role' => 'moderator']
            ],
            'isLoggedIn' => true,
            'userRole' => 'admin',
            'score' => 85,
            'posts' => ['Post 1', 'Post 2', 'Post 3', 'Post 4', 'Post 5'],
            'categories' => ['Technology', 'Science', 'Art', 'Music'],
            'showContent' => true,
            'userCount' => 3
        ];

        return view('frontend.directives', $directiveData);
    }

    /**
     * Display advanced Blade features
     */
    public function advanced()
    {
        $advancedData = [
            'currentUser' => [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'role' => 'admin'
            ],
            'settings' => [
                'theme' => 'dark',
                'notifications' => true,
                'language' => 'en'
            ],
            'formMethod' => 'PUT',
            'csrfToken' => csrf_token(),
            'apiEndpoint' => '/api/users',
            'users' => [
                ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'admin'],
                ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'user'],
                ['name' => 'Bob Johnson', 'email' => 'bob@example.com', 'role' => 'user']
            ],
            'products' => [
                ['name' => 'Laptop', 'price' => 15000000, 'category' => 'Electronics'],
                ['name' => 'Mouse', 'price' => 500000, 'category' => 'Accessories'],
                ['name' => 'Keyboard', 'price' => 750000, 'category' => 'Accessories']
            ],
            'posts' => [
                ['title' => 'Getting Started with Laravel', 'date' => '2024-01-15', 'author' => 'John'],
                ['title' => 'Blade Template Tips', 'date' => '2024-01-20', 'author' => 'Jane'],
                ['title' => 'Frontend Best Practices', 'date' => '2024-01-25', 'author' => 'Bob']
            ]
        ];

        return view('frontend.advanced', $advancedData);
    }
}
