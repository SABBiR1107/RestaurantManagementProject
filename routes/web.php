<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
Route::get('/',[HomeController::class,'Home'])->name('home');

Route::get('/add_food',[AdminController::class,'add_food'])->name('add_food');

Route::get('/view_food',[AdminController::class,'view_food']) ->name('view_food');

Route::post('/upload_food',[AdminController::class,'upload_food'])->name('upload_food');

Route::get('/update_food/{id}',[AdminController::class,'update_food'])->name('update_food');

Route::get('/delete_food/{id}',[AdminController::class,'delete_food'])->name('delete_food');

Route::post('/edit_food/{id}',[AdminController::class,'edit_food'])->name('edit_food');

Route::get('/home', [HomeController::class, 'index'])->name('home');   

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
