<?php

use App\Http\Controllers\BakerController;
use App\Http\Controllers\BiscuitController;
use App\Http\Controllers\RatingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', action: function () {
    return view('index');
})->name('home');
//bakers
Route::get( '/bakers', [BakerController::class,'index']) ->name('baker.index');
Route::get( '/bakers/create', [BakerController::class,'create']) ->name('baker.create');
Route::post( '/bakers/store', [BakerController::class,'store']) ->name('baker.store');
Route::delete( 'bakers/{id}', [BakerController::class,'destroy']) ->name('baker.destroy');
Route::get( 'bakers/{id}', [BakerController::class,'edit']) ->name('baker.edit');
Route::put( 'bakers/update/{id}', [BakerController::class,'update']) ->name('baker.update');
Route::post( 'bakers/', [BakerController::class,'search']) ->name('baker.search');

//biscuits
Route::get( '/biscuits', [BiscuitController::class,'index']) ->name('biscuit.index');
Route::get( '/biscuits/create', [BiscuitController::class,'create']) ->name('biscuit.create');
Route::post( '/biscuits/store', [BiscuitController::class,'store']) ->name('biscuit.store');
Route::delete( 'biscuits/{id}', [BiscuitController::class,'destroy']) ->name('biscuit.destroy');
Route::get( 'biscuits/{id}', [BiscuitController::class,'edit']) ->name('biscuit.edit');
Route::put( 'biscuits/update/{id}', [BiscuitController::class,'update']) ->name('biscuit.update');
Route::post( 'biscuits/', [BiscuitController::class,'search']) ->name('biscuit.search');

//ratings
Route::get( '/ratings', [RatingsController::class,'index']) ->name('rating.index');
Route::get( '/ratings/create', [RatingsController::class,'create']) ->name('rating.create');
Route::post( '/ratings/store', [RatingsController::class,'store']) ->name('rating.store');
Route::delete( 'ratings/{id}', [RatingsController::class,'destroy']) ->name('rating.destroy');
Route::get( 'ratings/{id}', [RatingsController::class,'edit']) ->name('rating.edit');
Route::put( 'ratings/update/{id}', [RatingsController::class,'update']) ->name('rating.update');
Route::post( 'ratings/', [RatingsController::class,'search']) ->name('rating.search');

