<?php

namespace App\Http\Controllers;

use App\Models\OurServices;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    function index()
    {
        $record = $this->hasRecord();
        return view('dynamic.our-services',['record'=>$record]);
    }

    function view()
    {
        $record = $this->hasRecord();
        return $record;
    }

    function store()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $paragraph=request()->input('paragraph');

        if($paragraph != null)
        {
            $rows=[
                "$paragraph"=>[
                    "paragraph" => $paragraph
                ]
            ];

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $rows = null;
        }

        $ourservices = new OurServices;

        $ourservices->title = $title;
        $ourservices->content = $content;
        $ourservices->rows = $rows;
 
        $ourservices->save();

        return redirect('dashboard/dynamic-edit/our-services');
    }

    function update()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $paragraph=request()->input('paragraph');

        $allRows = [$paragraph];
        if($paragraph != null)
        {
            $rowsCount = count($paragraph);
            $index = 0;
            $rows = [];
            while($index < $rowsCount){
                $rows[$paragraph[$index]] = [
                    "paragraph" => $paragraph[$index]
                ];
                $index++;
            }
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);

            $ourservices = new OurServices;
            $ourservices = $ourservices::find(1);

            $ourservices->title = $title;
            $ourservices->content = $content;
            $ourservices->rows = $rows;
    
            $ourservices->save();

            return redirect('dashboard/dynamic-edit/our-services');
        }
        else
        {
            $rows = null;
        }
    }

    function hasRecord()
    {
        $ourservices = new OurServices;
        $ourservices = OurServices::find(1);
        return $ourservices ?? null;
    }

    function delete()
    {
        $ourservices = new OurServices;
        $ourservices = OurServices::find(1);
        $rows=json_decode($ourservices->rows, TRUE);
        if(array_key_exists(request()->all()["paragraph"],$rows))
        {
            unset($rows[request()->all()["paragraph"]]);
            //dd($rows);

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
            $ourservices->rows = $rows;
     
            $ourservices->save();

        }
        else
        {
            echo "Key does not exist!";
        }

        return redirect('dashboard/dynamic-edit/our-services');
    }
}
