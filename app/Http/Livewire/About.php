<?php

namespace App\Http\Livewire;

use Livewire\Component;

class About extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\AboutController')->view();
        return view('livewire.about',['record'=>$this->record]);
    }
}
