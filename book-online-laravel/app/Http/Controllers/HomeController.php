<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\{Genre, Chapter, Book};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // HOME PAGE
    public function index()
    {
        // lấy thể loại đổ ra menu navbar
        $genre = Genre::orderBy('genre_name', 'asc')->where('genre_status', 1)->get();
        // lấy danh sách book slide
        $slide_book = Book::latest()->take(10);
        // lấy danh sách book có chapter mới nhất
        $book_with_lastest_chapter = Book::with(['chapter' => function ($query) {
            $query->where('chapter_status', 1)->orderBy('chapter_number', 'desc')->latest();
        }])->where('book_status', 1)->orderByRaw('(SELECT MAX(chapter.created_at) FROM chapter WHERE chapter.book_id = book.id) desc')->get();
// dd($book_with_lastest_chapter);
        return view('frontend.home')->with(compact('genre', 'book_with_lastest_chapter'));
    }
    // genre page
    public function genre_page($slug_genre)
    {
        // lấy thể loại đổ ra menu navbar
        $genre = Genre::orderBy('genre_name', 'asc')->where('genre_status', 1)->get();
        // lấy thông tin sách theo slug
        $current_genre = Genre::where('genre_slug', $slug_genre)->where('genre_status', 1)->first();
        // lấy dánh sách book theo thể loại (genre)
        $book_with_genre = Book::whereHas('genre', function ($query) use ($slug_genre) {
            $query->where('genre_slug', $slug_genre);
        })->with(['chapter' => function ($query) {
            $query->where('chapter_status', 1)->orderBy('chapter_number', 'desc')->latest();
        }])->where('book_status', 1)->orderByRaw('(SELECT MAX(chapter.created_at) FROM chapter WHERE chapter.book_id = book.id) desc')->get();
        return view('frontend.book_with_genre')->with(compact('genre', 'current_genre', 'book_with_genre'));
    }
    // detail book page
    public function detailBook_page($slug)
    {
        // lấy thể loại đổ ra menu navbar
        $genre = Genre::orderBy('genre_name', 'asc')->where('genre_status', 1)->get();
        // lấy thông tin sách theo slug
        $book = Book::where('book_slug', $slug)->where('book_status', 1)->with('genre', 'chapter')->first();
        $book->increment('book_view');
        // lấy cách chapter thuộc sách
        $chapter = $book->chapter()->where('chapter_status', 1)->orderBy('id', 'desc')->get();
        // Lấy chapter đầu tiên
        $first_chapter = $book->chapter()->where('chapter_status', 1)->orderBy('id', 'asc')->first();
        // Lấy chapter mới nhất
        $last_chapter = $book->chapter()->where('chapter_status', 1)->orderBy('id', 'desc')->first();

        return view('frontend.detail_book_page')->with(compact('genre', 'book', 'chapter', 'first_chapter', 'last_chapter'));
    }
    // detail chapter page
    public function detailChapter_page($slug_book, $slug_chapter)
    {
        // lấy thể loại đổ ra menu navbar
        $genre = Genre::orderBy('genre_name', 'asc')->where('genre_status', 1)->get();
        // lấy thông tin sách theo slug
        $book = Book::where('book_slug', $slug_book)->where('book_status', 1)->with('genre', 'chapter')->first();
        // lấy thông tin chapter hiện tại
        $current_chapter = $book->chapter()->where('chapter_status', 1)->where('chapter_slug', $slug_chapter)->first();
        // lấy danh sách chapter 
        $chapter_list = $book->chapter()->where('chapter_status', 1)->orderBy('id', 'desc')->get();
        // Lấy chapter sau current chapter
        $next_chapter = $book->chapter()->where('chapter_status', 1)->where('id', '>', $current_chapter->id)->min("chapter_slug");
        // Lấy chapter trước current chapter
        $previous_chapter = $book->chapter()->where('chapter_status', 1)->where('id', '<', $current_chapter->id)->max("chapter_slug");
        // Lấy chapter đầu tiên
        $first_chapter = $book->chapter()->where('chapter_status', 1)->orderBy('id', 'asc')->first();
        // Lấy chapter mới nhất
        $last_chapter = $book->chapter()->where('chapter_status', 1)->orderBy('id', 'desc')->first();

        return view('frontend.detail_chapter_page')->with(compact('genre', 'book', 'current_chapter', 'chapter_list', 'next_chapter', 'previous_chapter', 'first_chapter', 'last_chapter'));
    }
}
