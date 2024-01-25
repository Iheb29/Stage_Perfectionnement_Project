<?php
use App\Http\Controllers\ProduitApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products',[ProduitApiController::class,'getproduit']);
route::post('/addProduct',[ProduitApiController::class,'addProduit']);
route::delete('/deleteProduit/{id}',[ProduitApiController::class,'deleteProduit']);
Route::put('/UpdateProduit/{id}', [ProduitApiController::class,'UpdateProduit']);
Route::get('/getProduitById/{id}',[ProduitApiController::class,'getProduitById']);
