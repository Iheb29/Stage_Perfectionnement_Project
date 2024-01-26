<?php
use App\Http\Controllers\ProduitApiController;
use App\Http\Controllers\CommandeApiController;
use App\Http\Controllers\UserApiController;
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
Route::post('/addProduct',[ProduitApiController::class,'addProduit']);
route::delete('/deleteProduit/{id}',[ProduitApiController::class,'deleteProduit']);
Route::post('/UpdateProduit/{id}', [ProduitApiController::class,'UpdateProduit']);
Route::get('/getProduitById/{id}',[ProduitApiController::class,'getProduitById']);


Route::get('/Commandes',[CommandeApiController::class,'getCommandes']);
Route::post('/addCommande',[CommandeApiController::class,'addCommande']);
route::delete('/deleteCommande/{id}',[CommandeApiController::class,'deleteCommande']);
Route::put('/UpdateCommande/{id}', [CommandeApiController::class,'UpdateCommande']);
Route::get('/getCommandeById/{id}',[CommandeApiController::class,'getCommandeById']);


Route::get('/Users',[UserApiController::class,'getUsers']);
Route::post('/addUser',[UserApiController::class,'addUser']);
route::delete('/deleteUser/{id}',[UserApiController::class,'deleteUSer']);
Route::put('/UpdateUser/{id}', [UserApiController::class,'UpdateCommande']);
Route::get('/getUserById/{id}',[UserApiController::class,'getUserById']);


