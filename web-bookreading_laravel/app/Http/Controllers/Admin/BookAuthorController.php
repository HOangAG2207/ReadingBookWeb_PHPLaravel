<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BookAuthor;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BookAuthorController extends Controller
{
    # GET - all list
    public function index()
    {
        $data_author = BookAuthor::orderBy('updated_at', 'desc')->get();
        return view('admin.book_author.index')->with(compact('data_author'));
    }

    # GET
    public function create()
    {
        return view('admin.book_author.create');
    }
    # POST
    public function store(Request $request)
    {
        $request->validate(
            [
                'author_name' => ['required', 'max:255', 'min:5', 'unique:book_author'],
                'author_slug' => [''],
                'author_overview' => [''],
                'author_gender' => ['required'],
                'author_state' => ['required'],
                'author_image' => ['mimes:jpeg,png,jpg,gif,svg', 'image']
            ],
            [
                'author_name.required' => 'Trường này bắt buộc phải nhập',
                'author_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'author_name.unique' => 'Tác giả *:input* đã tồn tại',

                'author_gender.required' => 'Giới tính chưa được chọn',
                'author_state.required' => 'Trạng thái chưa được chọn',
                'author_image.mimes' => 'Hình ảnh phải có đuôi mở rộng: .jpeg, .png, .jpg, .gif, .svg',
            ],
        );
        // $data = $request->all();

        $author = new BookAuthor();
        $author->author_name = $request->author_name;
        $author->author_slug = Str::slug($request->author_name, '-');
        $author->author_overview = $request->author_overview;

        if ($request->hasfile('author_image')) {

            $file = $request->file('author_image');

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $file_name = Str::slug($request->author_name, '-') . '_' . date('Hisdmy') . '.' . $file->getClientOriginalExtension();

            $file->move('uploads/images/author/', $file_name);

            $author->author_image = $file_name;
        }
        $author->author_gender = $request->author_gender;
        $author->author_state = $request->author_state;

        $author->save();

        return redirect('admin/create_book_author')->with('message', 'Thêm thành công');
    }
}
