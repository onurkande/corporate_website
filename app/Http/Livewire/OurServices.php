<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OurServices extends Component
{
    public $record;
    public function render()
    {
        $this->record=app('App\Http\Controllers\OurServicesController')->view();
        return view('livewire.our-services',['record'=>$this->record]);
    }
}
