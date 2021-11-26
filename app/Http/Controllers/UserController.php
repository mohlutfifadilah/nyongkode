<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        if (request()->ajax()) {

            return datatables()->of($user)
                ->addColumn('image', function ($user) {
                    $image = asset('foto-user/' . $user->foto);
                    return '<img src="' . $image . '" class="img-fluid rounded-circle mx-auto d-block" />';
                })->addColumn('action', 'admin.user-action')
                ->rawColumns(['action', 'image'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user-create');
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
        $nama     = $request->nama;
        $username = $request->username;
        $password = $request->password;

        $validator = Validator::make($request->all(), [
            'nama'        => 'required',
            'username'    => 'required',
            'password'    => 'required | confirmed | min:8'
        ]);

        if ($validator->fails()) {
            return redirect('/user/create')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data User', 'type' => 'error']);
        }

        $user = new User;

        $user->id_level = 2;
        $user->foto = 'default.jpg';
        $user->nama     = $nama;
        $user->username     = $username;
        $user->password     = Hash::make($password);

        $user->save();

        return redirect('user')->with(['status' => 'Berhasil Ditambahkan', 'title' => 'Data User', 'type' => 'success']);
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

    public function json()
    {
        // return DataTables::of(User::all())->make(true);
        return 'dawdaw';
    }
}
