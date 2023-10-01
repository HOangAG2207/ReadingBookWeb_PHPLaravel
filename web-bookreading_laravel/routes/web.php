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
    Route::controller(CategoryController::class)->group(function () {
        #Route BookCategory
        Route::get('category', 'index');
        Route::get('create_category', 'create');
        Route::post('create_category', 'store');
        Route::get('edit_category/{id}', 'edit');
        Route::put('update_category/{id}', 'update');
        Route::delete('delete_category/{id}', 'destroy');

        Route::get('update_status_category', 'updateStatus')->name('update_status_category');
    });
    

    Route::controller(AuthorController::class)->group(function () {
        #Route BookAuthor
        Route::get('author', 'index');
        Route::get('create_author', 'create');
        Route::post('create_author', 'store');
        Route::get('edit_author/{id}', 'edit');
        Route::put('update_author/{id}', 'update');
        Route::delete('delete_author/{id}', 'destroy');

        Route::get('update_status_author', 'updateStatus')->name('update_status_author');
    });
});
