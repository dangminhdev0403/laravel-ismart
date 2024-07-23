<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
//     return view('product.home');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//! Login

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//?Admin
Route::middleware('auth')->prefix('admin')->group(function () {

    //! Category
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('/', 'index')->name('category');
        Route::get('/add', 'add')->name('category.add');
        Route::post('/save', 'save')->name('category.save');
        Route::get('/edit/{id}', 'edit')->name('category.edit');
        Route::post('/update/{id}', 'update')->name('category.update');
        Route::get('/delete/{id}', 'delete')->name('category.delete');
    });
    //=====

    //! Brand
    Route::controller(BrandController::class)->prefix('brand')->group(function () {
        Route::get('/', 'index')->name('brand');
        Route::get('/add', 'add')->name('brand.add');
        Route::post('/save', 'save')->name('brand.save');
        Route::get('/edit/{id}', 'edit')->name('brand.edit');
        Route::post('/update/{id}', 'update')->name('brand.update');
        Route::get('/delete/{id}', 'delete')->name('brand.delete');
    });
    //=====
    //!Product
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('/', 'index')->name('products');

        Route::get('add', 'add')->name('products.add');
        Route::post('add', 'save')->name('products.save');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::post('edit/{id}', 'update')->name('products.update');
        Route::get('delete/{id}', 'delete')->name('products.delete');
    });
});





//? Home

Route::controller(HomeController::class)->prefix('/')->group(function () {
    Route::get('', 'home')->name('home');
    Route::get('products', 'products')->name('home.products');
    Route::get('/category/{slug}', 'getProductByCategory')->name('getProductByCategory');
    Route::get('/detail/{id}', 'detailProduct')->name('detailProduct');
    Route::get('blog', 'blog')->name('blog');
    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');
});
//Cart
Route::middleware('auth')->controller(OrderController::class)->prefix('oder')->group(function () {
    Route::get('', 'show')->name('cart.show');
    Route::get('add/{id}', 'add')->name('cart.add');
    Route::get('remove/{rowId?}', 'remove')->name('cart.remove');
    Route::put('update', 'update')->name('cart.update');
    Route::get('destroy', 'destroy')->name('cart.destroy');
    Route::get('pay', 'pay')->name('cart.pay');
});
require __DIR__ . '/auth.php';
