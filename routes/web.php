<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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
Route::redirect('/', '/login');

Route::middleware('auth')->group(function () {

    Route::get('/change-password',[HomeController ::class, 'showchangepasswordform'])->name('admin.showchangepassword');
    Route::post('/change-password',[HomeController ::class, 'changepassword'])->name('admin.changepassword');
    Route::get('/change-profile',[HomeController::class, 'changeProfile'])->name('admin.showprofileupdate');
    Route::post('/change-profile',[HomeController::class, 'profileUpdate'])->name('admin.changeprofile');
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
