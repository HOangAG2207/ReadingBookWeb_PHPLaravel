<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\BookCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
=======
>>>>>>> 54660d33b2df892d825845612208dd80d6dbef08

class BookCategoryController extends Controller
{
    # GET - all list
    public function index()
    {
<<<<<<< HEAD
        $data_cate = BookCategory::orderBy('updated_at', 'desc')->get();
=======
        $data_cate = BookCategory::orderBy('updated_at','desc')->get();
>>>>>>> 54660d33b2df892d825845612208dd80d6dbef08
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
<<<<<<< HEAD
                'category_name' => ['required', 'max:255', 'min:5', 'unique:book_category'],
                'category_slug' => [''],
                'category_description' => [''],
                'category_state' => ['required'],
                'category_image' => ['mimes:jpeg,png,jpg,gif,svg', 'image']
=======
                'category_name' => ['required','max:255','min:5','unique:book_category'],
                'category_slug' => [''],
                'category_description' => [''],
                'category_state' => ['required'],
                'category_image' => ['mimes:jpeg,png,jpg,gif,svg','max:2048', 'image']
>>>>>>> 54660d33b2df892d825845612208dd80d6dbef08
            ],
            [
                'category_name.required' => 'Trường này bắt buộc phải nhập',
                'category_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'category_name.unique' => 'Thể loại *:input* đã tồn tại',

                'category_state.required' => 'Trạng thái chưa được chọn',
<<<<<<< HEAD
                'category_image.mimes' => 'Hình ảnh phải có đuôi mở rộng: .jpeg, .png, .jpg, .gif, .svg',
=======
>>>>>>> 54660d33b2df892d825845612208dd80d6dbef08
            ],
        );
        // $data = $request->all();

        $category = new BookCategory();
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name, '-');
        $category->category_description = $request->category_description;

        if ($request->hasfile('category_image')) {
<<<<<<< HEAD

=======
>>>>>>> 54660d33b2df892d825845612208dd80d6dbef08
            $file = $request->file('category_image');

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $file_name = Str::slug($request->category_name, '-') . '_' . date('Hisdmy') . '.' . $file->getClientOriginalExtension();

            $file->move('uploads/images/category/', $file_name);

            $category->category_image = $file_name;
        }
        $category->category_state = $request->category_state;

        $category->created_by = Auth::user()->id;
        $category->save();

<<<<<<< HEAD
        return redirect('admin/create_book_category')->with('message', 'Thêm thành công');
    }

    #GET - edit
    public function edit($id)
    {
        $category = BookCategory::find($id);
        return view('admin.book_category.edit')->with(compact('category'));
    }
    #PUT
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'category_name' => ['required', 'max:255', 'min:5', 'unique:book_category,category_name,' . $id],
                'category_slug' => [''],
                'category_description' => [''],
                'category_state' => ['required'],
                'category_image' => ['mimes:jpeg,png,jpg,gif,svg', 'image']
            ],
            [
                'category_name.required' => 'Trường này bắt buộc phải nhập',
                'category_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'category_name.unique' => 'Thể loại *:input* đã tồn tại',

                'category_state.required' => 'Trạng thái chưa được chọn',
                'category_image.mimes' => 'Hình ảnh phải có đuôi mở rộng: .jpeg, .png, .jpg, .gif, .svg',
            ],
        );
        // $data = $request->all();

        $category = BookCategory::find($id);
        if ($request->category_name != $category->category_name) {
            $category->category_name = $request->category_name;
        }
        $category->category_slug = Str::slug($request->category_name, '-');
        $category->category_description = $request->category_description;

        if ($request->hasfile('category_image')) {
            $old_image_exist = 'uploads/images/category/' . $category->category_image;
            if (File::exists($old_image_exist)) {
                File::delete($old_image_exist);
            }

            $file = $request->file('category_image');
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $file_name = Str::slug($request->category_name, '-') . '_' . date('Hisdmy') . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/images/category/', $file_name);

            $category->category_image = $file_name;
        }
        $category->category_state = $request->category_state;

        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin/edit_book_category/' . $id)->with('message', 'Cập nhật thành công');
    }

    #DELETE
    public function destroy(Request $request)
    {
        $category = BookCategory::find($request->category_delete_id);
        if ($category) {
            $old_image_exist = 'uploads/images/category/' . $category->category_image;
            if (File::exists($old_image_exist)) {
                File::delete($old_image_exist);
            }

            $category->delete();
            return redirect('admin/book_category')->with('message', 'Xóa thành công');
        }
        else{
            return redirect('admin/book_category')->with('message', 'Xóa thất bại');
        }
=======
        return redirect('admin/create_book_category')->with('message', 'Add successfully');
>>>>>>> 54660d33b2df892d825845612208dd80d6dbef08
    }
}