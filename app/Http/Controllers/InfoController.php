<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    function index()
    {
        $record = $this->hasRecord();
        return view('dynamic.info',['record'=>$record]);
    }

    function view()
    {
        $record = $this->hasRecord();
        return $record;
    }

    function store()
    {
        $title = request()->input('title');
        $bigtitle = request()->input('bigtitle');
        $content = request()->input('content');

        $info = new Info;
        $info->title = $title;
        $info->bigtitle = $bigtitle;
        $info->content = $content;
        $info->save();

        return redirect('dashboard/dynamic-edit/info');
    } 

    function update()
    {
        $title = request()->input('title');
        $bigtitle = request()->input('bigtitle');
        $content = request()->input('content');

        $info = new Info;
        $info = $info::find(1);
        $info->title = $title;
        $info->bigtitle = $bigtitle;
        $info->content = $content;
        $info->save();

        return redirect('dashboard/dynamic-edit/info');
    }
    
    function hasRecord()
    {
        $info = new Info;
        $info = Info::find(1);
        return $info ?? null;
    }
}
