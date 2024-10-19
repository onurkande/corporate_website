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
        $counter =new Counter;

        $title=request()->input('title');
        $number=request()->input('number');
        
        $title = json_encode($title, JSON_UNESCAPED_UNICODE);
        $counter->title = $title;

        $number = json_encode($number, JSON_UNESCAPED_UNICODE);
        $counter->number = $number;

        $counter->save();

        return redirect('dashboard/dynamic-edit/counter')->with('store',"Counter eklendi");

    }

    function update($id)
    {
        $counter = Counter::find($id);

        $title=request()->input('title');
        $number=request()->input('number');
        
        $title = json_encode($title, JSON_UNESCAPED_UNICODE);
        $counter->title = $title;

        $number = json_encode($number, JSON_UNESCAPED_UNICODE);
        $counter->number = $number;

        $counter->save();

        return redirect('dashboard/dynamic-edit/counter')->with('update',"Counter güncellendi");
    }

    function hasRecord()
    {
        $counter= Counter::latest()->first();

        if($counter)
        {
            return $counter;   
        }
        else
        {
            return $counter;   
        }
    }

    function delete($id)
    {
        $counter = Counter::first(); 

        $title = json_decode($counter->title, TRUE);
        $number = json_decode($counter->number, TRUE);

        $index = array_search($id, $title);

        if($title[$index] && $number[$index])
        {
            unset($title[$index]);
            unset($number[$index]);
            
            $counter->title = json_encode(array_values($title), JSON_UNESCAPED_UNICODE);
            $counter->number = json_encode(array_values($number), JSON_UNESCAPED_UNICODE);

            $counter->save();

            return redirect('dashboard/dynamic-edit/counter')->with('delete', "rows silindi");
        } 
        else
        {
            return redirect('dashboard/dynamic-edit/counter')->with('delete', "Değer dizide bulunamadı.");
        }
    }

    function allDelete($id)
    {
        $counter = Counter::find($id);
        $counter->delete();
        return redirect('dashboard/dynamic-edit/counter')->with('delete',"counter silindi");
    }
}
