<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('/add-product', [ApiController::class, 'add_product']);
Route::get('/view-product', [ApiController::class, 'view_product']);
Route::get('/delete-product/{id}', [ApiController::class, 'delete_product']);
Route::get('/edit-product/{id}', [ApiController::class, 'edit_product']);

Route::post('/update-product/{id}', [ApiController::class, 'update_product']);
