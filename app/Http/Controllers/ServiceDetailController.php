<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    function index()
    {
        $record = ServiceDetail::first();
        return view('dynamic.service-detail',['record'=>$record]);
    }

    function update(Request $request)
    {
        $record = ServiceDetail::first();
        if (!$record) {
            $record = new ServiceDetail();
        }

        $record->title = $request->title;
        $record->content = $request->content;
        $record->save();

        return redirect()->back()->with('store', 'Service Detail başarıyla güncellendi!');
    }

    function delete()
    {
        $record = ServiceDetail::first();
        $record->delete();
        return redirect()->back()->with('delete', 'Service Detail başarıyla silindi!');
    }
}
