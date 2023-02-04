<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ContactUsRowController;
use Livewire\Component;

class ContactUsRow extends Component
{
    public $record;
    public function render()
    {
        $this->record=ContactUsRowController::view();
        return view('livewire.contact-us-row',['record'=>$this->record]);
    }
}
