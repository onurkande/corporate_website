<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Team extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\TeamController')->view();
        return view('livewire.team',['record'=>$this->record]);
    }
}
