<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Admin\AdminPostController;
use App\Http\Controllers\Api\V1\Admin\AdminPostCategoryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::prefix('admin')->group(function () {
       Route::resource('post', AdminPostController::class)->except(['create', 'edit']); 
       Route::resource('postCategory', AdminPostCategoryController::class)->except(['create', 'edit']); 
    });
});
