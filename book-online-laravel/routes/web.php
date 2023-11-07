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
    Route::resource('/genre', GenreController::class);
    Route::get('/genre/changeStatus/{id}', [GenreController::class, 'changeStatus'])->name('genre.changeStatus');

    //Quản lý sách
    Route::resource('/book', BookController::class);
    Route::get('/book/changeStatus/{id}', [BookController::class, 'changeStatus'])->name('book.changeStatus');

    //Quản lý chapter
    Route::resource('/chapter', ChapterController::class);
    Route::get('/chapter/changeStatus/{id}', [ChapterController::class, 'changeStatus'])->name('chapter.changeStatus');

    //testu
    Route::resource('/testu', TestuController::class);
    Route::get('/get-data', [TestuController::class, 'getData'])->name('testu.getdata');
    Route::get('/change-status', [TestuController::class, 'changeStatus'])->name('testu.changestatus');
});
