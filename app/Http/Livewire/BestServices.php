<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BestServicesController;
use Livewire\Component;


class BestServices extends Component
{
    public $record;
    public function render()
    {
        $this->record = BestServicesController::view();
        return view('livewire.best-services',['record'=>$this->record]);
    }
}
