<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorimodul extends Model
{
    use HasFactory;

    protected $table = 'kategori_modul';

    protected $primaryKey = 'id_kategori_modul';

    protected $fillable = [
        'nama_kategori',
    ];
}
