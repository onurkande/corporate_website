<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    function index()
    {
        $infoRecord = $this->infohasRecord();
        return view('dynamic.footer',['infoRecord'=>$infoRecord]);
    }

    function infostore()
    {
        $info = request()->input('info');
        $title1 = request()->input('title1');
        $inforows=[
            "info" => $info
        ];
        $inforows = [$inforows];
        $inforows=json_encode($inforows,JSON_UNESCAPED_UNICODE);

        $Footer = new Footer;
        $Footer->inforows = $inforows;
        $Footer->title1 = $title1;
        $Footer->save();

        return redirect('dashboard/dynamic-edit/footer');
    }

    function infoupdate()
    {
        $info = request()->input('info');
        $title1 = request()->input('title1');
        if($info != null)
        {
            $inforowsCount = count($info);
            $index = 0;
            $inforows = [];
            while($index < $inforowsCount){
                $inforows[$info[$index]] = [
                    "info" => $info[$index]
                ];
                $index++;
            }
            $inforows=json_encode($inforows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $inforows = null;
        }

        //$Footer = new Footer;
        $Footer = Footer::whereNotNull('inforows')->whereNotNull('title1')->first();
        $Footer->inforows = $inforows;
        $Footer->title1 = $title1;
        $Footer->save();
        return redirect('dashboard/dynamic-edit/footer');
    }

    function infodelete()
    {
        //$Footer = Footer::find(1);
        $Footer = Footer::whereNotNull('inforows')->first();
        $inforows=json_decode($Footer->inforows, TRUE);
        if (array_key_exists(request()->all()["info"],$inforows))
        {
            unset($inforows[request()->all()["info"]]);
            //dd($inforows);

            $inforows=json_encode($inforows,JSON_UNESCAPED_UNICODE);
            $Footer->inforows = $inforows;
     
            $Footer->save();

        }
        else
        {
            echo "Key does not exist!";
        }
        return redirect('dashboard/dynamic-edit/footer');
    }

    function infohasRecord()
    {
        $Footer = Footer::whereNotNull('inforows')->whereNotNull('title1')->first();
        return $Footer ?? null;
    }
}
