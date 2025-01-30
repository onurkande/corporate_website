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

        if(request()->hasfile('image')) {
            // Get existing images from database
            $existingImages = json_decode($bestservices->image, true) ?? [];
            
            $files = request()->file('image');
            foreach($files as $file) {
                // Add new image names to existing array
                $existingImages[] =$file->getClientOriginalName();
                $file->move('admin/bestServicesImage', $file->getClientOriginalName());
            }

            // Encode combined array back to JSON
            $bestservices->image = json_encode($existingImages, JSON_UNESCAPED_UNICODE);
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

        return redirect('dashboard/dynamic-edit/best-services')->with('update',"Best Service güncellendi");

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

    public function delete($key)
    {
        $bestservices = BestServices::latest()->first();
        $headers = json_decode($bestservices->header, TRUE);
        $images = json_decode($bestservices->image, TRUE);
        if ($headers[$key] && $images[$key]) {
            $oldPath = public_path('admin/bestServicesImage/' . $images[$key]);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            unset($headers[$key]);
            unset($images[$key]);

            $headers = json_encode($headers, JSON_UNESCAPED_UNICODE);
            $bestservices->header = $headers;

            $images = json_encode($images, JSON_UNESCAPED_UNICODE);
            $bestservices->image = $images;

            $bestservices->save();

            return redirect('dashboard/dynamic-edit/best-services')->with('delete',"silindi");

        } else {
            echo "Key does not exist!";
        }
    }
}