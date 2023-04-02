<?php

namespace App\Http\Controllers;

use App\Models\InfoBox;
use Illuminate\Http\Request;

class InfoBoxController extends Controller
{
    function index()
    {
        $record = $this->hasRecord();
        return view('dynamic.info-box',['record'=>$record]);
    }

    function downloadFile($file)
    {
        $pathToFile = public_path('InfoBoxDownloads/' . $file);
        return response()->download($pathToFile);
    }

    function store()
    {

        $title=request()->input('title');
        $file=request()->file('file');
        $file_path = $file->storeAs('public/InfoBoxDownloads', request()->file('file')->getClientOriginalName());
        $rows=[
            'file' =>request()->file('file')->getClientOriginalName()
        ];

        $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);

        $infobox = new InfoBox;

        $infobox->title = $title;
        $infobox->rows = $rows;
 
        $infobox->save();

        return redirect('dashboard/dynamic-edit/info-box');

    }

    function update()
    {
        $title=request()->input('title');
        $file=request()->file('file');
        $oldFile = request()->input('oldfile');

        $allRows = [$file];
        if($file != null)
        {
        $rowsCount = count($file);
        $index = 0;
        $rows = [];
        while($index < $rowsCount){
            //dd($oldFile);
            if(isset($oldFile[$index])){
                $oldFileValue = $oldFile[$index];
                $rows[$oldFileValue [$index]] = [
                    "file" => isset($file[$index]) ? request()->file('file')[$index]->getClientOriginalName() : $oldFile[$index]
                ];
                $index++;
            } else {
                $oldFileValue = null;
            }
            
        }
        $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);

        }
        else
        {
            $rows = null;
        }
        


        $infobox = new InfoBox;
        $infobox = $infobox::find(1);

        $infobox->title = $title;
        $infobox->rows = $rows;
 
        $infobox->save();
        return redirect('dashboard/dynamic-edit/info-box');
    }

    /*function store()
    {
        $title=request()->input('title');   
        $file=request()->file('file');

        $file_path = $file->storeAs('public/InfoBoxDownloads', request()->file('file')->getClientOriginalName());
        // dd($file_path);
        if($file != null)
        {
            $rows=[
                "$file"=>[
                    'file' =>request()->file('file')->getClientOriginalName()
                ]
            ];

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $rows = null;
        }
        
        $infobox = new InfoBox;

        $infobox->title = $title;
        $infobox->rows = $rows;
 
        $infobox->save();

        return redirect('dashboard/dynamic-edit/info-box');
    }

    function update()
    {
        $title=request()->input('title');
        $file=request()->file('file');
        $oldFile = request()->input('oldFile');

        $allRows = [$file];
        if($file != null)
        {
            $rowsCount = count($file);
            $index = 0;
            $rows = [];
            while($index < $rowsCount){
                $rows[$file[$index]] = [
                    "file" => isset($file[$index]) ? request()->file('file')[$index]->getClientOriginalName() : $oldFile[$index]
                ];
                if(isset($file[$index])) $file[$index]->storeAs('public/InfoBoxDownloads', request()->file('file')[$index]->getClientOriginalName());
                $index++;
            }
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $rows = null;
        }
        


        $infobox = new InfoBox;
        $infobox = $infobox::find(1);

        $infobox->title = $title;
        $infobox->rows = $rows;
 
        $infobox->save();
        return redirect('dashboard/dynamic-edit/info-box');
    }*/

    function hasRecord()
    {
        $infobox = new InfoBox;
        $infobox = InfoBox::find(1);
        return $infobox ?? null;
    }
}
