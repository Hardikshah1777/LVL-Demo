<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );

Auth::routes();

Route::get('/sendemail/{id}', [App\Http\Controllers\UserController::class, 'testmail'])->name( 'testmail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name( 'home');
Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name( 'index');
Route::get('/newuser', [App\Http\Controllers\UserController::class, 'create'])->name( 'newuser');
Route::post('/manageuser', [App\Http\Controllers\UserController::class, 'store'])->name( 'manageuser');
Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'show'])->name( 'profile');
Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name( 'edit');
//Route::post('/updateuser/{id}', [App\Http\Controllers\UserController::class, 'updateuser'])->name( 'updateuser');
Route::post('/updateuser/{id}', [App\Http\Controllers\UserController::class, 'updateuser'])->name('updateuser');
Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name( 'delete');

// Route::resource('peoples', PeopleController::class);
// Route::get('create', [App\Http\Controllers\PeopleController::class, 'create'])->name( 'create');
