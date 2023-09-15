<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DataAtlitsPB;

class DataAtlitsPBTable extends Component
{
    public $atlitPBs;
    // Di komponen Livewire yang menampilkan data
    public $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        $this->atlitPBs = DataAtlitsPB::all();
        return view('livewire.data-atlits-p-b-table');
    }
}
