<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\WebpageController::class, 'home'])->name('home');
Route::get('/webapge/{name}/{id}', [App\Http\Controllers\WebpageController::class, 'ProductByCategory'])->name('webpage.product_by_category');
Route::post('/webapge/update', [App\Http\Controllers\WebpageController::class, 'update'])->name('webpage.changeProfile');
Route::post('/webpage/addToCart/', [App\Http\Controllers\WebpageController::class, 'addToCart'])->name('webpage.addCart');
Route::get('/webpage/remove//{id}', [App\Http\Controllers\WebpageController::class, 'removeCart'])->name('webpage.remove');



Auth::routes(['register' => true]);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    // dashboard route
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // user route 
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/active', [App\Http\Controllers\UserController::class, 'active'])->name('user.active');
    Route::get('/user/deleted', [App\Http\Controllers\UserController::class, 'deleted'])->name('user.deleted');

    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    Route::post('/user/save', [App\Http\Controllers\UserController::class, 'save'])->name('user.save');
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

    // slideshow route 
    Route::get('/slideshow', [App\Http\Controllers\SlideshowController::class, 'index'])->name('slideshow.index');
    Route::get('/slideshow/create', [App\Http\Controllers\SlideshowController::class, 'create'])->name('slideshow.create');
    Route::get('/slideshow/edit/{id}', [App\Http\Controllers\SlideshowController::class, 'edit'])->name('slideshow.edit');
    Route::get('/slideshow/delete/{id}', [App\Http\Controllers\SlideshowController::class, 'delete'])->name('slideshow.delete');
    Route::post('/slideshow/save', [App\Http\Controllers\SlideshowController::class, 'save'])->name('slideshow.save');
    Route::post('/slideshow/update', [App\Http\Controllers\SlideshowController::class, 'update'])->name('slideshow.update');

    // category route 
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/active', [App\Http\Controllers\CategoryController::class, 'active'])->name('category.active');
    Route::get('/category/deleted', [App\Http\Controllers\CategoryController::class, 'deleted'])->name('category.deleted');

    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
    Route::post('/category/save', [App\Http\Controllers\CategoryController::class, 'save'])->name('category.save');
    Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

    // product route 
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/product/active', [App\Http\Controllers\ProductController::class, 'active'])->name('product.active');
    Route::get('/product/deleted', [App\Http\Controllers\ProductController::class, 'deleted'])->name('product.deleted');

    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
    Route::post('/product/save', [App\Http\Controllers\ProductController::class, 'save'])->name('product.save');
    Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

    // pos
    Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.order');
    Route::post('/order/addToCart/', [App\Http\Controllers\OrderController::class, 'addToCart'])->name('order.addCart');
    Route::get('/order/remove//{id}', [App\Http\Controllers\OrderController::class, 'removeCart'])->name('order.remove');
    Route::get('/order/clear-all-cart', [App\Http\Controllers\OrderController::class, 'clearAllCart'])->name('order.clear');
    Route::post('order/save-order', [App\Http\Controllers\OrderController::class, 'saveOrder'])->name('order.save');

    // invoice 
    Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/detail/{id}', [App\Http\Controllers\InvoiceController::class, 'detail'])->name('invoice.detail');
    Route::get('/invoice/print/{id}', [App\Http\Controllers\InvoiceController::class, 'print'])->name('invoice.print');
});
