<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    function index()
    {
        $infoRecord = $this->infohasRecord();
        $tagsRecord = $this->taghasRecord();
        $imageRecord = $this->imagehasRecord();
        $title4Record = $this->title4hasRecord();
        return view('dynamic.footer',['infoRecord'=>$infoRecord,'tagsRecord'=>$tagsRecord,'imageRecord'=>$imageRecord,'title4Record'=>$title4Record]);
    }


    // ====INFO====
    function infostore()
    {
        $info = request()->input('info');
        $title1 = request()->input('title1');
        $inforows=[
            "info" => $info
        ];
        $inforows = [$inforows];
        $inforows=json_encode($inforows,JSON_UNESCAPED_UNICODE);
        
        // dd($inforows);

        // Footer tablosundaki satır sayısını al
        $rowCount = DB::table('footers')->count();

        if ($rowCount === 0) {
            // Footer tablosunda veri yok
            //dd('veriyok');
            $Footer = new Footer;
            $Footer->inforows = $inforows;
            $Footer->title1 = $title1;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        } else {
            // Footer tablosunda en az bir satır var
            //dd('veriyok2');
            $Footer = new Footer;
            //$Footer->$Footer::find(1);
            $Footer = Footer::whereNull('inforows')->whereNull('title1')->get()->first();
            $Footer->inforows = $inforows;
            $Footer->title1 = $title1;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        }
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
        $Footer = Footer::find(1);
        $Footer = Footer::whereNotNull('inforows')->whereNotNull('title1')->first();
        return $Footer ?? null;
    }
    

    function tagstore()
    {
        $title2 = request()->input('title2');
        $tag = request()->input('tag');
        $tagsrows=[
            "tag" => $tag
        ];
        $tagsrows = [$tagsrows];
        $tagsrows=json_encode($tagsrows,JSON_UNESCAPED_UNICODE);

        $Footer = Footer::whereNull('tagsrows')->whereNull('title2')->first();
        $Footer->tagsrows = $tagsrows;
        $Footer->title2 = $title2;
        $Footer->save();

        return redirect('dashboard/dynamic-edit/footer');
    }    
}
