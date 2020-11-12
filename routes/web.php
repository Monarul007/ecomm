<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PagesController@home')->name('index');
Route::match(['get','post'],'/contact-us','PagesController@contact')->name('pages.contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{url}', 'PagesController@details')->name('details');
Route::match(['get','post'],'/get_productdata','ProductsController@getProductData')->name('details.products.data');
Route::post('/send-price-request','PriceRequestController@requestPrice')->name('request.products.price');
Route::post('/send-contact-request','ContactRequestController@create')->name('request.contact.create');

Route::group(['middleware' => ['auth']], function(){

    //Categories Routes (Admin Panel)
    Route::match(['get','post'],'/admin/create-category','CategoryController@create')->name('admin.category.create');
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@edit');
    Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@delete');
    Route::get('/admin/view-categories', 'CategoryController@index')->name('admin.categories.view');

    //Products Routes (Admin Panel)
    Route::match(['get','post'],'/admin/create-product','ProductsController@create')->name('admin.products.create');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@edit');
    Route::match(['get','post'],'/admin/delete-product/{id}','ProductsController@delete');
    Route::get('/admin/view-products', 'ProductsController@index')->name('admin.products.view');

    //Price Requests
    Route::match(['get','post'],'/admin/price-requests','PriceRequestController@view')->name('price.request.view');

    //Contact Request
    Route::match(['get','post'],'/admin/contact-requests','ContactRequestController@view')->name('contact.request.view');

});
