<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Kategorimodul;
use App\Models\Submodul;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modul = Modul::all();
        return view('admin.modul', [
            'modul' => $modul,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategorimodul::all();

        return view('admin.modul-create', [
            'kategori' => $kategori
        ]);
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
        $kategori     = $request->kategori;
        $modul     = $request->modul;


        $validator = Validator::make($request->all(), [
            'kategori'  => 'required',
            'modul'     => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/modul/create')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Modul', 'type' => 'error']);
        }

        $id = DB::table('kategori_modul')->where('nama_kategori', $kategori)->value('id_kategori_modul');


        $in = new Modul;

        $in->id_kategori_modul = $id;
        $in->nama_modul     = $modul;

        $in->save();

        return redirect('modul')->with(['status' => 'Berhasil Ditambahkan', 'title' => 'Data Modul', 'type' => 'success']);
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
        $modul = Modul::find($id);
        $sub_modul = DB::table('sub_modul')->where('id_modul', $id)->get();
        return view('admin.modul-detail', [
            'modul' => $modul,
            'sub'   => $sub_modul
        ]);
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
        $modul  = Modul::find($id);
        $kategori = Kategorimodul::all();
        return view('admin.modul-edit', [
            'modul' => $modul,
            'kategori' => $kategori
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
        $modul     = $request->modul;

        $validator = Validator::make($request->all(), [
            'kategori'     => 'required',
            'modul'        => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/modul/' . $id . '/edit')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Modul', 'type' => 'error']);
        }

        $kategori = DB::table('kategori_modul')->where('nama_kategori', $request->kategori)->value('id_kategori_modul');


        DB::table('modul')
            ->where('id_modul', $id)
            ->update([
                'id_kategori_modul' => $kategori,
                'nama_modul'        => $modul,
            ]);

        return redirect('modul')->with(['status' => 'Berhasil Diubah', 'title' => 'Data Modul', 'type' => 'success']);
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
        $modul  = Modul::find($id);
        $modul->delete();

        Submodul::where(['id_modul' => $id])->delete();

        return redirect('modul')->with(['status' => 'Berhasil Dihapus', 'title' => 'Data Modul', 'type' => 'success']);
    }
}
