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
//Quản lý Trang home
Route::controller(HomeController::class)->group(function () {
    // HOME
    Route::get('/', 'index')->name('home');
    // Liệt kê sách theo thể loại
    Route::get('/theloai/{slug_genre}', 'genre_page')->name('home.genre');
    // Trang đọc sách và chapter thuộc sách
    Route::get('/docsach/{slug}', 'detailBook_page')->name('home.detail_book');
    // Trang đọc chapter
    Route::get('/docsach/{slug_book}/{slug_chapter}', 'detailChapter_page')->name('home.detail_chapter');
});

// ----------------------Back-End----------------------
// ADMIN
Route::prefix('admin')->middleware('auth')->group(function () {
    // Trang chủ quản lý
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    //Quản lý thể loại
    Route::controller(GenreController::class)->group(function () {
        // Route::resource('/genre', GenreController::class); // resource genre (the loai sach)
        Route::get('genre', 'index')->name('genre.index'); // index page

        Route::get('genre/create', 'create')->name('genre.create'); // go to create new page
        Route::post('genre/store', 'store')->name('genre.store'); // submit new create

        Route::get('genre/{genre}/edit', 'edit')->name('genre.edit'); // go to edit page
        Route::put('genre/{genre}', 'update')->name('genre.update'); // update new edit

        Route::post('genre/delete', 'delete')->name('genre.delete'); // delete
        Route::post('genre/changeStatus', 'changeStatus')->name('genre.changeStatus'); // change status
    });

    //Quản lý sách
    Route::controller(BookController::class)->group(function () {
        Route::get('book', 'index')->name('book.index'); // index page

        Route::get('book/create', 'create')->name('book.create'); // go to create new page
        Route::post('book/store', 'store')->name('book.store'); // submit new create

        Route::get('book/{book}/edit', 'edit')->name('book.edit'); // go to edit page
        Route::put('book/{book}', 'update')->name('book.update'); // update new edit

        Route::post('book/delete', 'delete')->name('book.delete'); // delete
        Route::post('book/changeStatus', 'changeStatus')->name('book.changeStatus'); // change status
    });

    //Quản lý chapter
    Route::resource('/chapter', ChapterController::class);
    Route::get('/chapter/changeStatus/{id}', [ChapterController::class, 'changeStatus'])->name('chapter.changeStatus');
});
