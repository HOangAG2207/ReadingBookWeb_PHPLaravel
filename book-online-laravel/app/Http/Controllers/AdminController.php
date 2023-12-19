<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Genre, Book, Chapter, Admin};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genre_count = Genre::count();
        $book_count = Book::count();
        $chapter_count = Chapter::count();
        return view('backend.dashboard')->with(compact('genre_count', 'book_count', 'chapter_count'));
    }

    public function login_form()
    {
        return view('backend.admin_auth.login');
    }
    public function login_submit(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                'email' => 'required|email|max:255',
                'password' => 'required|min:8',
            ],
            [
                'email.required' => 'Email không được bỏ trống',
                'email.email' => 'Sai định dạng mail.',
                'email.max' => 'Email chỉ được tối đa 255 kí tự',
                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu cần ít nhất 8 kí tự'
            ]
        );

        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!!!');
        } else {
            return back()->with('error', 'Sai thông tin đăng nhập!!!');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_form');
    }
    public function personal()
    {
        return view('backend.admin_auth.detail');
    }
    public function personal_update(Request $request)
    {
        $data = $request->all();
        $request->validate(
            [
                'admin_name' => ['required', 'max:255'],
                'admin_phone' => [''],
                'admin_address' => ['max:255'],
                'admin_image' => [''],
            ],
            [
                'admin_name.required' => 'Trường này bắt buộc phải nhập',
                'admin_name.max' => 'Trường này phải có ít hơn :max kí tự',
                'admin_address.max' => 'Trường này phải có ít hơn :max kí tự',
            ],
        );
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        // dd($admin->name);
        $admin->name = $data['admin_name'];
        $admin->phone = $data['admin_phone'];
        $admin->address = $data['admin_address'];
        if ($request->hasfile('ad_avatar')) {
            if ($admin->avatar != null) {
                $old_image_exist = storage_path('app/public/uploads/Admin_image/' . $admin->avatar);
                if (File::exists($old_image_exist)) {
                    unlink($old_image_exist);
                }
            }

            $file = $request->file('ad_avatar');
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $file_name = Str::slug($data['admin_name'], '-') . '_' . date('Hisdmy') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/Admin_image', $file_name);

            $admin->avatar = $file_name;
        }
        $admin->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $admin->update();
        // Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['admin_name'],'phone'=>$data['admin_phone'],'address'=>$data['admin_address']]);
        return back()->with('success', 'Thay đổi thông tin thành công!!!');
    }
    public function changePwd()
    {
        return view('backend.admin_auth.changePassword');
    }
    public function changePwd_update(Request $request)
    {
        $request->validate(
            [
                'current_pwd' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if (!Hash::check($value, Auth::guard('admin')->user()->password)) {
                            $fail('Mật khẩu hiện tại không chính xác. Vui lòng kiểm tra lại.');
                        }
                    },
                ],
                'new_pwd' => 'required|min:8|different:current_pwd',
                'confirm_new_pwd' => 'required_with:new_pwd|same:new_pwd',
            ],
            [
                'current_pwd.required' => 'Vui lòng nhập mật khẩu hiện tại.',
                'current_pwd.custom' => 'Mật khẩu hiện tại không chính xác.',

                'new_pwd.required' => 'Vui lòng nhập mật khẩu mới.',
                'new_pwd.min' => 'Mật khẩu mới phải chứa ít nhất 8 ký tự.',
                'new_pwd.different' => 'Mật khẩu mới không được giống với mật khẩu hiện tại.',

                'confirm_new_pwd.required_with' => 'Vui lòng xác nhận mật khẩu mới.',
                'confirm_new_pwd.same' => 'Mật khẩu xác nhận không trùng khớp với mật khẩu mới.',
            ]
        );
        $new_pwd = Hash::make($request->input('new_pwd'));
        Admin::where('email',Auth::guard('admin')->user()->email)->update(['password'=>$new_pwd]);

        return back()->with('success', 'Mật khẩu đã được cập nhật thành công.');
    }
}
