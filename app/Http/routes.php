<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', ['as' => 'homePage', 'uses' => 'productController@home']);
Route::post('quick_view', ['as' => 'quick_view', 'uses' => 'productController@quick_view']);
Route::post('addTo', ['as' => 'addTo', 'uses' => 'productController@addTo']);
Route::post('remove', ['as' => 'removeCart', 'uses' => 'productController@removeCart']);
Route::post('getCart', ['as' => 'getCart', 'uses' => 'productController@getCart']);
Route::post('getInfo', ['as' => 'getInfo', 'uses' => 'profileController@getInfo']);
Route::put('checkout', ['as' => 'checkoutStore', 'uses' => 'profileController@checkoutStore','middleware' => 'auth']);
Route::get('orderComplete/{id}', ['as' => 'orderComplete', 'uses' => 'profileController@orderComplete','middleware' => 'auth']);

Route::post('api/check_user', ['as' => 'check_user', 'uses' => 'profileController@check_user']);
Route::post('newsletter', ['as' => 'newsletter', 'uses' => 'profileController@newsletter']);


Route::get('category/{name}', ['as' => 'category', 'uses' => 'productController@category']);
Route::get('group/{name}', ['as' => 'group', 'uses' => 'productController@group']);
Route::get('products/{name}', ['as' => 'products', 'uses' => 'productController@products']);
Route::get('product/{name}', ['as' => 'product', 'uses' => 'productController@product']);
Route::post('products/{name}', ['as' => 'productFilter', 'uses' => 'productController@productFilter']);

Route::get('search/{name}', ['as' => 'search', 'uses' => 'productController@search']);

Route::get('products/{name}/{price?}/{color?}/{brand?}/{size?}', ['as' => 'productRedirect', 'uses' => 'productController@productRedirect'])
			->where('price', 'price\:[0-9]*,[0-9]*')
			->where('color', 'color\:[0-9,]*')
			->where('size', 'size\:[0-9,]*')
			->where('brand', 'brand\:[a-z A-Z0-9,]*');
			
			
Route::get('brand/{name}', ['as' => 'brand', 'uses' => 'productController@brand']);
Route::get('sitemap', ['as' => 'sitemap', 'uses' => 'productController@sitemap']);
Route::get('compare', ['as' => 'compare', 'uses' => 'productController@compare']);
Route::get('wishlist', ['as' => 'wishlist', 'uses' => 'productController@wishlist']);
Route::get('contact', ['as' => 'contact', 'uses' => 'productController@contact']);



// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('success', 'Auth\AuthController@success');
Route::get('profile', ['uses' => 'profileController@profile','middleware' => 'auth']);
Route::post('profile', ['uses' => 'profileController@postProfile','middleware' => 'auth']);
Route::get('cart', ['uses' => 'profileController@cart','middleware' => 'auth']);
Route::get('myOrders', ['uses' => 'profileController@myOrders','middleware' => 'auth']);
Route::get('myAddress', ['uses' => 'profileController@myAddress','middleware' => 'auth']);
Route::delete('deleteAddress/{id}', ['as'=> 'addressDelete', 'uses' => 'profileController@deleteAddress','middleware' => 'auth']);


Route::get('about', ['as' => 'about', 'uses' => 'profileController@about']);
Route::get('delivery', ['as' => 'delivery', 'uses' => 'profileController@about']);
Route::get('privacy', ['as' => 'privacy', 'uses' => 'profileController@about']);
Route::get('terms', ['as' => 'terms', 'uses' => 'profileController@about']);
Route::get('returns', ['as' => 'returns', 'uses' => 'profileController@about']);
Route::get('careers', ['as' => 'careers', 'uses' => 'profileController@about']);
Route::get('google80dc3a28d61d7b05.html', ['as' => 'google', 'uses' => 'profileController@google']);




Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
			

// Display all SQL executed in Eloquent
Event::listen('illuminate.query', function($query)
{
    // var_dump($query);echo "<hr>";
});
// Route::get('category/{name}', ['as' => 'category', 'uses' => 'productController@category'])->where('name', '[A-Za-z0-9\-]*\-([0-9]+)');
