<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Alert;
use Illuminate\Support\Facades\DB;

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
                })->addColumn('level', function ($user) {
                    if ($user->id_level == 1) {
                        return 'Admin';
                    } else if ($user->id_level == 2) {
                        return 'User';
                    } else {
                        return 'Super User';
                    }
                })->addColumn('action', 'admin.user-action')
                ->rawColumns(['action', 'image', 'level'])
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
        $level    = $request->level;
        $nama     = $request->nama;
        $username = $request->username;
        $password = $request->password;

        $validator = Validator::make($request->all(), [
            'level'       => 'required',
            'nama'        => 'required',
            'username'    => 'required',
            'password'    => 'required | confirmed | min:8'
        ]);

        if ($validator->fails()) {
            return redirect('/user/create')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data User', 'type' => 'error']);
        }

        $user = new User;

        if ($level == 'User') {
            $user->id_level = 2;
        } else if ($level == 'Admin') {
            $user->id_level = 1;
        } else {
            $user->id_level = 3;
        }

        $user->foto         = 'default.jpg';
        $user->nama         = $nama;
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
        $user  = User::find($id);
        return view('admin.user-edit', [
            'user' => $user,
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
        if ($request->level == 'Admin') {
            $level = 1;
        } else if ($request->level == 'User') {
            $level = 2;
        } else {
            $level = 3;
        }
        $email    = $request->email;
        $nama     = $request->nama;
        $username = $request->username;
        $password = $request->password;

        if ($email == NULL) {
            $validator = Validator::make($request->all(), [
                'level'       => 'required',
                'nama'        => 'required',
                'username'    => 'required',
                'password'    => 'required | confirmed | min:8'
            ]);

            if ($validator->fails()) {
                return redirect('/user/' . $id . '/edit')->withErrors($validator)
                    ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data User', 'type' => 'error']);
            }

            DB::table('users')
                ->where('id', $id)
                ->update([
                    'id_level'   => $level,
                    'nama'       => $nama,
                    'username'   => $username,
                    'password'   => $password,
                ]);
        } else {
            $validator = Validator::make($request->all(), [
                'level'       => 'required',
                'email'       => 'email:rfc,dns | required',
                'nama'        => 'required',
                'username'    => 'required',
                'password'    => 'required | confirmed | min:8'
            ]);

            if ($validator->fails()) {
                return redirect('/user/' . $id . '/edit')->withErrors($validator)
                    ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data User', 'type' => 'error']);
            }

            DB::table('users')
                ->where('id', $id)
                ->update([
                    'id_level'   => $level,
                    'nama'       => $nama,
                    'email'      => $email,
                    'username'   => $username,
                    'password'   => $password,
                ]);
        }

        return redirect('user')->with(['status' => 'Berhasil Diubah', 'title' => 'Data User', 'type' => 'success']);
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
        $user  = User::find($id);
        DB::table('users')->where(['id' => $user->id])->delete();
        $user->delete();
        return redirect('user')->with(['status' => 'Berhasil Dihapus', 'title' => 'Data User', 'type' => 'success']);
    }
}
