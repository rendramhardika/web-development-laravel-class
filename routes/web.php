<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebProgrammingController;
use App\Http\Controllers\DataHandlingController;
use App\Http\Controllers\FrontendController;

Route::get('/', function () {
    return view('welcome');
});

// Web Programming Routes
Route::get('/web-programming', [WebProgrammingController::class, 'index'])->name('web-programming.index');

// Contact Form Routes
Route::get('/contacts', [WebProgrammingController::class, 'showContactForm'])->name('contacts.form');
Route::post('/contacts', [WebProgrammingController::class, 'storeContact'])->name('contacts.store');

// Data Handling Practice Routes
Route::get('/practice/dashboard', [DataHandlingController::class, 'dashboard'])->name('practice.dashboard');

// Query Parameter Practice
Route::get('/practice/query-form', [DataHandlingController::class, 'searchForm'])->name('practice.query.form');
Route::get('/practice/search', [DataHandlingController::class, 'searchProducts'])->name('practice.search');

// Path Variable Practice
Route::get('/practice/path-form', [DataHandlingController::class, 'userForm'])->name('practice.path.form');
Route::get('/practice/users/{userId}/profile/{section?}', [DataHandlingController::class, 'getUserProfile'])->name('practice.user.profile');
Route::get('/practice/products/{category}/{subCategory?}', [DataHandlingController::class, 'getCategoryProducts'])->name('practice.category.products');

// Request Body Practice
Route::get('/practice/body-form', [DataHandlingController::class, 'formForm'])->name('practice.body.form');
Route::post('/practice/process-form', [DataHandlingController::class, 'processFormData'])->name('practice.body.process');
Route::post('/practice/api/products', [DataHandlingController::class, 'createProductApi'])->name('practice.api.products');

// File Upload Practice
Route::get('/practice/upload-form', [DataHandlingController::class, 'uploadForm'])->name('practice.upload.form');
Route::post('/practice/upload/avatar', [DataHandlingController::class, 'uploadAvatar'])->name('practice.upload.avatar');
Route::post('/practice/upload/multiple', [DataHandlingController::class, 'uploadMultipleFiles'])->name('practice.upload.multiple');

// Headers & Cookies Practice
Route::get('/practice/analyze-request', [DataHandlingController::class, 'analyzeRequest'])->name('practice.analyze.request');

// Mixed Methods Practice
Route::get('/practice/complex-form', [DataHandlingController::class, 'complexFormForm'])->name('practice.complex.form');
Route::post('/practice/forms/{formId}/submit', [DataHandlingController::class, 'complexFormHandling'])->name('practice.complex.submit');

// Frontend Development Routes (Course 3)
Route::get('/frontend/dashboard', [FrontendController::class, 'dashboard'])->name('frontend.dashboard');
Route::get('/frontend/architecture', [FrontendController::class, 'architecture'])->name('frontend.architecture');
Route::get('/frontend/blade-basic', [FrontendController::class, 'bladeBasic'])->name('frontend.blade-basic');
Route::get('/frontend/layouts', [FrontendController::class, 'layouts'])->name('frontend.layouts');
Route::get('/frontend/sections', [FrontendController::class, 'sections'])->name('frontend.sections');
Route::get('/frontend/directives', [FrontendController::class, 'directives'])->name('frontend.directives');
Route::get('/frontend/advanced', [FrontendController::class, 'advanced'])->name('frontend.advanced');
