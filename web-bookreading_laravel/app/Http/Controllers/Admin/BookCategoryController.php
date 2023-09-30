<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookAuthor;
use Illuminate\Http\Request;

use App\Models\BookCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BookCategoryController extends Controller
{
    # GET - all list
    public function index()
    {
        $data_cate = BookCategory::orderBy('category_name', 'asc')->paginate(2);
        // $data_cate = BookCategory::orderBy('updated_at', 'desc')->paginate(1);
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
                'category_name' => ['required', 'max:255', 'min:5', 'unique:book_category'],
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
    public function destroy($id)
    {
        $data = BookCategory::find($id);
        
        if ($data) {
            $old_image_exist = 'uploads/images/category/' . $data->category_image;
            if (File::exists($old_image_exist)) {
                File::delete($old_image_exist);
            }
        }
        $data->delete();
        return response()->json([
            'status' =>200,
            'message' => 'Item deleted successfully'
        ]);
    }
    // public function destroy(Request $request)
    // {
    //     $category = BookCategory::find($request->category_delete_id);
    //     if ($category) {
    //         $old_image_exist = 'uploads/images/category/' . $category->category_image;
    //         if (File::exists($old_image_exist)) {
    //             File::delete($old_image_exist);
    //         }
    //         $category->delete();
    //         // return redirect('admin/book_category')->with('message', 'Xóa thành công');
    //         return back();
    //     } else {
    //         return back();
    //         // return redirect('admin/book_category')->with('message', 'Xóa thất bại');
    //     }
    // }

    # GET - change status
    public function updateState(Request $request)
    {
        $data = BookCategory::find($request->category_id);
        $data->category_state = $request->category_state;
        $data->update();

        return redirect('admin/book_category');
    }
}
