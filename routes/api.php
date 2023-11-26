<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpirationdateController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Models\Expirationdate;
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


Route::get('/medicines',[MedicineController::class,'index']);
Route::get('/medicines/{id_medicine}',[MedicineController::class,'show_medicine']);
Route::get('/medicines/category/{id_category}',[MedicineController::class,'show']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/medicines/search/{name}',[MedicineController::class,'search']);
Route::get('/category/search/{name}',[CategoryController::class,'search']);
Route::get('/expirationdate/{id}',[ExpirationdateController::class,'quantity']);


Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/category',[CategoryController::class,'create']);
    Route::post('/medicines',[MedicineController::class,'create']);
    Route::post('/expirationdate',[ExpirationdateController::class,'create']);
    Route::post('/medicines/{id_medicine}',[MedicineController::class,'update']);
    Route::delete('/medicines/{id_medicine}',[MedicineController::class,'destroy']);
    Route::delete('/category/{id_category}',[CategoryController::class,'destroy']);
    Route::post('/category/{id}',[CategoryController::class,'update']);

});

Route::post('/order',[OrderController::class,'create']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
