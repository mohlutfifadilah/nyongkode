<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorimodul;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Modul;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Kategorimodul::all();
        if (request()->ajax()) {
            return datatables()->of($user)
                ->addColumn('action', 'admin.kategori-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.kategori');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kategori-create');
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
        $nama_kategori     = $request->nama_kategori;

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/kategori/create')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Kategori', 'type' => 'error']);
        }

        $kategori = new Kategorimodul;

        $kategori->nama_kategori = $nama_kategori;

        $kategori->save();

        return redirect('kategori')->with(['status' => 'Berhasil Ditambahkan', 'title' => 'Data Kategori', 'type' => 'success']);
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
        $kategori  = Kategorimodul::find($id);
        return view('admin.kategori-edit', [
            'kategori' => $kategori,
        ]);
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
        $nama_kategori     = $request->nama_kategori;

        $validator = Validator::make($request->all(), [
            'nama_kategori'        => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/kategori/' . $id . '/edit')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Kategori', 'type' => 'error']);
        }

        DB::table('kategori_modul')
            ->where('id_kategori_modul', $id)
            ->update([
                'nama_kategori'       => $nama_kategori,
            ]);

        return redirect('kategori')->with(['status' => 'Berhasil Diubah', 'title' => 'Data Kategori', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kategori  = Kategorimodul::find($id);
        $kategori->delete();

        Modul::where(['id_kategori_modul' => $kategori->id_kategori_modul])->delete();

        return redirect('kategori')->with(['status' => 'Berhasil Dihapus', 'title' => 'Data Kategori', 'type' => 'success']);
    }
}
