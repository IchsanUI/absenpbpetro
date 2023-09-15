<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAtlitsPB extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'data_atlitpb';

    // Atribut yang dapat diisi (fillable)
    protected $fillable = [
        'Nama',
        'namaPanggilan',
        'banyakAbsen',
    ];
}
