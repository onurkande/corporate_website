<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ContactUsLineController;
use Livewire\Component;

class ContactUsLine extends Component
{
    public $record;
    public function render()
    { 
        $this->record=ContactUsLineController::view();
        return view('livewire.contact-us-line',['record'=>$this->record]);
    }
}
