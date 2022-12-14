<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\SocialiteAuthController;
use App\Http\Controllers\Auth\SocialAccountController;
use App\Http\Controllers\ContactController;

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
// })->name('home');

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
	],
	function () { //...

		Auth::routes();
		Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		// Route::get('/test', [App\Http\Controllers\HomeController::class, 'test']);
		Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
		Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
		Route::get('/clients', [App\Http\Controllers\HomeController::class, 'clients'])->name('clients');
		Route::get('category/{id}', [App\Http\Controllers\HomeController::class, 'CategoryIndex'])->name('category');
		Route::get('product/{id}', [App\Http\Controllers\HomeController::class, 'ProductIndex'])->name('product');
		Route::get('/product-search', [App\Http\Controllers\HomeController::class,  'search'])->name('search');
		// Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
		Route::resource('/contact', App\Http\Controllers\ContactController::class)->except('contact.show');


		Route::get('/login/{provider}', [SocialAccountController::class, 'redirectToProvider'])->name('google');
		Route::get('/login/{provider}/callback', [SocialAccountController::class, 'handleProviderCallback']);
		// Route::get('google', [SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
		// Route::get('/auth/google-callback', [SocialiteAuthController::class, 'loginWithGoogle']);

		Auth::routes();

		Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

			Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
			Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
			Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
			Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
			Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
			Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
			Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
			Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
			Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
			Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
			Route::resource('/categories', CategoriesController::class);
			Route::resource('/products', ProductsController::class)->except('show');
			Route::resource('/offer', OffersController::class);
		});

		Route::group(['middleware' => 'auth'], function () {

			Route::get('add-to-cart/{id}', [ProductsController::class,  'addToCart'])->name('addCart');
			Route::get('checkout', [ProductsController::class,  'cartList'])->name('cartList');
			Route::get('cartSide', [ProductsController::class,  'cartSide'])->name('cartSide');
			Route::get('remove-cart/{id}', [ProductsController::class,  'removeCart'])->name('removeCart');
			Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
			Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
			Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
			Route::get('edit-account', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('editProfile');
			Route::get('orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
		});
	}
);



Route::get('/login/{provider}', [SocialAccountController::class, 'redirectToProvider'])->name('google');
Route::get('/login/{provider}/callback', [SocialAccountController::class, 'handleProviderCallback']);
// Route::get('google', [SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
// Route::get('/auth/google-callback', [SocialiteAuthController::class, 'loginWithGoogle']);

Auth::routes();

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

	Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
	Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
	Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
	Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
	Route::resource('/categories', CategoriesController::class);
	Route::resource('/products', ProductsController::class)->except('show');
	Route::resource('/offer', OffersController::class);
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('add-to-cart/{id}', [ProductsController::class,  'addToCart'])->name('addCart');
	Route::get('checkout', [ProductsController::class,  'cartList'])->name('cartList');
	Route::get('cartSide', [ProductsController::class,  'cartSide'])->name('cartSide');
	Route::get('remove-cart/{id}', [ProductsController::class,  'removeCart'])->name('removeCart');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

