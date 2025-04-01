<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication\UserAuthController;
use App\Http\Controllers\todos\TodosController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

route::post('/signup',[UserAuthController::class,'register']);
route::post('/login',[UserAuthController::class,'login']);


route::group(['middleware' => 'auth:sanctum'], function(){
    route::get('all-todos',[TodosController::class,'index']);
route::post('create-todos',[TodosController::class,'store']);
route::put('update-todos/{id}',[TodosController::class,'update']);
route::delete('delete-todos/{id}',[TodosController::class,'destroy']);
});


