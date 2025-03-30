<?php
use App\Http\Controllers\MembreController;

Route::get('/membres', [MembreController::class, 'index'])->name('membres.index');
Route::get('/membrescss', [MembreController::class, 'indexCss'])->name('membres.indexcss');
Route::middleware(['auth'])->group(function () {
    Route::get('/membres/create', [MembreController::class, 'create'])->name('membres.create');
    Route::post('/membres', [MembreController::class, 'store'])->name('membres.store');
});
Route::get('/membres/{membre}', [MembreController::class, 'show'])->name('membres.show');
Route::get('/membres/{membre}/edit', [MembreController::class, 'edit'])->name('membres.edit');
Route::put('/membres/{membre}', [MembreController::class, 'update'])->name('membres.update');
Route::delete('/membres/{membre}', [MembreController::class, 'destroy'])->name('membres.destroy');
Route::get('/membre-not-found', [MembreController::class, 'notFound'])->name('membres.not-found');
Auth::routes();

Route::get('/', function () {
    return redirect()->route('membres.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
