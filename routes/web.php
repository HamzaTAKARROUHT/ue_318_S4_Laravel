<?php

use App\Http\Controllers\MembreController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('membres.index');
});

Route::get('/membres', [MembreController::class, 'index'])->name('membres.index');
Route::get('/membrescss', [MembreController::class, 'indexCss'])->name('membres.indexcss');

Route::middleware(['auth'])->group(function () {
    Route::get('/membres/create', [MembreController::class, 'create'])->name('membres.create');
    Route::post('/membres', [MembreController::class, 'store'])->name('membres.store');
    Route::get('/mon-profil', [MembreController::class, 'monProfil'])->name('mon-profil');
});

Route::get('/membres/{membre}', [MembreController::class, 'show'])->name('membres.show');
Route::get('/membre-not-found', [MembreController::class, 'notFound'])->name('membres.not-found');

Route::middleware(['auth'])->group(function () {
    Route::get('/membres/{membre}/edit', [MembreController::class, 'edit'])->name('membres.edit');
    Route::put('/membres/{membre}', [MembreController::class, 'update'])->name('membres.update');
    Route::delete('/membres/{membre}', [MembreController::class, 'destroy'])->name('membres.destroy');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
