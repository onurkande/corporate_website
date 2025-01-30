<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public $footer;
    public function render()
    {
        $this->footer = app('App\Http\Controllers\FooterController')->view();
        return view('livewire.footer', [
            'footer' => $this->footer
        ]);
    }
}
