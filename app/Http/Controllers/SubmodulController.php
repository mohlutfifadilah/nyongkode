<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submodul;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $modul    = $request->modul;
        $isi      = $request->editordata;

        $validator = Validator::make($request->all(), [
            'modul'  => 'required',
            'editordata'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/submodul/' . $request->id_modul)->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Sub Modul', 'type' => 'error']);
        }

        $dom = new \DomDocument();
        $dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'));
        }

        foreach ($image_file as $key => $image) {
            $data = $image->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $img_data = base64_decode($data);
            $image_name = "/uploads/" . time() . $key . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $img_data);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $isi = $dom->saveHTML();
        $submodul = new Submodul;

        $submodul->id_modul = $id_modul;
        $submodul->nama_sub_modul = $modul;
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
        // if ($request->hasFile('gambar')) {
        //     $logoImage = $request->file('gambar');
        //     $gambar = $logoImage->getClientOriginalName();
        // }

        $modul    = $request->modul;
        $isi      = $request->editordata;

        $validator = Validator::make($request->all(), [
            'modul'  => 'required',
            'editordata'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/submodul/' . $id . '/edit')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Sub Modul', 'type' => 'error']);
        }

        $dom = new \DomDocument();
        $dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'));
        }

        foreach ($image_file as $key => $img) {
            $data = $img->getAttribute('src');

            if (preg_match('/data:image/', $data)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups);
                $mime_type = $groups['mime'];

                //convert data 
                // $dataConvert = base64_decode($data);
                // $image_name = time() . $key . '.png';

                // store into folder
                $img_data = base64_decode($data);
                $image_name = "/uploads/" . time() . $key . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $img_data);
                // Storage::disk('public')->put('/uploads/' . $image_name, $dataConvert);
                // $path = Storage::url('/uploads/' . $image_name);

                // set path in database 
                $img->removeattribute('src');
                $img->setattribute('src', $path);
            }
        }

        $isi = $dom->saveHTML();

        // if ($request->hasFile('gambar')) {

        //     $foto = Submodul::where('id_sub_modul', $id)->first();
        //     File::delete('gambar/' . $foto->gambar);

        //     $tujuan_upload = 'gambar';
        //     $logoImage->move($tujuan_upload, $gambar);

        //     DB::table('sub_modul')
        //         ->where('id_sub_modul', $id)
        //         ->update([
        //             'nama_sub_modul' => $modul,
        //             'isi'            => $isi,
        //             'gambar'         => $gambar
        //         ]);
        // } else {
        DB::table('sub_modul')
            ->where('id_sub_modul', $id)
            ->update([
                'nama_sub_modul' => $modul,
                'isi'            => $isi,
            ]);
        // }


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
