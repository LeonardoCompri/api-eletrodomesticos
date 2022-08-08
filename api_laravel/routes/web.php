<?php

use App\Http\Controllers\ApplianceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ApplianceController::class, 'index'])->name('appliances');

Route::prefix('appliance')->group(function(){
    Route::get('/create', [ApplianceController::class, 'create'])->name('appliance.create');
    Route::post('/', [ApplianceController::class, 'store'])->name('appliance.store');

    Route::get('/{appliance}/edit', [ApplianceController::class, 'edit'])->name('appliance.edit');
    Route::put('/{appliance}', [ApplianceController::class, 'update'])->name('appliance.update');

    Route::get('/{appliance}/delete', [ApplianceController::class, 'destroy'])->name('appliance.delete');
});
