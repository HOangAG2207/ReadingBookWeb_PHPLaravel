<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    # GET - all list
    public function index()
    {
        $user = User::all();
        $data_author = Author::paginate(5);
        return view('admin.author.index')->with(compact('data_author','user'));
    }

    # GET
    public function create()
    {
        return view('admin.author.create');
    }
    # POST
    public function store(Request $request)
    {
        $request->validate(
            [
                'author_name' => ['required', 'max:255', 'min:5', 'unique:author'],
                'author_slug' => [''],
                'author_overview' => [''],
                'author_gender' => ['required'],
                'author_status' => ['required'],
                'author_image' => ['mimes:jpeg,png,jpg,gif,svg', 'image']
            ],
            [
                'author_name.required' => 'Trường này bắt buộc phải nhập',
                'author_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'author_name.unique' => 'Tác giả *:input* đã tồn tại',

                'author_gender.required' => 'Giới tính chưa được chọn',
                'author_status.required' => 'Trạng thái chưa được chọn',
                'author_image.mimes' => 'Hình ảnh phải có đuôi mở rộng: .jpeg, .png, .jpg, .gif, .svg',
            ],
        );
        // $data = $request->all();

        $author = new Author();
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
        $author->author_status = $request->author_status;

        $author->created_by = Auth::user()->id;
        $author->save();

        return redirect('admin/create_author')->with('message', 'Thêm thành công');
    }

    #GET - edit
    public function edit($id)
    {
        $author = Author::find($id);
        return view('admin.author.edit')->with(compact('author'));
    }
    #PUT
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'author_name' => ['required', 'max:255', 'min:5', 'unique:author,author_name,' . $id],
                'author_slug' => [''],
                'author_overview' => [''],
                'author_gender' => ['required'],
                'author_status' => ['required'],
                'author_image' => ['mimes:jpeg,png,jpg,gif,svg', 'image']
            ],
            [
                'author_name.required' => 'Trường này bắt buộc phải nhập',
                'author_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'author_name.unique' => 'Tác giả *:input* đã tồn tại',

                'author_gender.required' => 'Giới tính chưa được chọn',
                'author_status.required' => 'Trạng thái chưa được chọn',
                'author_image.mimes' => 'Hình ảnh phải có đuôi mở rộng: .jpeg, .png, .jpg, .gif, .svg',
            ],
        );
        // $data = $request->all();

        $author = Author::find($id);
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
        $author->author_status = $request->author_status;

        $author->created_by = Auth::user()->id;
        $author->update();


        return redirect('admin/edit_author/' . $id)->with('message', 'Cập nhật thành công');
    }

    #DELETE
    public function destroy($id)
    {
        $data = Author::find($id);
        
        if ($data) {
            $old_image_exist = 'uploads/images/author/' . $data->author_image;
            if (File::exists($old_image_exist)) {
                File::delete($old_image_exist);
            }
        }
        $data->delete();
        return response()->json([
            'status' =>200,
            'message' => 'Deleted successfully'
        ]);
    }

    # GET - change status
    public function updateStatus(Request $request)
    {
        $data = Author::find($request->author_id);
        $data->author_status = $request->author_status;
        $data->save();

        return redirect('admin/author');
    }
}
