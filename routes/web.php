<?php

use App\models\Product; 
use App\Enums\Role;
use App\models\User;
use App\Http\Controllers\CatergoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', CatergoryController::class)
    ->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource(
        'user',
        \App\Http\Controllers\UserController::class
    );
});








/**
 * Product Routes
 */
 
 Route::resource(
    'product',
    \App\Http\Controllers\ProductController::class
);
 
 

 
/**
 * Admin Panel Routes
 */
 
/**
 * Dashboard
 */
 
Route::get('/admin/dashboard', function () {
    return view('windmill-admin.dashboard');
})->name('admin.dashboard');
 
 
/**
 * Users
 */
 
Route::get('/admin/user', function () {
    return view('windmill-admin.user.index', [
        'users' => User::orderBy('id','DESC')->paginate(10),
    ]);
})->name('admin.user.index');
 
 
/**
 * Products
 */
 
Route::get('/admin/product', function () {
    return view('windmill-admin.product.index', [
        'products' => \App\Models\Product::orderBy('id','DESC')->paginate(10),
    ]);
})->name('admin.product.index');
 