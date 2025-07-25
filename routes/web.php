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

Route::get('/', function () { return redirect('/admin'); })->name('index');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------|
*/

/*
Auth::routes();

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');    
});
*/