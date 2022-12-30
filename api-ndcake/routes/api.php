<?php
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
//API route để đăng ký
Route::post('/login', [AuthController::class, 'register']);
//API route để đăng nhập
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('categories', CategoriesController::class);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
// });
