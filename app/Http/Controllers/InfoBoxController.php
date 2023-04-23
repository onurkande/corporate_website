<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\InfoBox;
use Illuminate\Http\Request;

class InfoBoxController extends Controller
{
    function index()
    {
        $record = $this->hasRecord();
        return view('dynamic.info-box',['record'=>$record]);
    }

    function view()
    {
        $record = $this->hasRecord();
        return $record;
    }

    function downloadFile($file)
    {
        $pathToFile = public_path('/images/InfoBoxDownloads/' . $file);
        return response()->download($pathToFile);
    }

    function store()
    {
        $title=request()->input('title');
        $file=request()->file('file');

        // $file_path = $file->storeAs('public/InfoBoxDownloads', request()->file('file')->getClientOriginalName());

        if($file != null)
        {
            $index = 0;
            $rows = [];
            $rows[] = ["file"=>'infoBox/'.$file->getClientOriginalName()];
            if(isset($file)) $file->storeAs('public/images/InfoBoxDownloads/infoBox/', $file->getClientOriginalName());

            // dd($rows);
        
        }
        else
        {
            $rows = null;
        }

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
        $files =request()->file('file');
        $oldFile = request()->input('oldFile');
        
        if($files != null)
        {
            $index = 0;
            $fileKey = array_key_last($files);
            $oldKey = array_key_last($oldFile);
            $total = max($fileKey,$oldKey) +1 ;
            $rows = [];
            
            for($index = 0;$index < $total; $index++){
                //dd($oldFile);
                $rows[$index] = [
                    "file" => isset($files[$index]) ? 'infoBox/'.$files[$index]->getClientOriginalName() : $oldFile[$index]
                ];
                
                if(isset($files[$index])){
                    $files[$index]->storeAs('public/images/InfoBoxDownloads/infoBox/', $files[$index]->getClientOriginalName());
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

    function hasRecord()
    {
        $infobox = new InfoBox;
        $infobox = InfoBox::find(1);
        return $infobox ?? null;
    }

    public function deleteFile($file)
    {
        $file = "infoBox/".$file;
        $record = InfoBox::latest()->first();

        if($record)
        {
            $rows = json_decode($record->rows, true);

            foreach($rows as $key => $value)
            {
                if($value['file'] == $file)
                {
                   
                    // Delete the file from the storage
                    Storage::delete('InfoBoxDownloads/'.$file);

                    // Remove the record from the array
                    unset($rows[$key]);

                    // Update the rows in the database
                    $record->rows = json_encode($rows);
                    $record->save();
                    
                    // return redirect()->back()->with('success', 'File deleted successfully');
                    return redirect('dashboard/dynamic-edit/info-box');
                }
            }
        }

        return redirect()->back()->with('error', 'File not found');
    }
}
