<?php

use App\Models\Admin\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OptionController;

use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\OptionValueController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Web\WebProductController;
use App\Http\Controllers\Admin\AdminLoginController;


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
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('Web.Pages.index');
});

Route::group(['prefix'=>'Admin'],function(){

        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login')->middleware('admin.guest');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate')->middleware('admin.guest');

    Route::group(['middleware'=>'admin.auth'],function(){

        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
    });
});




    Route::group(['middleware'=>'guest'],function(){
        Route::get('/auth-register',[AuthController::class,'register'])->name('auth.register');
        Route::post('/process-register',[AuthController::class,'processRegister'])->name('auth.processRegister');


       Route::get('/login-auth',[AuthController::class,'login'])->name('auth.login');
        Route::post('/login-auth',[AuthController::class,'authenticate'])->name('auth.authenticate');



    });
    Route::get('/profile',[WebController::class,'index'])->name('profile');

    Route::group(['middleware'=>'auth'],function(){

     //   Route::get('/profile',[WebController::class,'index'])->name('profile');
        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
    });



Route::resource('categories',CategoryController::class);
Route::resource('states',StateController::class);
Route::resource('options',OptionController::class);
Route::resource('optionvalues',OptionValueController::class);
Route::resource('products',ProductController::class);

Route::get('web/products',[WebProductController::class,'index'])->name('product.index');
Route::get('search',[WebProductController::class,'search'])->name('search');
Route::get('filterByCategory/{category}',[WebProductController::class,'filterByCategory'])->name('filterByCategory');
Route::get('productDetail/{id}',[WebProductController::class,'productDetail'])->name('productDetail');
Route::post('/product/{product}/review',[WebProductController::class,'review'])->name('product.review');
Route::post('/add-to-favorites/{product}', [WebProductController::class, 'addToFavorites'])->name('add-to-favorites')->middleware('auth');


Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

Route::resource('orders',OrderController::class);
Route::resource('payments',PaymentController::class);

Route::get('pages/{type}', [PageController::class, 'pages'])->name('pages');
Route::get('/', [PageController::class, 'index']);



Route::get('/profile{lang?}',function($lang="en"){
    App::SetLocale($lang);
    return view('Web.Pages.index');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
