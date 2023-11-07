<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\View;
use App\Models\Testu;

class TestuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.testu.index');
    }
    public function getData(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $status = $request->input('status'); // Add this line to get the status

        $query = Testu::query();

        // Apply search filter
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Apply status filter
        if ($status !== null) {
            $query->where('status', $status);
        }

        $data = $query->get();
        $html = view('backend.testu.data-row', compact('data'))->render();
        return response()->json(['html' => $html]);
        // return response()->json(['data' => $data]);
    }
    public function changeStatus()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Testu::find($id);
        $item->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }
}
