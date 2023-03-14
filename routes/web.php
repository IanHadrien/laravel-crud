<?php

use App\Http\Controllers\CommentsController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Comments
Route::get('/',[CommentsController::class, 'index'])->name('comments.index');
Route::get('/comments/add', [CommentsController::class, 'create'])->name('comments.create');
Route::post('/comments/add', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}', [CommentsController::class, 'show'])->name('comments.show');
Route::get('/comments/edit/{id}', [CommentsController::class, 'edit'])->name('comments.edit');
Route::put('/comments/update/{id}', [CommentsController::class, 'update'])->name('comments.update');
Route::match(['get', 'delete'], 'comments/delete/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');

