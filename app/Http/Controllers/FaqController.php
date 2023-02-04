<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{

    function index()
    {
        $record=app('App\Http\Controllers\FaqController')->hasRecord();
        return view('dynamic.faqs',['record'=>$record]);
    }

    function view()
    {
        $record=app('App\Http\Controllers\FaqController')->hasRecord();   // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return $record;
    }


    function store()
    {
        $title=request()->input('title');
        $header=request()->input('header');
        $content=request()->input('content');

        $lines=[
            'header'=>
                [
                    "header" => $header,
                    "content" => $content
                ]
            ];

        $lines=json_encode($lines,JSON_UNESCAPED_UNICODE);

        $faqs=new Faq;
        $faqs->title = $title;
        $faqs->lines = $lines;
        $faqs->save();
    }

    function update()
    {
        $title=request()->input('title');
        $header=request()->input('header');
        $content=request()->input('content');
        $allLines = [$header, $content];
        if($header != null or $content != null)
        {
            $linesCount = count($header);
            $index = 0;
            $lines = [];
            while($index < $linesCount){
                $lines[$header[$index]] = [
                    "header" => $header[$index],
                    "content" => $content[$index]
                ];
                $index++;
            }
            $lines=json_encode($lines,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $lines = null;
        }
        


        $faqs = new Faq;
        $faqs = $faqs::find(1);

        $faqs->title = $title;
        $faqs->lines = $lines;
 
        $faqs->save();
    }

    function hasRecord()
    {
        $faqs=Faq::find(1);
        if($faqs)
        {
            return $faqs;
        }
        else
        {
            return $faqs;
        }
    }

    function delete()
    {
        $faqs = new Faq;
        $faqs = Faq::find(1);
        $lines=json_decode($faqs->lines, TRUE);
        if (array_key_exists(request()->all()["header"],$lines))
        {
            unset($lines[request()->all()["header"]]);
            // dd($lines);

            $lines=json_encode($lines,JSON_UNESCAPED_UNICODE);
            $faqs->lines = $lines;
     
            $faqs->save();

        }
        else
        {
            echo "Key does not exist!";
        }
 
    }


}
