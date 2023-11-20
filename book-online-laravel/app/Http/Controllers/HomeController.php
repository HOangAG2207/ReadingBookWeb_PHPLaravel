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
            $query->where('chapter_status',1)->orderBy('chapter_number','desc')->latest();
        }])->where('book_status',1)->orderByRaw('(SELECT MAX(chapter.created_at) FROM chapter WHERE chapter.book_id = book.id) desc')->get();

        return view('frontend.home')->with(compact('genre', 'book_with_lastest_chapter'));
    }
    // genre page
    public function genre_page($slug){
        return view('frontend.genre_page');
    }
    // detail book page
    public function detailBook_page($slug){
        // lấy thể loại đổ ra menu navbar
        $genre = Genre::orderBy('genre_name', 'asc')->where('genre_status', 1)->get();
        
        return view('frontend.detail_book_page')->with(compact('genre'));
    }
    // detail chapter page
    public function detailChapter_page($slug_book, $slug_chapter){
        return view('frontend.detail_chapter_page');
    }
}
