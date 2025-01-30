<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    public function index()
    {
        $record = Header::first();
        return view('dynamic.header', compact('record'));
    }

    public function update(Request $request)
    {
        $header = Header::first();
        if (!$header) {
            $header = new Header();
        }

        if ($request->hasFile('logo')) {
            if ($header->logo) {
                $oldPath = public_path('admin/headerImage/' . $header->logo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $logoFile = $request->file('logo');
            $logoName = time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('admin/headerImage'), $logoName);
            
            $header->logo = $logoName;
        }

        $header->address = $request->address;
        $header->phone = $request->phone;
        $header->working_hours = $request->working_hours;

        // Icons ve Icon URLs için
        $icons = array_filter($request->icons ?? []);
        $iconUrls = array_filter($request->icon_urls ?? []);
        
        if (count($icons) === count($iconUrls)) {
            $header->icons = $icons;
            $header->icon_urls = $iconUrls;
        }

        $header->save();

        return redirect()->back()->with('success', 'Header başarıyla güncellendi!');
    }

    public function deleteIcon($index)
    {
        $header = Header::first();
        if ($header) {
            $icons = $header->icons;
            $iconUrls = $header->icon_urls;

            if (isset($icons[$index]) && isset($iconUrls[$index])) {
                unset($icons[$index]);
                unset($iconUrls[$index]);

                $header->icons = array_values($icons);
                $header->icon_urls = array_values($iconUrls);
                $header->save();
            }
        }
        return redirect()->back()->with('delete', 'İkon başarıyla silindi!');
    }

    public function view()
    {
        $header = Header::first();
        return $header;
    }
}
