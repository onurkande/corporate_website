<?php

namespace App\Http\Controllers;

use App\Models\OurServices;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    function index()
    {
        $record = OurServices::first();
        return view('dynamic.our-services',compact('record'));
    }

    function update(Request $request)
    {
        $record = OurServices::first();
        if (!$record) {
            $record = new OurServices();
        }

        $record->title = $request->title;
        $record->content = $request->content;
        $record->content_rows = json_encode($request->content_rows);
        $record->save();

        return redirect()->back()->with('store', 'Our Services başarıyla eklendi!');
    }

    function delete($index)
    {
        $record = OurServices::first();
        $content_rows = json_decode($record->content_rows);
        unset($content_rows[$index]);
        $record->content_rows = json_encode($content_rows);
        $record->save();
        return redirect()->back()->with('delete', 'Our Services content rows başarıyla silindi!');
    }

    function allDelete()
    {
        $record = OurServices::first();
        $record->delete();
        return redirect()->back()->with('delete', 'Our Services başarıyla silindi!');
    }

    function view()
    {
        $record = OurServices::first();
        return $record;
    }
}
