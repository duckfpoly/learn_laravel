<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categories\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\CheckAdminLoginMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('process_login');

Route::group(['middleware' => CheckLoginMiddleware::class],function (){
    Route::get('categories/api', [CategoriesController::class, 'api'])->name('categories.api');
    Route::get('/', function (){ return view('index'); })->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('categories',CategoriesController::class);
    Route::resource('products', ProductsController::class);
});

Route::group(['middleware' => CheckAdminLoginMiddleware::class],function (){
    Route::get('categories/api', [CategoriesController::class, 'api'])->name('categories.api');
    Route::get('/', function (){ return view('index'); })->name('home');
    Route::resource('categories',CategoriesController::class);
    Route::resource('products', ProductsController::class);
});

