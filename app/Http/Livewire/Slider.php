<?php

namespace App\Http\Livewire;

use App\Models\Slider as SliderModel;
use Livewire\Component;

class Slider extends Component
{
    public function render()
    {
        $sliders = SliderModel::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        return view('livewire.slider', [
            'sliders' => $sliders
        ]);
    }
}
