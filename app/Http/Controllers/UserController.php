<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAtlit;
use App\Models\LogAbsensi;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DataAtlit::select('id', 'Nama', 'namaPanggilan', 'banyakAbsen')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Cek apakah pengguna sudah absen di hari ini
                    $hasAbsenToday = LogAbsensi::where('user_id', $row->id)
                        ->whereDate('waktu_absensi', now()->toDateString())
                        ->exists();

                    // Jika sudah absen, tampilkan tombol "Batal Absen"
                    if ($hasAbsenToday) {
                        return '<a href="javascript:void(0)" class="btn btn-danger btn-sm batal-absen-button" data-id_user="' . $row->id . '" data-nama="' . $row->namaPanggilan . '"><small>Batal Absen</small></a>';
                    }

                    // Jika belum absen, tampilkan tombol "Absen"
                    return '<a href="javascript:void(0)" class="btn btn-warning btn-sm absen-button" data-id_user="' . $row->id . '" data-nama="' . $row->namaPanggilan . '"><small>Absen</small></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('welcome');
    }

    public function simpanData(Request $request)
    {
        // Validasi data yang masuk jika diperlukan
        $validatedData = $request->validate([
            'Nama' => 'required',
            'namaPanggilan' => 'required',
        ]);
        // dd($validatedData);
        // Gunakan metode create() untuk membuat dan menyimpan data
        DataAtlit::create($validatedData);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }
}
