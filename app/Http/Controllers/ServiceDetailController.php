<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    function index()
    {
        $record = $this->hasRecord();
        return view('dynamic.service-detail',['record'=>$record]);
    }

    function view()
    {
        $record = $this->hasRecord();
        return view('service',['record'=>$record]);
    }

    // function view()
    // {
    //     $record = $this->hasRecord();
    //     return view('service', compact('record'));
    // }

    function store()
    {
        $title = request()->input('title');
        $content = request()->input('content');

        $ServiceDetail = new ServiceDetail;
        $ServiceDetail->title = $title;
        $ServiceDetail->content = $content;
        $ServiceDetail->save();

        return redirect('dashboard/dynamic-edit/service-detail');
    }

    function update()
    {
        $title = request()->input('title');
        $content = request()->input('content');

        $ServiceDetail = new ServiceDetail;
        $ServiceDetail = $ServiceDetail::find(1);
        $ServiceDetail->title = $title;
        $ServiceDetail->content = $content;
        $ServiceDetail->save();

        return redirect('dashboard/dynamic-edit/service-detail');
    }

    function hasRecord()
    {
        $ServiceDetail = new ServiceDetail;
        $ServiceDetail = ServiceDetail::find(1);
        return $ServiceDetail ?? null;
    }
}
