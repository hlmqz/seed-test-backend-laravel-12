<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\Auth\LoginController::class)
->middleware('web')->group(function(){
	Route::post('/login', 'create');
	Route::delete('/login', 'delete');
});

Route::middleware(['web','auth:sanctum'])->group(function(){

	Route::controller(App\Http\Controllers\Auth\LoginController::class)
	->group(function(){
		Route::get('/login', 'read');
	});

	Route::controller(App\Http\Controllers\ProductController::class)
	->group(function(){
		Route::get('/products', 'list');
		Route::get('/product/{product}', 'read');
		Route::post('/product', 'create');
		Route::put('/product/{product}', 'update');
		Route::delete('/product/{product}', 'delete');
	});

});
