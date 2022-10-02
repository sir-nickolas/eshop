<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;


Route::group(['middleware' => ['web']], function () {

    Route::get('/', [ProductController::class, 'index'])->name('welcome');
    Route::get('view-category/{id}', [ProductController::class, 'viewCategory']);
    Route::get('register', [RegisterController::class, 'viewRegisterForm']);
    Route::post('register', [RegisterController::class, 'registerNewUser']);
    Route::get('login', [SessionsController::class, 'viewLoginForm'])->name('login');
    Route::post('login', [SessionsController::class, 'userLogin']);
    Route::get('logout', [SessionsController::class, 'userLogOut']);
    Route::get("details/{id}", [ProductController::class, 'viewProductDetails']);
    Route::post('add-to-cart', [CartController::class, 'addProduct']);
    Route::get("cart", [CartController::class, 'viewcart']);
    Route::post("update-cart", [CartController::class, 'updatecart']);
    Route::post("remove-cart-item", [CartController::class, 'removeFromCart']);
    Route::get("checkout", [CheckoutController::class, 'index']);
    Route::post("place-order", [CheckoutController::class, 'placeorder']);
    Route::get('myorders', [UserController::class, 'viewMyOrders']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
    Route::get('about-us', [UserController::class, 'viewAboutUs']);

    Route::group(['middleware' => ['auth', 'isAdmin']], function () {

        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('adminIndex');
        Route::get('add-category', [AdminController::class, 'viewCategoryInsertForm']);
        Route::post('insert-category', [AdminController::class, 'insertCategory']);
        Route::get('view-categories', [AdminController::class, 'categoriesIndex']);
        Route::get('edit-category/{id}', [AdminController::class, 'editCategory']);
        Route::post('update-category/{id}', [AdminController::class, 'updateCategory']);
        Route::get('delete-category/{id}', [AdminController::class, 'deleteCategory']);
        Route::get('view-products', [AdminController::class, 'productsIndex']);
        Route::get('add-product', [AdminController::class, 'viewProductInsertForm']);
        Route::post('insert-product', [AdminController::class, 'insertProduct']);
        Route::get('edit-product/{id}', [AdminController::class, 'editProduct']);
        Route::post('update-product/{id}', [AdminController::class, 'updateProduct']);
        Route::get('delete-product/{id}', [AdminController::class, 'deleteProduct']);
    });

});