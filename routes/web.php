<?php

use App\Http\Controllers\crud_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [crud_controller::class, 'index'])->name('user.index');


Route::get('dashboard/add', [crud_controller::class, 'create'])->name('user.create');
Route::post('dashboard/add', [crud_controller::class, 'store'])->name('user.store');


Route::get('user/{id}/edit', [crud_controller::class, 'edit'])->name('user.edit');
Route::put('user/{id}/update', [crud_controller::class, 'update'])->name('user.update');


Route::get('user/{id}/delete', [crud_controller::class, 'delete'])->name('user.delete');
