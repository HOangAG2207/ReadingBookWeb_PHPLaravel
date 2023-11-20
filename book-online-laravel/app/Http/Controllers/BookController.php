<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

use App\Models\{Genre, Book};

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all = Book::all();
        $data_book = Book::query()
            ->when($request->status != null, function ($query) use ($request) {
                return $query->where('book_status', $request->status);
            })
            ->when($request->searchBox != null, function ($query) use ($request) {
                return $query->where('book_name', 'like', '%' . $request->searchBox . '%');
            })
            ->with('genre', 'chapter')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('backend.book.index')->with(compact('data_book', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book_genre = Genre::orderBy('genre_name', "asc")->get();
        return view('backend.book.create')->with(compact('book_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'book_name' => ['required', 'max:255', 'min:5', 'unique:book'],
                'book_slug' => [''],
                'book_description' => [''],
                'book_status' => [''],
                'book_image' => [''],
                'genre_id' => [''],
                // 'book_image' => ['mimes:jpeg,png,jpg', 'image']
            ],
            [
                'book_name.required' => 'Trường này bắt buộc phải nhập',
                'book_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'book_name.max' => 'Trường này phải có ít hơn :max kí tự',
                'book_name.unique' => 'Sách *:input* đã tồn tại',
                // 'book_image.mimes' => 'Hình ảnh phải có đuôi mở rộng: .jpeg, .png, .jpg',
            ],
        );

        
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->book_slug = Str::slug($request->book_name, '-');
        $book->book_description = $request->book_description;
        // $book->genre_id = $request->genre_id;

        $book->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        if ($request->hasfile('book_image')) {

            $file = $request->file('book_image');

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $file_name = Str::slug($request->book_name, '-') . '_' . date('Hisdmy') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/Sach', $file_name);

            $book->book_image = $file_name;
        }
        // $book->book_status = $request->book_status; -> mặc định giá trị = 0 (ẩn)

        
        $book->save();
        $book->genre()->sync($request->get('genre'));
        return back()->with('success', 'Đã thêm sách ' . $book->book_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_genre = Genre::orderBy('genre_name', "asc")->where('genre_status', 1)->get();
        $data_book = Book::find($id);
        return view('backend.book.edit')->with(compact('data_book', 'data_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'book_name' => ['required', 'max:255', 'min:5', 'unique:book,book_name,' . $id],
                'book_slug' => [''],
                'book_description' => [''],
                'book_status' => [''],
                'book_image' => [''],
            ],
            [
                'book_name.required' => 'Trường này bắt buộc phải nhập',
                'book_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'book_name.max' => 'Trường này phải có ít hơn :max kí tự',
                'book_name.unique' => 'Sách *:input* đã tồn tại',
            ],
        );
        $book = Book::find($id);
        if ($request->book_name != $book->book_name) {
            $book->book_name = $request->book_name;
        }
        $book->book_slug = Str::slug($request->book_name, '-');
        $book->book_description = $request->book_description;
        // $book->genre_id = $request->genre_id;

        $book->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        if ($request->hasfile('book_image')) {
            if ($book->book_image != null) {
                $old_image_exist = storage_path('app/public/uploads/Sach/' . $book->book_image);
                if (File::exists($old_image_exist)) {
                    unlink($old_image_exist);
                }
            }

            $file = $request->file('book_image');
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $file_name = Str::slug($request->book_name, '-') . '_' . date('Hisdmy') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/Sach', $file_name);

            $book->book_image = $file_name;
        }
        $book->book_status = $request->book_status;

        $book->update();
        $book->genre()->sync($request->input('genre_id', []));
        return back()->with('success', 'Đã cập nhật sách');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function delete(Request $request)
    {
        $data = Book::find($request->id);
        if ($data->book_image != null) {
            $old_image_exist = storage_path('app/public/uploads/Sach/' . $data->book_image);
            if (File::exists($old_image_exist)) {
                unlink($old_image_exist);
            }
        }
        $data->delete();
        return response()->json(['status' => 'success']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $data = Book::find($request->id);
        $data->book_status = !$data->book_status;
        $data->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $data->update();
        return response()->json(['status' => 'success']);
    }
}
