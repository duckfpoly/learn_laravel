<?php

use App\Http\Controllers\categories\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){ return view('index'); })->name('home');
Route::get('/sign_in', function (){ return view('accounts.signin'); });
Route::get('/sign_up', function (){ return view('accounts.signup'); });

Route::resource('categories',CategoriesController::class);
Route::resource('products', ProductsController::class);
