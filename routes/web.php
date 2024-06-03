<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\BlogsController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\MailController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/index', function () {
//     return view('admin.dashboard.index');
// });

// Route::get('/profile', function () {
//     return view('admin.user.pages-profile');
// });




// /admin/dashboard
// /admin/profile


// Route::get('/admin/profile',[UserController::class, "index"]);

// Route::get('/admin/profile',[UserController::class, "add"]); //=> controller -> view
// Route::post('/admin/profile',[UserController::class, "insert"]); //view -> controller de insert


// Route::get('/admin/profile/{id}',[UserController::class, "remove"]);

Route::get('/frontend/index',[HomeController::class, "index"]);


Route::get('/frontend/register',[MemberController::class, "add"]);
Route::post('/frontend/register',[MemberController::class, "insert"]);
Route::get('/frontend/login',[MemberController::class, "getLogin"]);
Route::post('/frontend/login',[MemberController::class, "postLogin"]);
Route::get('/frontend/logout',[MemberController::class, "logout"]);

Route::get('/frontend/blog/list',[BlogsController::class, "list"]);
Route::get('/frontend/blog/detail/{id}',[BlogsController::class, "detail"]);
Route::post('/frontend/blog/rate/ajax',[BlogsController::class, "rate"]);
Route::post('/frontend/blog/cmt',[BlogsController::class, "cmt"]);

Route::get('/frontend/account/update/{id}',[MemberController::class, "account_edit"]);
Route::post('/frontend/account/update/{id}',[MemberController::class, "account_update"]);

Route::get('/frontend/account/my-product',[ProductController::class, "list"]);
Route::get('/frontend/account/detail-product/{id}',[ProductController::class, "detail"]);
Route::get('/frontend/account/edit-product/{id}',[ProductController::class, "edit"]);
Route::post('/frontend/account/edit-product/{id}',[ProductController::class, "update"]);
Route::get('/frontend/account/add-product',[ProductController::class, "add"]);
Route::post('/frontend/account/add-product',[ProductController::class, "insert"]);


Route::get('/frontend/account/list-category',[CategoryController::class, "listCategory"]);
Route::get('/frontend/account/add-category',[CategoryController::class, "addCategory"]);
Route::post('/frontend/account/add-category',[CategoryController::class, "insertCategory"]); 
Route::get('/frontend/account/delete-category/{id}',[CategoryController::class, "removeCategory"]);

Route::get('/frontend/account/list-brand',[CategoryController::class, "listBrand"]);
Route::get('/frontend/account/add-brand',[CategoryController::class, "addBrand"]);
Route::post('/frontend/account/add-brand',[CategoryController::class, "insertBrand"]); 
Route::get('/frontend/account/delete-brand/{id}',[CategoryController::class, "removeBrand"]);

Route::post('/frontend/account/ajax',[DetailController::class, "ajax"]);
Route::get('/frontend/member/cart',[DetailController::class, "cart"]);
Route::post('/frontend/account/ajax_up',[DetailController::class, "up"]);
Route::post('/frontend/account/ajax_down',[DetailController::class, "down"]);
Route::post('/frontend/account/ajax_delete',[DetailController::class, "delete"]);

Route::get('/frontend/member/checkout',[ProductController::class, "checkout"]);

Route::get('/mail',[MailController::class, "getMail"]);
Route::post('/mail',[MailController::class, "postMail"]);

Route::post('/frontend/search',[HomeController::class, "search"]);

Route::get('/frontend/search_advanced',[HomeController::class, "searchs"]);
Route::post('/frontend/search_advanced',[HomeController::class, "handleSearch"]);






// admin
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/dashboard',[DashboardController::class, "index"]);


Route::get('/admin/profile',[UserController::class, "edit"]); //=> controller -> view
Route::post('/admin/profile',[UserController::class, "update"]); //visew -> controller de update


Route::get('/admin/country/list',[CountryController::class, "list"]);
Route::get('/admin/country/add',[CountryController::class, "add"]);
Route::post('/admin/country/add',[CountryController::class, "insert"]); 
Route::get('/admin/country/delete/{id}',[CountryController::class, "delete"]);


Route::get('/admin/blog/list',[BlogController::class, "list"]);
Route::get('/admin/blog/add',[BlogController::class, "add"]);
Route::post('/admin/blog/add',[BlogController::class, "insert"]);
Route::get('/admin/blog/edit/{id}',[BlogController::class, "edit"]);
Route::post('/admin/blog/edit/{id}',[BlogController::class, "update"]);
Route::get('/admin/blog/delete/{id}',[BlogController::class, "delete"]);





