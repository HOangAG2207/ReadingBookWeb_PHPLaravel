<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Storage;
use Carbon\Carbon;

use App\Models\{Genre};
use Psy\Readline\Hoa\Console;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $data_genre = Genre::query()->orderBy('created_at', 'desc')->paginate(5);
        // return view('backend.genre.index', compact('data_genre'));
        // return ($request->status.' a '.$request->searchBox);
        $all = Genre::all();
        $data_genre = Genre::query()
        ->when($request->status !=null, function($query) use($request){
            return $query->where('genre_status',$request->status);
        })
        ->when($request->searchBox !=null, function($query) use($request){
            return $query->where('genre_name','like','%'.$request->searchBox.'%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        
        return view('backend.genre.index', compact('data_genre','all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.genre.create');
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
                'genre_name' => ['required', 'max:255', 'min:5', 'unique:genre'],
                'genre_slug' => [''],
                'genre_description' => [''],
                'genre_status' => [''],
            ],
            [
                'genre_name.required' => 'Trường này bắt buộc phải nhập',
                'genre_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'genre_name.max' => 'Trường này phải có ít hơn :max kí tự',
                'genre_name.unique' => 'Thể loại *:input* đã tồn tại',
            ],
        );
        $genre = new Genre();
        $genre->genre_name = $request->genre_name;
        $genre->genre_slug = Str::slug($request->genre_name, '-');
        $genre->genre_description = $request->genre_description;

        $genre->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        // $genre->genre_status = $request->genre_status;

        $genre->save();
        return back()->with('success', 'Đã thêm thể loại ' . $genre->genre_name);
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
        $data_genre = Genre::find($id);
        return view('backend.genre.edit')->with(compact('data_genre'));;
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
                'genre_name' => ['required', 'max:255', 'min:5', 'unique:genre,genre_name,' . $id],
                'genre_slug' => [''],
                'genre_description' => [''],
                'genre_status' => [''],
            ],
            [
                'genre_name.required' => 'Trường này bắt buộc phải nhập',
                'genre_name.min' => 'Trường này phải có ít nhất :min kí tự',
                'genre_name.max' => 'Trường này phải có ít hơn :max kí tự',
                'genre_name.unique' => 'Thể loại *:input* đã tồn tại',
            ],
        );
        $genre = Genre::find($id);
        if ($request->genre_name != $genre->genre_name) {
            $genre->genre_name = $request->genre_name;
        }
        $genre->genre_slug = Str::slug($request->genre_name, '-');
        $genre->genre_description = $request->genre_description;

        $genre->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $genre->genre_status = $request->genre_status;

        $genre->update();

        return back()->with('success', 'Đã cập nhật thể loại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Genre::find($id);
        // $data->delete();
        // return back()->with('success', 'Đã xóa thể loại '.$data->genre_name);
    }
    public function delete(Request $request)
    {
        $data = Genre::find($request->id);
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
        $data = Genre::find($request->id);
        $data->genre_status = !$data->genre_status;
        $data->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $data->update();
        return response()->json(['status' => 'success']);
    }
}
