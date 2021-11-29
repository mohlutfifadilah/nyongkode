<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submodul extends Model
{
    use HasFactory;

    protected $table = 'sub_modul';

    protected $primaryKey = 'id_sub_modul';

    protected $fillable = [
        'id_modul',
        'nama_sub_modul',
        'gambar',
        'isi',
    ];
}
