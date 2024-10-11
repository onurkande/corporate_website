<?php

namespace App\Http\Controllers;

use App\Models\ConsultWithUs;
use Illuminate\Http\Request;

class ConsultWithUsController extends Controller
{
    function index()
    {
        $consultwithus = ConsultWithUs::latest()->first();
        return view('dynamic/consult-with-us',['record'=>$consultwithus]);
    }

    function view()
    {
        $record = $this->hasRecord();
        return $record;
    }

    function store()
    {
        $consultwithus = new ConsultWithUs;

        $title = request()->input('title');
        $header = request()->input('header');
        $content = request()->input('content');

        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $consultwithus->header = $header;

        $consultwithus->title = $title;
        $consultwithus->content = $content;

        $consultwithus->save();

        return redirect('dashboard/dynamic-edit/consult-with-us')->with('store',"Consul With Us eklendi");
    }

    function update($id)
    {
        $consultwithus = ConsultWithUs::find($id);

        $title = request()->input('title');
        $header = request()->input('header');
        $content = request()->input('content');

        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $consultwithus->header = $header;
        
        $consultwithus->title = $title;
        $consultwithus->content = $content;

        $consultwithus->save();

        return redirect('dashboard/dynamic-edit/consult-with-us')->with('update',"Consul With Us güncellendi");
    }

    function hasRecord()
    {
        $consultwithus = ConsultWithUs::latest()->first();
        if ($consultwithus) {
            return $consultwithus;
        } else {
            return $consultwithus;
        }
    }

    function delete($id)
    {
        $consultwithus = ConsultWithUs::first();
        
        $header = json_decode($consultwithus->header, TRUE);

        $index = array_search($id, $header);

        if($header[$index])
        {
            unset($header[$index]);
            
            $consultwithus->header = json_encode(array_values($header), JSON_UNESCAPED_UNICODE);

            $consultwithus->save();

            return redirect('dashboard/dynamic-edit/consult-with-us')->with('delete', "rows silindi");
        } 
        else
        {
            return redirect('dashboard/dynamic-edit/consult-with-us')->with('delete', "Değer dizide bulunamadı.");
        }
    }

    function allDelete($id)
    {
        $consultwithus = ConsultWithUs::find($id);
        $consultwithus->delete();
        return redirect('dashboard/dynamic-edit/consult-with-us')->with('delete', "Consul With Us silindi");
    }
}