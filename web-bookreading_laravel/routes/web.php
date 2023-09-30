<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::namespace('App\Http\Controllers')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('home', 'index')->name('home');
    });
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'isAdmin'])->group(function () {

    #Route Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('admin_dashboard');
    Route::controller(BookCategoryController::class)->group(function () {
        #Route BookCategory
        Route::get('book_category', 'index');
        Route::get('create_book_category', 'create');
        Route::post('create_book_category', 'store');
        Route::get('edit_book_category/{id}', 'edit');
        Route::put('update_book_category/{id}', 'update');
        // Route::delete('delete_book_category/{id}', 'destroy')->name('delete_book_category.destroy');
        // Route::post('delete_book_category', 'destroy')->name('delete_category');

        Route::get('update_state_book_category', 'updateState')->name('update_state_book_category');
    });
    Route::delete('delete_book_category/{id}', 'BookCategoryController@destroy');

    Route::controller(BookAuthorController::class)->group(function () {
        #Route BookAuthor
        Route::get('book_author', 'index');
        Route::get('create_book_author', 'create');
        Route::post('create_book_author', 'store');
        Route::get('edit_book_author/{id}', 'edit');
        Route::put('update_book_author/{id}', 'update');
        Route::post('delete_book_author', 'destroy');

        Route::get('update_state_book_author', 'updateState')->name('update_state_book_author');
    });
});
