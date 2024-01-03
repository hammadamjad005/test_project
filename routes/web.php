<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //permission routing 
    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'show']);
    Route::get('/add-permission', [App\Http\Controllers\PermissionController::class, 'view']);
    Route::post('/store-permission', [App\Http\Controllers\PermissionController::class, 'store']);
    Route::delete('/delete-permission/{id}', [App\Http\Controllers\PermissionController::class, 'delete']);
    
    
    //role routing 
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'show']);
    Route::get('/add-role', [App\Http\Controllers\RoleController::class, 'view']);
    Route::post('/store-role', [App\Http\Controllers\RoleController::class, 'store']);
    Route::delete('/delete-role/{id}', [App\Http\Controllers\RoleController::class, 'delete']);
    
    
    //user routing 
    Route::get('/users', [App\Http\Controllers\UserController::class, 'show']);
    Route::get('/add-user', [App\Http\Controllers\UserController::class, 'view']);
    Route::post('/store-user', [App\Http\Controllers\UserController::class, 'store']);
    Route::delete('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'delete']);
    

});


