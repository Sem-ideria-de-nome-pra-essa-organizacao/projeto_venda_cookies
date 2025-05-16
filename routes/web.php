<?php

use App\Http\Controllers\BakerBiscuitController;
use App\Http\Controllers\BakerController;
use App\Http\Controllers\BiscuitController;
use App\Http\Controllers\ClientController;
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

//clients
Route::get( '/clients', [ClientController::class,'index']) ->name('client.index');
Route::get( '/clients/create', [ClientController::class,'create']) ->name('client.create');
Route::post( '/clients/store', [ClientController::class,'store']) ->name('client.store');
Route::delete( 'clients/{id}', [ClientController::class,'destroy']) ->name('client.destroy');
Route::get( 'clients/{id}', [ClientController::class,'edit']) ->name('client.edit');
Route::put( 'clients/update/{id}', [ClientController::class,'update']) ->name('client.update');
Route::post( 'clients/', [ClientController::class,'search']) ->name('client.search');

Route::get( 'bakers/biscuits/{baker}', [BakerBiscuitController::class,'index']) ->name('bakerbiscuit.index');
Route::get( 'bakers/biscuits/{baker}/create', [BakerBiscuitController::class,'create']) ->name('bakerbiscuit.create');
Route::post( 'bakers/biscuits/store', [BakerBiscuitController::class,'store']) ->name('bakerbiscuit.store');
Route::delete( 'bakers/biscuits/{baker}/{id}', [BakerBiscuitController::class,'destroy']) ->name('bakerbiscuit.destroy');
Route::get( 'bakers/biscuits/{baker}/{id}', [BakerBiscuitController::class,'edit']) ->name('bakerbiscuit.edit');
Route::put( 'bakers/biscuits/update/{id}', [BakerBiscuitController::class,'update']) ->name('bakerbiscuit.update');
Route::post( 'bakers/biscuits/{baker}/', [BakerBiscuitController::class,'search']) ->name('bakerbiscuit.search');
