<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedProject;
use Illuminate\Support\Facades\Storage;

class FeaturedProjectController extends Controller
{
    function index()
    {
        $record = FeaturedProjectController::hasRecord();
        return view('dynamic.featured-project',['record'=>$record]);
    }

    public static function view()
    {
        $record = FeaturedProjectController::hasRecord();
        return $record;
    }

    function store()
    {
        $FeaturedProject = new FeaturedProject;

        if(request()->hasfile('image'))
        {
            $files = request()->file('image');
            foreach($files as $file)
            {
                $filename[] = $file->getClientOriginalName();
                $file->move('admin/featuredProjectImage',$file->getClientOriginalName());
            }
            $filenames = json_encode($filename, JSON_UNESCAPED_UNICODE);
            $FeaturedProject->images = $filenames;
        }

        $title = request()->input('title');
        $button = request()->input('button');

        $headers = request()->input('header');
        $headers = json_encode($headers, JSON_UNESCAPED_UNICODE);
        $FeaturedProject->headers = $headers;

        $contents = request()->input('content');
        $contents = json_encode($contents, JSON_UNESCAPED_UNICODE);
        $FeaturedProject->contents = $contents;

        $urls = request()->input('url');
        $urls = json_encode($urls, JSON_UNESCAPED_UNICODE);
        $FeaturedProject->urls = $urls;

        $FeaturedProject->title = $title;
        $FeaturedProject->button = $button;

        $FeaturedProject->save();

        return redirect('dashboard/dynamic-edit/featured-project')->with('store',"Featured Project eklendi");
    }

    function update(Request $request, $id)
    {
        $FeaturedProject = FeaturedProject::find($id);

        $title = request()->input('title');
        $button = request()->input('button');

        $headers = request()->input('header');
        $headers = json_encode($headers, JSON_UNESCAPED_UNICODE);

        $contents = request()->input('content');
        $contents = json_encode($contents, JSON_UNESCAPED_UNICODE);

        if ($request->hasFile('instagram_photos')) 
        {
            $images = [];
            
            // Eski fotoğrafları sil
            if ($FeaturedProject->images) 
            {
                foreach ($FeaturedProject->images as $photo) 
                {
                    $oldPath = public_path('admin/featuredProjectImage/' . $photo);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
            
            // Yeni fotoğrafları yükle
            foreach ($request->file('image') as $photo) {
                $extension = $photo->getClientOriginalName();
                $fileName = time() . '_' . $extension;
                $photo->move(public_path('admin/featuredProjectImage'), $fileName);
                $images[] = $fileName;
            }
            
            $FeaturedProject->images = $images;
        }

        $FeaturedProject->title = $title;
        $FeaturedProject->button = $button;
        $FeaturedProject->headers = $headers;
        $FeaturedProject->contents = $contents;
        $FeaturedProject->save();

        return redirect()->back()->with('success', 'Featured Project başarıyla güncellendi!');
        
    }

    public static function hasRecord()
    {
        $FeaturedProject = new FeaturedProject;
        $FeaturedProject = $FeaturedProject::first();
        if($FeaturedProject)
        {
            return $FeaturedProject;
        }
        else{
            return $FeaturedProject;
        }
    }

    function delete($id)
    {
        $FeaturedProject = FeaturedProject::first();
        $headers=json_decode($FeaturedProject->headers, TRUE);
        $contents=json_decode($FeaturedProject->contents, TRUE);
        $images=json_decode($FeaturedProject->images, TRUE);
        if(isset($headers[$id]) || isset($contents[$id]) || isset($images[$id]))
        {
            $oldPath = public_path('admin/featuredProjectImage/' . $images[$id]);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            unset($headers[$id]);
            unset($contents[$id]);
            unset($images[$id]);

            $headers=json_encode($headers,JSON_UNESCAPED_UNICODE);
            $contents=json_encode($contents,JSON_UNESCAPED_UNICODE);
            $images=json_encode($images,JSON_UNESCAPED_UNICODE);
            $FeaturedProject->headers = $headers;
            $FeaturedProject->contents = $contents;
            $FeaturedProject->images = $images;
     
            $FeaturedProject->save();
            return redirect()->back()->with('delete', 'Öğe başarıyla silindi!');
        }
        else
        {
            echo "Key does not exist!";
        }
    }
}
