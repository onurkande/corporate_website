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
        $title = request()->input('title');
        $image = request()->file('image');
        $header = request()->input('header');
        $content = request()->input('content');
        $button = request()->input('button');

        $image_path = $image->storeAs('public/images/team', request()->file('image')->getClientOriginalName());

        if($image != null or $header != null or $content != null)
        {
            $rows=[
                "$header"=>[
                    'image' => 'featuredProject/'.request()->file('image')->getClientOriginalName(),
                    "header" => $header,
                    "content" => $content
                ]
            ];

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $rows = null;
        }

        $FeaturedProject = new FeaturedProject;
        $FeaturedProject->title = $title;
        $FeaturedProject->rows = $rows;
        $FeaturedProject->button = $button;
        $FeaturedProject->save();

        return redirect('dashboard/dynamic-edit/featured-project');
    }

    function update()
    {
        $title = request()->input('title');
        $image = request()->file('image');
        $header = request()->input('header');
        $content = request()->input('content');
        $button = request()->input('button');
        $oldImage = request()->input('oldImage');

        $allRows = [$image, $header, $content];
        if($image != null or $header != null or $content != null)
        {
            $rowsCount = count($header);
            $index = 0;
            $rows = [];
            while($index < $rowsCount){
                $rows[$header[$index]] = [
                    "image" => isset($image[$index]) ? 'featuredProject/'.request()->file('image')[$index]->getClientOriginalName() : $oldImage[$index],
                    "header" => $header[$index],
                    "content" => $content[$index]
                ];
                if(isset($image[$index])) $image[$index]->storeAs('public/images/featuredProject', request()->file('image')[$index]->getClientOriginalName());
                $index++;
            }
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $rows = null;
        }

        $FeaturedProject = new FeaturedProject;
        $FeaturedProject = $FeaturedProject::find(1);

        $FeaturedProject->title = $title;
        $FeaturedProject->rows = $rows;
        $FeaturedProject->button = $button;
        
        $FeaturedProject->save();

        return redirect('dashboard/dynamic-edit/featured-project');
    }

    public static function hasRecord()
    {
        $FeaturedProject = new FeaturedProject;
        $FeaturedProject = $FeaturedProject::find(1);
        if($FeaturedProject)
        {
            return $FeaturedProject;
        }
        else{
            return $FeaturedProject;
        }
    }

    function delete()
    {
        $FeaturedProject = new FeaturedProject;
        $FeaturedProject = FeaturedProject::find(1);
        $rows=json_decode($FeaturedProject->rows, TRUE);
        if(array_key_exists(request()->all()["header"],$rows))
        {
            unset($rows[request()->all()["header"]]);
            // dd($rows);

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
            $FeaturedProject->rows = $rows;
     
            $FeaturedProject->save();

        }
        else
        {
            echo "Key does not exist!";
        }
    }
}
