<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutRow;

class AboutRowController extends Controller
{
    function index()
    {
        $record=app('App\Http\Controllers\AboutRowController')->hasRecord();   // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return view('/dynamic/about-row',['record'=>$record]);
    }

    function view()
    {
        $record=app('App\Http\Controllers\AboutRowController')->hasRecord();   // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return $record;
    }

    function store()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $icon=request()->input('icon');
        $header=request()->input('header');
        $paragraph=request()->input('paragraph');

        $rows=[
            'header'=>[
                'icon' => $icon,
                'header' => $header,
                'paragraph' => $paragraph
            ]
        ];
        $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);

        $aboutrows=new AboutRow;
        $aboutrows->title=$title;
        $aboutrows->content=$content;
        $aboutrows->rows=$rows;
        $aboutrows->save();
    }

    function update()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $icon=request()->input('icon');
        $header=request()->input('header');
        $paragraph=request()->input('paragraph');
        $allRows = [$icon, $header, $paragraph];
        if($icon != null or $header != null or $paragraph != null)
        {
        $rowsCount = count($header);
            $index = 0;
            $rows = [];
            while($index < $rowsCount){
                $rows[$header[$index]] = [
                    "icon" => $icon[$index],
                    "header" => $header[$index],
                    "paragraph" => $paragraph[$index]
                ];
                $index++;
            }
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $rows = null;
        }

        $aboutrows = new AboutRow;
        $aboutrows = $aboutrows::find(1);

        $aboutrows->title = $title;
        $aboutrows->content = $content;
        $aboutrows->rows = $rows;
 
        $aboutrows->save();
    }

    function hasRecord()
    {
        $aboutrows=new AboutRow;
        $aboutrows=$aboutrows->find(1);
        if($aboutrows)
        {
            return $aboutrows;   
        }
        else
        {
            return $aboutrows;
        }
    }

    function delete()
    {
        $aboutrows = new AboutRow;
        $aboutrows = AboutRow::find(1);
        $rows=json_decode($aboutrows->rows, TRUE);
        if(array_key_exists(request()->all()["header"],$rows))
        {
            unset($rows[request()->all()["header"]]);
            // dd($rows);

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
            $aboutrows->rows = $rows;
     
            $aboutrows->save();

        }
        else
        {
            echo "Key does not exist!";
        }
        
    }
}
