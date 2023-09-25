<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\BookCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookCategoryController extends Controller
{
    # GET - all list
    public function index()
    {
        $data_cate = BookCategory::orderBy('updated_at','desc')->get();
        return view('admin.book_category.index')->with(compact('data_cate'));
    }

    # GET
    public function create()
    {
        return view('admin.book_category.create');
    }

    # POST
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_name' => ['required','max:255','min:5','unique:book_category'],
                'category_slug' => [''],
                'category_description' => [''],
                'category_state' => ['required'],
                'category_image' => ['mimes:jpeg,png,jpg,gif,svg','max:2048', 'image']
            ],
            [
                'category_name.required' => 'Trường này bắt buộc phải nhập',
                'category_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'category_name.unique' => 'Thể loại *:input* đã tồn tại',

                'category_state.required' => 'Trạng thái chưa được chọn',
            ],
        );
        // $data = $request->all();

        $category = new BookCategory();
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name, '-');
        $category->category_description = $request->category_description;

        if ($request->hasfile('category_image')) {
            $file = $request->file('category_image');

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $file_name = Str::slug($request->category_name, '-') . '_' . date('Hisdmy') . '.' . $file->getClientOriginalExtension();

            $file->move('uploads/images/category/', $file_name);

            $category->category_image = $file_name;
        }
        $category->category_state = $request->category_state;

        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/create_book_category')->with('message', 'Add successfully');
    }
}
