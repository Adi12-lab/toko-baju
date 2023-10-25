<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function()  {
    Route::get('/', 'index')->name('home');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/{slug}', 'productView')->name('product.view');
    Route::get("/categories/{category:slug}", "categoryProducts")->name('category.products');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/mahmudaMessages', 'messages');
});
