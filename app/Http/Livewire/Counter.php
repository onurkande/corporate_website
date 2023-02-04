<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\CounterController')->view();
        return view('livewire.counter',['record'=>$this->record]);
    }
}
