<?php

namespace App\Http\Livewire;

use App\Stories;
use Livewire\Component;
use Livewire\WithFileUploads;

class Story extends Component
{
    use WithFileUploads;

    public $story;
    public $image;

    public function addStory(){
        $createdStory = $this->validate([
            'story' => 'required',
            'image' => 'image',
            ]);

        $imagename = $this->image->store("images");

        $createdStory['name'] = $imagename;

        if($this->image){
            $file = $imagename;
//            $extension = $file->getClientOriginalExtension();
//            $filename = time() . '.' . $extension;
            $file->move('uploads/contestants', $imagename);
            $image = $imagename;
        }


        Stories::create([
            'story' => $this->story,
            'image' => $image,
            'user_id' => auth()->user()->id,
        ]);

        $this->story = '';

        session()->flash('message', 'Story Saved Successfully');
    }

    public function render()
    {
        return view('livewire.story')->with('stories', Stories::all());
    }
}
