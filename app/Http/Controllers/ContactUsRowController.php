<?php

namespace App\Http\Controllers;

use App\Models\ContactUsRow;
use Illuminate\Http\Request;

class ContactUsRowController extends Controller
{
    function index()
    {
        $record = ContactUsRowController::hasRecord();
        return view('dynamic.contact-us-row',['record'=>$record]);
    }

    public static function view()
    {
        $record = ContactUsRowController::hasRecord();
        return $record;
    }

    function store()
    {
        $title = request()->input('title');
        $content = request()->input('content');
        $header = request()->input('header');
        $paragraph = request()->input('paragraph');
        $icon = request()->input('icon');


        if($header != null or $paragraph != null or $icon != null)
        {
            $rows=[
                $header=>[
                    "header" => $header,
                    "paragraph" => $paragraph,
                    'icon' => $icon
                ]
            ];

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);

            //dd($rows);
        
        }
        else
        {
            $rows = null;
        }

        $contactusrow=new ContactUsRow;
        $contactusrow->title=$title;
        $contactusrow->content=$content;
        $contactusrow->rows = $rows;

        $contactusrow->save();

        return redirect('dashboard/dynamic-edit/contact-us-row');
    }

    function update()
    {
        $title = request()->input('title');
        $content = request()->input('content');
        $header = request()->input('header');
        $paragraph = request()->input('paragraph');
        $icon = request()->input('icon');

        $allRows = [$header, $paragraph];
        if($header != null or $paragraph != null or $icon != null)
        {
            $rowsCount = count($header);
            $index = 0;
            $rows = [];
            while($index < $rowsCount){
                $rows[$header[$index]] = [
                    "header" => $header[$index],
                    "paragraph" => $paragraph[$index],
                    "icon" => $icon[$index]
                ];
                $index++;
            }
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $rows = null;
        }

        $contactusrow = new ContactUsRow;
        $contactusrow = $contactusrow::find(1);

        $contactusrow->title = $title;
        $contactusrow->content = $content;
        $contactusrow->rows = $rows;
 
        $contactusrow->save();

        return redirect('dashboard/dynamic-edit/contact-us-row');
    }

    public static function hasRecord()
    {
        $contactusrow=new ContactUsRow;
        $contactusrow = $contactusrow::find(1);
        if($contactusrow)
        {
            return $contactusrow;   
        }
        else
        {
            return $contactusrow;
        }
    }

    function delete()
    {
        $contactusrow = new ContactUsRow;
        $contactusrow = ContactUsRow::find(1);
        $rows=json_decode($contactusrow->rows, TRUE);
        if(array_key_exists(request()->all()["header"],$rows))
        {
            unset($rows[request()->all()["header"]]);
            // dd($rows);

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
            $contactusrow->rows = $rows;
     
            $contactusrow->save();

        }
        else
        {
            echo "Key does not exist!";
        }
        
    }
}
