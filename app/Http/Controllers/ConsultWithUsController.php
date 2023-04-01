<?php

namespace App\Http\Controllers;

use App\Models\ConsultWithUs;
use Illuminate\Http\Request;

class ConsultWithUsController extends Controller
{
    function index()
    {
        $record = $this->hasRecord();
        return view('dynamic/consult-with-us',['record'=>$record]);
    }

    function view()
    {
        $record = $this->hasRecord();
        return $record;
    }

    function store()
    {
        $title = request()->input('title');
        $header = request()->input('header');
        $content = request()->input('content');

        if ($header != null or $content != null) {
            $rows = [
                $header => [
                    "header" => $header,
                    "content" => $content
                ]
            ];

            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
        } else {
            $rows = null;
        }

        $consultwithus = new ConsultWithUs;
        $consultwithus->title = $title;
        $consultwithus->rows = $rows;

        $consultwithus->save();

        return redirect('dashboard/dynamic-edit/consult-with-us');
    }

    function update()
    {
        $title = request()->input('title');
        $header = request()->input('header');
        $content = request()->input('content');

        $allRows = [$header, $content];

        if ($header != null or $content != null) {
            $rowsCount = count($header);
            $index = 0;
            $rows = [];
            while($index < $rowsCount){
                $rows[$header[$index]] = [
                    "header" => $header[$index],
                    "content" => $content[$index]
                ];
                $index++;
            }
            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
        } else {
            $rows = null;
        }

        $consultwithus = ConsultWithUs::latest()->first();
        $consultwithus->title = $title;
        $consultwithus->rows = $rows;

        $consultwithus->save();

        return redirect('dashboard/dynamic-edit/consult-with-us');
    }

    function hasRecord()
    {
        $consultwithus = ConsultWithUs::find(1);
        return $consultwithus ?? null;
    }

    function delete()
    {
        $consultwithus = ConsultWithUs::find(1);
        $rows=json_decode($consultwithus->rows, TRUE);
        if(array_key_exists(request()->all()["header"],$rows))
        {
            unset($rows[request()->all()["header"]]);
            // dd($rows);

            $rows=json_encode($rows,JSON_UNESCAPED_UNICODE);
            $consultwithus->rows = $rows;
     
            $consultwithus->save();

        }
        else
        {
            echo "Key does not exist!";
        }
        
    }
}