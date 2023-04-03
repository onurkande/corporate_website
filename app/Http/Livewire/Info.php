<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Info extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\InfoController')->view();
        return view('livewire.info',['record'=>$this->record]);
    }
}
