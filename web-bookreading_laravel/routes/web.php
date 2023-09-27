<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    #Route Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    
    #Route BookCategory
    Route::get('/book_category', [App\Http\Controllers\Admin\BookCategoryController::class, 'index']);
    Route::get('/create_book_category', [App\Http\Controllers\Admin\BookCategoryController::class, 'create']);
    Route::post('/create_book_category', [App\Http\Controllers\Admin\BookCategoryController::class, 'store']);
    Route::get('/edit_book_category/{id}', [App\Http\Controllers\Admin\BookCategoryController::class, 'edit']);
    Route::put('/update_book_category/{id}', [App\Http\Controllers\Admin\BookCategoryController::class, 'update']);
    // Route::get('/delete_book_category/{id}', [App\Http\Controllers\Admin\BookCategoryController::class, 'destroy']);
    Route::post('/delete_book_category', [App\Http\Controllers\Admin\BookCategoryController::class, 'destroy']);

    #Route BookAuthor
    Route::get('/book_author', [App\Http\Controllers\Admin\BookAuthorController::class, 'index']);
    Route::get('/create_book_author', [App\Http\Controllers\Admin\BookAuthorController::class, 'create']);
    Route::post('/create_book_author', [App\Http\Controllers\Admin\BookAuthorController::class, 'store']);
    Route::get('/edit_book_author/{id}', [App\Http\Controllers\Admin\BookAuthorController::class, 'edit']);
    Route::put('/update_book_author/{id}', [App\Http\Controllers\Admin\BookAuthorController::class, 'update']);
    Route::post('/delete_book_author', [App\Http\Controllers\Admin\BookAuthorController::class, 'destroy']);

});
