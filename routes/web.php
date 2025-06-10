<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
Route::get('/login',[AuthController::class,'showLogIn'])->name('login');
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
});


Route::middleware('auth')->group(function (){

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/',[NoteController::class,'index']);
    Route::get('/create-note',[NoteController::class,'create'])->name('notes.create');
    Route::post('/store-note',[NoteController::class,'store'])->name('notes.store');
    Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::get('/note/{note}/confirm-delete', [NoteController::class, 'confirmDelete'])->name('notes.confirm-delete');
    Route::delete('/note/{note}/delete', [NoteController::class, 'destroy'])->name('notes.destroy');
    Route::put('/note/{note}/update', [NoteController::class, 'update'])->name('notes.update');

  
       
});
