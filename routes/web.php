<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use \App\Http\Controllers\AuthorController;
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



Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('user/dashboard',[UserController::class,'dashboard'])->name('user-dashboard');
Route::get('profile/{user}',[UserController::class,'profile'])->name('profile');
Route::put('profile/update',[UserController::class,'profileUpdate'])->name('profile-update');

Route::resource('admin',AdminController::class);
Route::resource('author',AuthorController::class);
Route::prefix('admin')->group(function (){
    Route::put('users/{user}/ban',[AdminController::class,'ban'])->name('ban-user');
    Route::get('user/list',[AdminController::class,'index'])->name('user-list');
    Route::delete('users/{user}/delete',[AdminController::class,'delete'])->name('user-delete');
});

require __DIR__.'/auth.php';
