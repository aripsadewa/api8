<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', RegisterController::class);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', LogoutController::class);
Route::get('user', [UserController::class, 'index']);

Route::middleware('auth:api')->group(function () {
    Route::post('articles', [ArticleController::class, 'store']);
    Route::patch('articles/{article:slug}', [ArticleController::class, 'update']);
});

Route::get('articles/{article:slug}', [ArticleController::class, 'show']);
Route::get('articles', [ArticleController::class, 'index']);
