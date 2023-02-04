<?php

namespace App\Http\Controllers;
use App\Models\About;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    function index()
    {
        $record=app('App\Http\Controllers\AboutController')->hasRecord();
        return view('dynamic.about',['record'=>$record]);
    }

    function view()
    {
        $record=app('App\Http\Controllers\AboutController')->hasRecord();
        return $record;
    }
    
    function store()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $button=request()->input('button');
        $image=request()->file('image');

        $image_path = $image->storeAs('public/images/about', request()->file('image')->getClientOriginalName());

        $abouts=new About;
        $abouts->title=$title;
        $abouts->content=$content;
        $abouts->button=$button;
        $abouts->image = 'about/'.request()->file('image')->getClientOriginalName();

        $abouts->save();
    }

    function update()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $button=request()->input('button');
        $image=request()->file('image');

        $image_path = $image->storeAs('public/images/about', request()->file('image')->getClientOriginalName());

        $abouts = new About;
        $abouts = $abouts::find(1);

        $abouts->title = $title;
        $abouts->content = $content;
        $abouts->button = $button;
        $abouts->image = 'about/'.request()->file('image')->getClientOriginalName();
 
        $abouts->save();
    }

    function hasRecord()
    {
        $abouts = new About;
        $abouts = $abouts::find(1);
        if($abouts)
        {
            return $abouts;   
        }
        else
        {
            return $abouts;
        }
    }
}
