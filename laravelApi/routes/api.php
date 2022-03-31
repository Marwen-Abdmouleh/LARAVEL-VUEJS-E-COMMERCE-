<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProduitsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products',function(){
return 'testing';
});


Route::get('categories',[CategoriesController::class,'index'] );
Route::get('categorie/{id}',[CategoriesController::class,'show'] );
Route::post('categorie',[CategoriesController::class,'store'] );
Route::put('categorie/{id}',[CategoriesController::class,'update'] );
Route::delete('categorie/{id}',[CategoriesController::class,'destroy'] );


Route::get('produits', [ProduitsController::class,'index'] );
Route::get('produit/{id}', [ProduitsController::class,'show'] );
Route::post('produit', [ProduitsController::class,'store'] );
Route::put('produit/{id}', [ProduitsController::class,'update']);
Route::delete('produit/{id}' ,[ProduitsController::class,'destroy' ]) ;


