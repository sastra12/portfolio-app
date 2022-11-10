<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route Admin
Route::middleware(['auth'])->group(function () {
    Route::post('/admin/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])
        ->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class, 'edit'])
        ->name('edit.profile');
    Route::post('/store/profile', [AdminController::class, 'store'])
        ->name('store.profile');
    Route::get('/edit/password', [AdminController::class, 'editpassword'])
        ->name('edit.password');
    Route::post('/update/password', [AdminController::class, 'updatepassword'])
        ->name('update.password');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
