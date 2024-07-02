<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('product.home');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
//=====






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
