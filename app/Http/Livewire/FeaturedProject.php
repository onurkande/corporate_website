<?php

namespace App\Http\Livewire;

use App\Http\Controllers\FeaturedProjectController;
use Livewire\Component;

class FeaturedProject extends Component
{
    public $record;
    public function render()
    {
        $this->record=FeaturedProjectController::view();
        return view('livewire.featured-project',['record'=>$this->record]);
    }
}
