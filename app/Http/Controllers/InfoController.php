<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    function index()
    {
        $record = Info::first();
        return view('dynamic.info',compact('record'));
    }

    function update(Request $request)
    {
        $record = Info::first();
        if (!$record) {
            $record = new Info();
        }

        $record->title = $request->title;
        $record->bigtitle = $request->bigtitle;
        $record->content = $request->content;
        $record->save();

        return redirect()->back()->with('store', 'Info başarıyla eklendi!');
    }

    function delete()
    {
        $record = Info::first();
        $record->delete();

        return redirect()->back()->with('delete', 'Info başarıyla silindi!');
    }

    function view()
    {
        $record = Info::first();
        return $record;
    }
}
