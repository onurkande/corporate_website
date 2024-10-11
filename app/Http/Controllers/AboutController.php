<?php

namespace App\Http\Controllers;

use App\Models\About;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    function index()
    {
        $record = app('App\Http\Controllers\AboutController')->hasRecord();
        return view('dynamic.about', ['record' => $record]);
    }

    function view()
    {
        $record = app('App\Http\Controllers\AboutController')->hasRecord();
        return $record;
    }

    function store()
    {
        $abouts = new About;

        if(request()->hasfile('image'))
        {
            $file = request()->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('admin/aboutImage',$filename);
            $abouts->image = $filename;
        }

        $title = request()->input('title');
        $content = request()->input('content');
        $button = request()->input('button');

        $abouts->title = $title;
        $abouts->content = $content;
        $abouts->button = $button;

        $abouts->save();

        return redirect('dashboard/dynamic-edit/about')->with('store', "about eklendi");
    }

    function update($id)
    {
        $abouts = About::find($id);

        if(request()->hasfile('image'))
        {
            $oldImage = 'admin/aboutImage/'.$abouts->image;
            if(File::exists($oldImage))
            {
                File::delete($oldImage);
            }

            $file = request()->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('admin/aboutImage',$filename);
            $abouts->image = $filename;
        }

        $title = request()->input('title');
        $content = request()->input('content');
        $button = request()->input('button');

        $abouts->title = $title;
        $abouts->content = $content;
        $abouts->button = $button;


        $abouts->save();

        return redirect('dashboard/dynamic-edit/about')->with('update', "About güncellendi");
    }

    function delete($id)
    {
        $abouts = About::find($id);
        if($abouts->image)
        {
            $path = 'admin/aboutImage/'.$abouts->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $abouts->delete();
        return redirect('dashboard/dynamic-edit/about')->with('delete',"About silindi");
    }

    function hasRecord()
    {
        $abouts = new About;
        $abouts = $abouts::latest()->first();
        if ($abouts) {
            return $abouts;
        } else {
            return $abouts;
        }
    }
}