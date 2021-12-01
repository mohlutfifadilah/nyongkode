<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submodul;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SubmodulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('admin.submodul-create', [
            'id_modul' => $id
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
        if ($request->hasFile('gambar')) {
            $logoImage = $request->file('gambar');
            $gambar = $logoImage->getClientOriginalName();
        }

        $id_modul = $request->id_modul;
        $modul    = $request->modul;
        $isi      = $request->isi;

        $validator = Validator::make($request->all(), [
            'modul'  => 'required',
            'isi'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/submodul/' . $request->id_modul)->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Sub Modul', 'type' => 'error']);
        }

        $submodul = new Submodul;

        $submodul->id_modul = $id_modul;
        $submodul->nama_sub_modul = $modul;
        if ($request->hasFile('gambar')) {
            $submodul->gambar   = $gambar;
            $tujuan_upload = 'gambar';
            $logoImage->move($tujuan_upload, $gambar);
        }
        $submodul->isi      = $isi;

        $submodul->save();

        return redirect('/modul/' . $request->id_modul)->with(['status' => 'Berhasil Ditambahkan', 'title' => 'Data Sub Modul', 'type' => 'success']);
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
        $modul = Submodul::find($id);
        return view('admin.submodul-edit', [
            'modul' => $modul
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
        if ($request->hasFile('gambar')) {
            $logoImage = $request->file('gambar');
            $gambar = $logoImage->getClientOriginalName();
        }

        $modul    = $request->modul;
        $isi      = $request->isi;

        $validator = Validator::make($request->all(), [
            'modul'  => 'required',
            'isi'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/submodul/' . $id . '/edit')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Sub Modul', 'type' => 'error']);
        }

        if ($request->hasFile('gambar')) {

            $foto = Submodul::where('id_sub_modul', $id)->first();
            File::delete('gambar/' . $foto->gambar);

            $tujuan_upload = 'gambar';
            $logoImage->move($tujuan_upload, $gambar);

            DB::table('sub_modul')
                ->where('id_sub_modul', $id)
                ->update([
                    'nama_sub_modul' => $modul,
                    'isi'            => $isi,
                    'gambar'         => $gambar
                ]);
        } else {
            DB::table('sub_modul')
                ->where('id_sub_modul', $id)
                ->update([
                    'nama_sub_modul' => $modul,
                    'isi'            => $isi,
                ]);
        }


        return redirect('/modul/' . $request->id_modul)->with(['status' => 'Berhasil Diubah', 'title' => 'Data Sub Modul', 'type' => 'success']);
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
        $sub = Submodul::find($id);
        File::delete('gambar/' . $sub->gambar);

        DB::table('sub_modul')->where(['id_sub_modul' => $id])->delete();
        $sub->delete();

        return redirect('/modul/' . $sub->id_modul)->with(['status' => 'Berhasil Dihapus', 'title' => 'Data Sub Modul', 'type' => 'success']);
    }
}
