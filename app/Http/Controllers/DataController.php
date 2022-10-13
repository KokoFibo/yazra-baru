<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use DataTables;

class DataController extends Controller
{

    public function index()
    {
        $data = Data::orderBy('id', 'desc')->get();
        if (request()->ajax()) {

            return datatables()->of($data)
                ->addColumn('aksi', function ($data) {
                    return view('tombol')->with('data', $data);
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('home');
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'telp' => 'required'
            ],
            [
                'nama.required' => 'Nama Wajib diisi',
                'alamat.required' => 'Alamat Wajib diisi',
                'telp.required' => 'Telepon Wajib diisi',
            ]
        );
        $data = new Data();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->telp = $request->telp;
        $simpan = $data->save();
    }

    public function edit($id)
    {


        $data = Data::where('id', $id)->first();
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'telp' => 'required'
            ],
            [
                'nama.required' => 'Nama Wajib diisi',
                'alamat.required' => 'Alamat Wajib diisi',
                'telp.required' => 'Telepon Wajib diisi',
            ]
        );

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ];
        Data::where('id', $id)->update($data);
        return response()->json(['success' => "Data berhasil di update"]);
    }


    public function destroy($id)
    {
        Data::where('id', $id)->delete();
    }
}
