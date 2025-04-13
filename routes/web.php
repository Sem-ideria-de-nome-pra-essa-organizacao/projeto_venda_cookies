<?php

use App\Http\Controllers\BakerController;
use Illuminate\Support\Facades\Route;

Route::get('/', action: function () {
    return view('index');
});

Route::get( '/bakers', [BakerController::class,'index']) ->name('baker.index');
Route::get( '/bakers/create', [BakerController::class,'create']) ->name('baker.create');
Route::post( '/bakers/store', [BakerController::class,'store']) ->name('baker.store');
Route::delete( 'bakers/{id}', [BakerController::class,'destroy']) ->name('baker.destroy');
Route::get( 'bakers/{id}', [BakerController::class,'edit']) ->name('baker.edit');
Route::put( 'bakers/update/{id}', [BakerController::class,'update']) ->name('baker.update');
Route::post( 'bakers/', [BakerController::class,'search']) ->name('baker.search');
