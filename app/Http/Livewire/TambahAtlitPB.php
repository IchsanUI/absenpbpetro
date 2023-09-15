<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DataAtlitsPB;


class TambahAtlitPB extends Component
{
    public $modal = false;
    public $nama;
    public $namaPanggilan;

    public function render()
    {
        return view('livewire.tambah-atlit-p-b');
    }

    public function showForm()
    {
        $this->modal = true;
    }

    public function hideForm()
    {
        $this->modal = false;
    }

    public function tambahData()
    {
        // Validasi input data jika diperlukan
        $this->validate([
            'nama' => 'required',
            'namaPanggilan' => 'required',
        ]);

        // Tambahkan data ke database
        DataAtlitsPB::create([
            'Nama' => $this->nama,
            'namaPanggilan' => $this->namaPanggilan,
        ]);

        // Bersihkan input setelah menambahkan data
        $this->reset(['nama', 'namaPanggilan']);

        // Tutup modal
        $this->emit('close-modal');

        // Emit event untuk memberi tahu bahwa data telah ditambahkan
        $this->emit('dataDitambahkan');
    }
}
