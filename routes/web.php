<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\ViewComposers\NavbarComposer;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// Route::get('/', function () {
//     // return view('welcome');
//     return view('product.home');
// });

Route::get('/dashboard', function () {

    $user_id = Auth::user()->id ;
    $userProductIds =  Product::where('user_id','=',$user_id)->pluck('id');

    $Cancel = Order::whereHas('products', function($query) use ($userProductIds) {
        $query->whereIn('products.id', $userProductIds);
    })->where('status', '=', 'cancel')->count();
   $Pending = Order::whereHas('products', function($query) use ($userProductIds) {
    $query->whereIn('products.id', $userProductIds);
})->where('status', '=', 'pending')->count();
   $Success =Order::whereHas('products', function($query) use ($userProductIds) {
    $query->whereIn('products.id', $userProductIds);
})->where('status', '=', 'success')->count();

$revenue  = Order::whereHas('products', function($query) use ($userProductIds) {
    $query->whereIn('products.id', $userProductIds);
})->where('status', '=', 'success')->sum('total_price');




    return view('admin.dashboard',compact('Pending', 'Cancel', 'Success','revenue'));
})->middleware(['auth', 'verified','checkrole'])->name('dashboard');

//! Login

Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//?Admin
Route::middleware('auth','verified')->prefix('admin')->group(function () {

    //! User
    Route::controller( AdminUserController::class)->prefix('users')->middleware('checkrole-admin')->name('admin.')->group(function(){
        Route::get('/','index')->name('users');
        Route::post('/updateRole/{id}','updateRole')->name('users.updateRole');
        Route::get('/add','add')->name('users.add');
        Route::post('/save','save')->name('users.save');
        Route::get('/edit/{id}','edit')->name('users.edit');
        Route::get('/delete/{id}','delete')->name('users.delete');
        Route::get('/restore/{id}','restore')->name('users.restore');
        Route::post('/update/{id}','update')->name('users.update');
        Route::get('/action/{action?}','action')->name('users.action');
    });

    //! Category
    Route::controller(CategoryController::class)->prefix('category')->middleware('checkrole-admin')->group(function () {
        Route::get('/', 'index')->name('category')->middleware('checkrole:show-category');
        Route::get('/add', 'add')->name('category.add');
        Route::post('/save', 'save')->name('category.save');
        Route::get('/edit/{id}', 'edit')->name('category.edit');
        Route::post('/update/{id}', 'update')->name('category.update');
        Route::get('/delete/{id}', 'delete')->name('category.delete');
        Route::get('/deleteSelect', 'deleteSelect')->name('admin.category.deleteSelect');
    });



    //!Product
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('/', 'index')->name('products');

        Route::get('add', 'add')->name('products.add');
        Route::post('add', 'save')->name('products.save');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::post('edit/{id}', 'update')->name('products.update');
        Route::get('delete/{id}', 'delete')->name('products.delete');
    });
    //!Order
    Route::controller(AdminOrderController::class)->prefix('orders')->group(function(){
        Route::get('','index')->name('admin.orders');
        Route::get('show/{status}','showByStatus')->name('admin.orders.show');
        Route::put('update-status/{id}', 'updateStatus')->name('updateStatus');
        Route::get('edit/{id}','edit')->name('admin.orders.edit');
        Route::get('update/{id}','update')->name('admin.orders.update');
        Route::get('delete/{id}','delete')->name('admin.orders.delete');
        Route::get('action','action')->name('admin.orders.action');
        Route::get('detail/{id}','detailOrder')->name('admin.orders.detailOrder');
    });
});





//? Home

Route::controller(HomeController::class)->prefix('/')->middleware('verifed-email')->group(function () {
    Route::get('', 'home')->name('home');
    Route::get('products', 'products')->name('home.products');
    Route::get('/category/{slug}', 'getProductByCategory')->name('getProductByCategory');
    Route::get('/detail/{id}', 'detailProduct')->name('detailProduct');
    Route::get('blog', 'blog')->name('blog');
    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');
});
//Cart
Route::middleware('auth','verifed-email')->controller(OrderController::class)->prefix('order')->group(function () {
    Route::get('', 'show')->name('cart.show');
    Route::post('add/{id}', 'add')->name('cart.add');
    Route::get('remove/{rowId?}', 'remove')->name('cart.remove');
    Route::put('update', 'update')->name('cart.update');
    Route::get('destroy', 'destroy')->name('cart.destroy');
    Route::post('pay', 'pay')->name('cart.pay')->middleware('checkout');
    Route::post('payOne/{id}', 'payOne')->name('cart.payOne');
    Route::post('delete/selected', 'deleteSelected')->name('cart.deleteSelected');


    Route::post('checkout','checkout')->name('cart.checkout');

});
  //! Deltail Order
Route::middleware('auth','verifed-email')->controller(DetailOrderController::class)->prefix('detailorder')->group(function () {
    Route::get('', 'index')->name('order.show');
    Route::get('cancel/{id}', 'cancel')->name('order.cancel');
    Route::post('delete/selected', 'deleteSelected')->name('order.deleteSelected');



});

// routes/web.php
Route::get('/autocomplete', [HomeController::class, 'autocomplete'])->name('autocomplete');


require __DIR__ . '/auth.php';
