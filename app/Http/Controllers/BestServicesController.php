<?php

namespace App\Http\Controllers;

use App\Models\BestServices;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BestServicesController extends Controller
{
    function index()
    {
        $record = BestServicesController::hasRecord();
        // $record=app('App\Http\Controllers\BestServicesController')->hasRecord();
        return view('dynamic.best-services', ['record' => $record]);
    }

    public static function view()
    {
        $record = BestServicesController::hasRecord(); // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return $record;
    }

    function store()
    {
        $bestservices = new BestServices;

        if(request()->hasfile('image'))
        {
            $files = request()->file('image');
            foreach($files as $file)
            {
                $filename[] = $file->getClientOriginalName();
                $file->move('admin/bestServicesImage',$file->getClientOriginalName());
            }
            $filenames = json_encode($filename, JSON_UNESCAPED_UNICODE);
            $bestservices->image = $filenames;
        }

        $title = request()->input('title');
        $content = request()->input('content');
        $button = request()->input('button');
        
        $header = request()->input('header');

        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $bestservices->header = $header;

        $bestservices->title = $title;
        $bestservices->content = $content;
        $bestservices->button = $button;

        $bestservices->save();

        return redirect('dashboard/dynamic-edit/best-services')->with('store',"Best Service eklendi");


    }

    function update($id)
    {
        $bestservices = BestServices::find($id);
        $oldImages =request()->old_image;

        dd($oldImages);

        if(request()->hasfile('image'))
        {
            $files = request()->file('image');
            foreach($files as $file)
            {
                $filename[] = $file->getClientOriginalName();
                // $file->movKe('admin/bestServicesImage',$file->getClientOriginalName());
            }
            dd($filename);
            $filenames = json_encode($filename, JSON_UNESCAPED_UNICODE);
            $bestservices->image = $filenames;
        }
    }


    public static function hasRecord()
    {

        $bestservices = BestServices::latest()->first();
        if ($bestservices) {
            return $bestservices;
        } else {
            return $bestservices;
        }
    }

    public function delete()
    {

        $bestservices = BestServices::latest()->first();
        $rows = json_decode($bestservices->rows, TRUE);
        if (array_key_exists(request()->all()["header"], $rows)) {
            unset($rows[request()->all()["header"]]);
            // dd($rows);

            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
            $bestservices->rows = $rows;

            $bestservices->save();

        } else {
            echo "Key does not exist!";
        }
    }
}