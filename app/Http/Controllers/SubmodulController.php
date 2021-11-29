<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submodul;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $id_modul = $request->id_modul;
        $gambar   = $request->gambar;
        $isi      = $request->isi;

        $validator = Validator::make($request->all(), [
            'isi'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/submodul/' . $request->id_modul)->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Sub Modul', 'type' => 'error']);
        }

        $submodul = new Submodul;

        $submodul->id_modul = $id_modul;
        $submodul->gambar   = $gambar;
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
        //
    }
}
