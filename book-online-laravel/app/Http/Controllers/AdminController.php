<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Genre,Book,Chapter};

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genre_count = Genre::all();
        $book_count = Book::all();
        $chapter_count = Chapter::all();
        return view('backend.dashboard')->with(compact('genre_count','book_count','chapter_count'));
    }
}
