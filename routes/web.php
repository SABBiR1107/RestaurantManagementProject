<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::get('logout',[AdminController::class,'logout'])->name('logout');

Route::get('/add_food',[AdminController::class,'add_food'])->name('add_food');

Route::get('/view_food',[AdminController::class,'view_food']) ->name('view_food');

Route::post('/upload_food',[AdminController::class,'upload_food'])->name('upload_food');

Route::get('/update_food/{id}',[AdminController::class,'update_food'])->name('update_food');

Route::get('/delete_food/{id}',[AdminController::class,'delete_food'])->name('delete_food');

Route::post('/edit_food/{id}',[AdminController::class,'edit_food'])->name('edit_food');

Route::get('/home', [HomeController::class,'index'])->name('home');   

Route::post('/add_cart/{id}', [HomeController::class,'add_cart'])->name('add_cart');

Route::get('/my_cart', [HomeController::class,'my_cart'])->name('my_cart');

Route::get('/remove_cart/{id}', [HomeController::class,'remove_cart'])->name('remove_cart');

Route::post('/confirm_order', [HomeController::class,'confirm_order'])->name('confirm_order');

Route::get('/orders', [AdminController::class,'orders'])->name('orders');

Route::get('/on_the_way/{id}', [AdminController::class,'on_the_way'])->name('on_the_way');

Route::get('/delivered/{id}', [AdminController::class,'delivered'])->name('delivered');

Route::get('/canceled/{id}', [AdminController::class,'canceled'])->name('canceled');

Route::post('/book_table', [HomeController::class,'book_table'])->name('book_table');

Route::get('/reservations', [AdminController::class,'reservations'])->name('reservations');

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
