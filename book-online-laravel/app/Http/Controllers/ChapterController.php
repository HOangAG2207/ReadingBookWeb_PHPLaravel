<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\{Chapter, Book};

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all = Chapter::all();
        $book = Book::orderBy('book_name','asc')->get();
        // $data_chapter=Chapter::with('book')->orderBy('created_at', 'desc')->paginate(5);
        $data_chapter = Chapter::query()
        ->when($request->status !=null, function($query) use($request){
            return $query->where('chapter_status',$request->status);
        })
        ->when($request->book_id !=null, function($query) use($request){
            return $query->where('book_id','like','%'.$request->book_id.'%');
        })
        ->when($request->searchBox !=null, function($query) use($request){
            return $query->where('chapter_name','like','%'.$request->searchBox.'%')
            ->orWhere('chapter_number','like','%'.$request->searchBox.'%');
        })
        ->with('book')
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('backend.chapter.index')->with(compact('data_chapter','all','book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapter_book = Book::orderBy('book_name', "asc")->get();
        return view('backend.chapter.create')->with(compact('chapter_book'));
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
                'chapter_number' => ['required'],
                'chapter_name' => ['max:255'],
                'chapter_slug' => [''],
                'chapter_content' => [''],
                'chapter_status' => [''],
                'book_id' => ['required'],
            ],
            [
                'chapter_number.required' => 'Trường này bắt buộc phải nhập',
                // 'chapter_name.required' => 'Trường này bắt buộc phải nhập',
                // 'chapter_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'chapter_name.max' => 'Trường này phải có ít hơn :max kí tự',
                'book_id.required' => 'Chưa chọn sách',
            ],
        );

        $data = new Chapter();
        $data->chapter_number = $request->chapter_number;
        $data->chapter_name = $request->chapter_name;
        $data->chapter_slug = Str::slug('Chương','-') . '-' . Str::slug($request->chapter_number, '-');
        $data->chapter_content = $request->chapter_content;
        $data->book_id = $request->book_id;

        $data->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        $data->save();
        return back()->with('success', 'Đã thêm Chương ' . $data->chapter_number . ': ' . $data->chapter_name);
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
        $data_book = Book::orderBy('book_name', "asc")->get();
        $data_chapter=Chapter::find($id);
        return view('backend.chapter.edit')->with(compact('data_chapter','data_book'));
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
                'chapter_number' => ['required'],
                'chapter_name' => ['max:255'],
                'chapter_slug' => [''],
                'chapter_content' => [''],
                'chapter_status' => [''],
                'book_id' => ['required'],
            ],
            [
                'chapter_number.required' => 'Trường này bắt buộc phải nhập',
                // 'chapter_name.required' => 'Trường này bắt buộc phải nhập',
                // 'chapter_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'chapter_name.max' => 'Trường này phải có ít hơn :max kí tự',
                'book_id.required' => 'Chưa chọn sách',
            ],
        );

        $data = Chapter::find($id);
        $data->chapter_number = $request->chapter_number;
        $data->chapter_name = $request->chapter_name;
        $data->chapter_slug = Str::slug('Chương','-') . '-' . Str::slug($request->chapter_number, '-');
        $data->chapter_content = $request->chapter_content;
        $data->book_id = $request->book_id;

        $data->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $data->update();
        return back()->with('success', 'Đã cập nhật Chương');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Chapter::find($id);
        // $data->delete();
        // return back()->with('success', 'Đã xóa Chương '.$data->chapter_number.': '.$data->chapter_name);
    }
    public function delete(Request $request)
    {
        $data = Chapter::find($request->id);
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
        $data = Chapter::find($request->id);
        $data->chapter_status = !$data->chapter_status;
        $data->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $data->update();
        return response()->json(['status' => 'success']);
    }
}
