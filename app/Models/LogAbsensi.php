<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAbsensi extends Model
{
    use HasFactory;

    protected $table = 'log_absensi';

    protected $fillable = [
        'user_id',
        'waktu_absensi',
        // Tambahkan kolom lain sesuai kebutuhan Anda
    ];

    // Definisikan hubungan dengan model User jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
