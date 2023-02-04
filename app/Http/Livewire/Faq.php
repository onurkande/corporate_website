<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Faq extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\FaqController')->view();
        return view('livewire.faq',['record'=>$this->record]);
    }
}
