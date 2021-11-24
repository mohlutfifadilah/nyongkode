<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class DataController extends Controller
{
    //
    public function data()
    {
        $model = User::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('admin.layoutadmin._action', [
                    'model' => $model,
                    'url_show' => route('user.show', $model->id),
                    'url_edit' => route('user.edit', $model->id),
                    'url_destroy' => route('user.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
