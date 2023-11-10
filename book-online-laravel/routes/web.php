<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// controller
use App\Http\Controllers\{
    HomeController,
    AdminController,
    GenreController,
    BookController,
    ChapterController,

    TestuController
};
use App\Models\Genre;

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

Auth::routes();
// ----------------------Front-End----------------------
// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/theloai/{slug}', [HomeController::class, 'genre_page'])->name('home.genre');
Route::get('/docsach/{slug}', [HomeController::class, 'detailBook_page'])->name('home.detail_book');
Route::get('/docsach/{slug_book}/{slug_chapter}', [HomeController::class, 'detailChapter_page'])->name('home.detail_chapter');

// ----------------------Back-End----------------------
// ADMIN
Route::prefix('admin')->middleware('auth')->group(function () {
    // Trang chủ quản lý
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    //Quản lý thể loại
    Route::resource('/genre', GenreController::class); // resource genre (the loai sach)
    Route::post('/genre/delete', [GenreController::class, 'delete'])->name('genre.delete'); // delete
    Route::post('/genre/changeStatus', [GenreController::class, 'changeStatus'])->name('genre.changeStatus'); // change status
    // Route::get('/genre/changeStatus/{id}', [GenreController::class, 'changeStatus'])->name('genre.changeStatus'); // change status

    //Quản lý sách
    Route::resource('/book', BookController::class);
    Route::get('/book/changeStatus/{id}', [BookController::class, 'changeStatus'])->name('book.changeStatus');

    //Quản lý chapter
    Route::resource('/chapter', ChapterController::class);
    Route::get('/chapter/changeStatus/{id}', [ChapterController::class, 'changeStatus'])->name('chapter.changeStatus');


});
