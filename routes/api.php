<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\Auth\LoginController::class)
->group(function(){
	Route::post('/login', 'create');
	Route::delete('/login', 'delete');
});

Route::middleware('auth:sanctum')->group(function(){

	Route::controller(App\Http\Controllers\Auth\LoginController::class)
	->group(function(){
		Route::get('/login', 'read');
	});

});
