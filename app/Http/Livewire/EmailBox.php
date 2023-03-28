<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmailBox extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\EmailBoxController')->view();
        return view('livewire.email-box',['record'=>$this->record]);
    }
}
