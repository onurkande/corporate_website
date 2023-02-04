<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;

class CounterController extends Controller
{
    function index()
    {
        $record=app('App\Http\Controllers\CounterController')->hasRecord();
        return view('/dynamic/counter',['record'=>$record]);
    }

    function view()
    {
        $record=app('App\Http\Controllers\CounterController')->hasRecord();   // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return $record;
    }

    function store()
    {

        $title=request()->input('title');
        $number=request()->input('number');
        //dd($title);
        $columns=[];
        $column=[
            "title" => $title,
            "number" => $number
        ];

        array_push($columns,$column);

        $columns=json_encode($columns,JSON_UNESCAPED_UNICODE);
        //dd($columns);

        $counter = new Counter;

        $counter->columns = $columns;
 
        $counter->save();

    }

    function update()
    {
        $title=request()->input('title');
        $number=request()->input('number');
        $allColumn = [$title,$number];
        if($title != null or $number != null)
        {
            $columnCount = count($title);
            $index = 0;
            $column = [];
            while($index < $columnCount){
                $column[$title[$index]] = [
                    "title" => $title[$index],
                    "number" => $number[$index]
                ];
                $index++;
            }
            $column=json_encode($column,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $column = null;
        }

        $counter = new Counter;
        $counter = $counter::find(1);

        $counter->columns = $column;
 
        $counter->save();
    }

    function hasRecord()
    {
        $counter = new Counter;
        $counter = $counter::find(1);
        if($counter)
        {
            return $counter;   
        }
        else
        {
            return $counter;   
        }
    }

    function delete()
    {
        $counter = new Counter;
        $counter = Counter::find(1);
        $columns=json_decode($counter->columns, TRUE);
        if (array_key_exists(request()->all()["title"],$columns))
        {
            unset($columns[request()->all()["title"]]);
            //dd($columns);

            $columns=json_encode($columns,JSON_UNESCAPED_UNICODE);
            $counter->columns = $columns;
     
            $counter->save();

        }
        else
        {
            echo "Key does not exist!";
        }
        
    }
}
