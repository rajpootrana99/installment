<?php

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


Route::get('/admin', function () {
    return view('index');
})->middleware(['auth'])->name('admin');

// Account Routes
Route::resource('head', 'HeadController')->middleware(['auth']);
Route::resource('subHead', 'SubHeadController')->middleware(['auth']);
Route::resource('accountDetail', 'AccountDetailController')->middleware(['auth']);
Route::resource('contact', 'ContactController')->middleware(['auth']);

// Inventory Routes
Route::resource('category', 'CategoryController')->middleware(['auth']);
Route::resource('subCategory', 'SubCategoryController')->middleware(['auth']);
Route::resource('manufacturer', 'ManufacturerController')->middleware(['auth']);
require __DIR__.'/auth.php';
