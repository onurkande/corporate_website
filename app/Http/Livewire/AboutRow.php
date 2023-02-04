<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AboutRow extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\AboutRowController')->view();
        return view('livewire.about-row',['record'=>$this->record]);
    }
}
