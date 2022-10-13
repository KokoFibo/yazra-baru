<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use DataTables;

class DataController extends Controller
{

    public function index()
    {
        $data = Data::get();
        if (request()->ajax()) {

            return datatables()->of($data)
                ->addColumn('aksi', function ($data) {

                    $button = "<button class=' edit btn btn-danger' id='" . $data->id . "'>Edit</button>";
                    $button .= "<button class=' hapus btn btn-danger' id='" . $data->id . "'>Hapus</button>";
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('home');
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
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
}
