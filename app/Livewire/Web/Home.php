<?php

namespace App\Livewire\Web;

use Livewire\Component;
use App\Models\Film;

class Home extends Component
{
    public function render()
    {
        $films = Film::orderBy('id', 'DESC')->paginate(100);
        return view('livewire.web.home', compact('films'));
    }
}
