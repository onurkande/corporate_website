<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('dynamic.slider', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/sliderImage'), $fileName);
            $data['image'] = $fileName;
        }

        Slider::create($data);

        return redirect()->route('sliders.index')->with('success', 'Slider başarıyla oluşturuldu.');
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete('admin/sliderImage/' . $slider->image);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/sliderImage'), $fileName);
            $data['image'] = $fileName;
        }

        $slider->update($data);

        return redirect()->route('sliders.index')->with('success', 'Slider başarıyla güncellendi.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete('admin/sliderImage/'.$slider->image);
        }
        
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider başarıyla silindi.');
    }
} 