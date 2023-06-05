<?php

use App\Http\Controllers\familyController;
use App\Http\Controllers\placeController;
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

Route::resource('/families',familyController::class);
Route::resource('/families',placeController::class);

Route::get('/families', [familyController::class, 'index'])->name('family.index');
Route::get('/families/create', [familyController::class, 'create'])->name('family.create');
Route::post('/families/add', [familyController::class, 'store'])->name('family.store');

Route::get('/families/{id}/edit', [familyController::class,'edit'])->name('family.edit');
Route::patch('/families/{id}', [familyController::class,'update'])->name('family.update');
