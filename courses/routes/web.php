<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categories\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\CheckAdminLoginMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Route;
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('process_login');
//Route::get('register', [AuthController::class, 'register'])->name('register');
//Route::post('register', [AuthController::class, 'processRegister'])->name('process_register');
Route::group(['middleware' => CheckLoginMiddleware::class], function(){
    Route::get('/', function (){ return view('index'); })->name('home');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('categories', CategoriesController::class)->except(['show', 'destroy',]);
    Route::get('categories/api', [CategoriesController::class, 'api'])->name('categories.api');
    Route::get('categories/api/name', [CategoriesController::class, 'apiName'])->name('categories.api.name');

    Route::resource('products', ProductsController::class)->except(['show', 'destroy',]);
    Route::get('products/api', [ProductsController::class, 'api'])->name('products.api');

    Route::group(['middleware' => CheckAdminLoginMiddleware::class], function(){
        Route::delete('categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
        Route::delete('products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
    });
});




