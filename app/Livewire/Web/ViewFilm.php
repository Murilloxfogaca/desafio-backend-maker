<?php

namespace App\Livewire\Web;

use Livewire\Component;
use App\Models\Film;
use Illuminate\Http\Request;

class ViewFilm extends Component
{
    public $id;

    public function construct($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $film = Film::find($this->id);
        return view('livewire.web.view-film', compact('film'));
    }
}
