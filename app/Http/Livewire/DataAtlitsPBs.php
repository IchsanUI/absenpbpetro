<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DataAtlitsPB;

class DataAtlitsPBs extends Component
{
    public function render()
    {
        $atlitPBs = DataAtlitsPB::all();
        return view('livewire.data-atlits-pb', ['atlitPBs' => $atlitPBs]);
    }
}
