<?php

namespace App\Http\Controllers;

use App\Models\LogAbsensi;
use App\Models\DataAtlit;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function absen(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id_user' => 'required|integer',
            'nama' => 'required|string',
        ]);
        // Ambil data dari request
        $id_user = $request->input('id_user');
        $nama = $request->input('nama');
        // dd($user_id);
        // Buat entri baru dalam tabel Log_Absensi
        $waktuAbsensi = now()->startOfDay();
        LogAbsensi::create([
            'user_id' => $id_user,
            'waktu_absensi' => $waktuAbsensi,
            //Tambahkan kolom lain yang sesuai dengan struktur tabel Log_Absensi
        ]);
        // Update kolom banyakAbsensi pada tabel DataAtlit
        $dataAtlit = DataAtlit::where('id', $id_user)->first();

        if ($dataAtlit) {
            $dataAtlit->banyakAbsen += 1;
            $dataAtlit->save();
        }
        // Kemudian, Anda dapat memberikan respons sesuai dengan hasil absen
        return response()->json(['message' => 'Absen berhasil']);
    }
    public function batalAbsen(Request $request)
    {
        $id_user = $request->input('id_user');

        // Hapus data absensi dari tabel Log_Absensi
        LogAbsensi::where('user_id', $id_user)
            ->whereDate('waktu_absensi', now()->toDateString())
            ->delete();

        // Update kolom banyakAbsen pada tabel DataAtlit
        $dataAtlit = DataAtlit::find($id_user); // Gantilah 'id' dengan kolom yang sesuai dalam tabel DataAtlit

        if ($dataAtlit) {
            $dataAtlit->banyakAbsen -= 1;
            $dataAtlit->save();
        }

        return response()->json(['message' => 'Absen dibatalkan']);
    }
    public function getJumlahAbsensi()
    {
        // Ambil jumlah data absensi di hari ini
        $jumlahAbsensi = LogAbsensi::whereDate('waktu_absensi', now()->toDateString())->count();

        // Kembalikan jumlah data dalam format JSON
        return response()->json(['jumlahAbsensi' => $jumlahAbsensi]);
    }
}
