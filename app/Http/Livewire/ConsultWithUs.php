<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConsultWithUs extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\ConsultWithUsController')->view();
        return view('livewire.consult-with-us',['record'=>$this->record]);
    }
}
