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

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
Route::get('/admin/about', [AdminController::class, 'about'])->name('admin/about');
Route::get('/admin/form', [AdminController::class, 'create'])->name('admin/form');
Route::post('/admin/form/add', [AdminController::class, 'store'])->name('admin/form/add');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin/delete/{id}');
