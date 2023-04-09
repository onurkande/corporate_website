<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InfoBox extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\InfoBoxController')->view();
        return view('livewire.info-box',['record'=>$this->record]);
    }
}
