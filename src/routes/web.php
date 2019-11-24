<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();

// Admin routes
Route::prefix('admin')->group(function () {

    Route::get('/', 'HomeController@index')->name('admin-index');

    Route::post('search-producst', 'ProductController@searchProducts')->name('search-products');

    Route::prefix('catalogue')->group(function () {
        Route::get('/', 'CatalogueController@index')->name('admin.catalogue.index');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('admin.products.index');
        Route::get('/add', 'ProductController@add')->name('admin.products.add');
        Route::post('/addProduct', 'ProductController@addProduct')->name('admin.products.addProduct');
        Route::any('/edit/{productCode}', 'ProductController@editProduct')->name('admin.products.editProduct');
        Route::get('/delete/{productCode}', 'ProductController@deleteProduct')->name('admin.products.deleteProduct');
        Route::get('/export', 'ProductController@exportProducts')->name('admin.products.exportProducts');
    });
});
