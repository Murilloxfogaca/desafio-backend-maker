<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Film;
use Illuminate\Support\Facades\Storage;

class CreateFilm extends Component
{
    use WithFileUploads;

    public $director;
    public $summary;
    public $title;
    public $cover;

    protected $rules = [
        'director' => 'required|string|max:100',
        'title' => 'required|string|max:100',
        'summary' => 'required|string',
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function save()
    {
        $this->validate();

        $path = $this->cover->store('imagens', 'public');

        $film = Film::create([
            'director' => $this->director,
            'title' => $this->title,
            'summary' => $this->summary,
            'cover' => $path,
        ]);

        $this->director = null;
        $this->title = null;
        $this->summary = null;
        $this->cover = null;

        return redirect()->route('see', $film->id);
    }


    public function render()
    {
        return view('livewire.web.create-film');
    }
}
