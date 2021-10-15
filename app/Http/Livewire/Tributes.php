<?php

namespace App\Http\Livewire;

use App\Tribute;
use Livewire\Component;
use Livewire\WithPagination;

class Tributes extends Component
{
    use WithPagination;
    public $tribute;

    public function addTribute(){
        $this->validate(['tribute' => 'required']);

        $createdTribute = Tribute::create([
            'tribute' => $this->tribute,
            'user_id' => auth()->user()->id,
        ]);

        $this->tribute = '';

        session()->flash('message', 'Tribute Saved Successfully');
    }

    public function render()
    {
        return view('livewire.tributes', ['tributes' => Tribute::orderBy('created_at', 'DESC')->simplepaginate(5)]);
    }


}
