<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use Faker\Guesser\Name;

Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login', [LoginController::class, 'store']);
Route::get('admin/register', [LoginController::class, 'Register']);
Route::post('admin/register', [LoginController::class, 'userRegister']);
Route::get('admin/logout', [LoginController::class, 'logout']);


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #user
        Route::resource('users', UserController::class)->shallow();
        Route::get('listUser', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create']);
        Route::post('create', [UserController::class, 'store']);
        Route::get('/active/update', [UserController::class,'updateStatus'])->name('users.update.active');
        Route::get('user-profile', [UserController::class, 'userProfile']);
        Route::post('user-profile', [UserController::class, 'updateUserProfile']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->name('product.')->group(function () {
            Route::get('add', [ProductController::class, 'create'])->name('create');
            Route::post('add', [ProductController::class, 'store'])->name('store');
            Route::get('list', [ProductController::class, 'index'])->name('index');
            Route::get('edit/{id}', [ProductController::class, 'show'])->name('edit');
            Route::post('edit/{id}', [ProductController::class, 'update'])->name('update');
            Route::DELETE('destroy', [ProductController::class, 'destroy'])->name('destroy');
        });

        #Slider
        Route::prefix('sliders')->name('slider.')->group(function () {
            Route::get('add', [SliderController::class, 'create'])->name('create');
            Route::post('add', [SliderController::class, 'store'])->name('store');
            Route::get('list', [SliderController::class, 'index'])->name('index');
            Route::get('edit/{id}', [SliderController::class, 'show'])->name('edit');
            Route::post('edit/{id}', [SliderController::class, 'update'])->name('update');
            Route::DELETE('destroy', [SliderController::class, 'destroy'])->name('destroy');
        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

// login
Route::get('login', [App\Http\Controllers\LoginUserController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\LoginUserController::class, 'login']);
Route::get('register', [App\Http\Controllers\LoginUserController::class, 'registerForm'])->name('register');
Route::post('register', [App\Http\Controllers\LoginUserController::class, 'register']);
Route::get('logout', [App\Http\Controllers\LoginUserController::class, 'logout'])->name('logout');

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('search', [App\Http\Controllers\MainController::class, 'search'])->name('search');

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index'])->name('add-cart');
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::get('carts/clear', [App\Http\Controllers\CartController::class, 'clear']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart'])->name('checkoutPost');
Route::get('checkout', [App\Http\Controllers\CartController::class, 'CheckoutForm'])->name('checkout');
