<?php

use App\Http\Controllers\ApplianceApiController;
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

Route::get('/appliances', [ApplianceApiController::class, 'index']);

Route::prefix('appliance')->group(function(){
    Route::post('/store', [ApplianceApiController::class, 'store']);

    Route::get('/{appliance}/edit', [ApplianceApiController::class, 'edit']);
    Route::put('/{appliance}', [ApplianceApiController::class, 'update']);

    Route::delete('/{appliance}/delete', [ApplianceApiController::class, 'destroy']);
});
