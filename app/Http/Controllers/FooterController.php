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
    

    // =====TAGS====
    function tagstore()
    {
        $title2 = request()->input('title2');
        $tag = request()->input('tag');
        $tagsrows=[
            "tag" => $tag
        ];
        $tagsrows = [$tagsrows];
        $tagsrows=json_encode($tagsrows,JSON_UNESCAPED_UNICODE);

        // Footer tablosundaki satır sayısını al
        $rowCount = DB::table('footers')->count();

        if ($rowCount === 0) {
            // Footer tablosunda veri yok
            $Footer = new Footer;
            $Footer->tagsrows = $tagsrows;
            $Footer->title2 = $title2;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        } else {
            // Footer tablosunda en az bir satır var
            $Footer = new Footer;
            $Footer = Footer::whereNull('tagsrows')->whereNull('title2')->get()->first();
            $Footer->tagsrows = $tagsrows;
            $Footer->title2 = $title2;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        }

    }

    function tagsupdate()
    {
        $title2 = request()->input('title2');
        $tag = request()->input('tag');
        if($tag != null)
        {
            $tagsCount = count($tag); // $tagsrowsCount yerine $tagsCount adını kullanın
            $index = 0;
            $tagsrows = [];
            while($index < $tagsCount){
                $tagsrows[$tag[$index]] = [
                    "tag" => $tag[$index]
                ];
                $index++;
            }
            $tagsrows=json_encode($tagsrows,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $tagsrows = null;
        }

        $Footer = Footer::whereNotNull('tagsrows')->whereNotNull('title2')->first();
        $Footer->tagsrows = $tagsrows;
        $Footer->title2 = $title2;
        $Footer->save();
        return redirect('dashboard/dynamic-edit/footer');
    }
    
    function tagsdelete()
    {
        $Footer = Footer::whereNotNull('tagsrows')->first();
        $tagsrows=json_decode($Footer->tagsrows, TRUE);
        if (array_key_exists(request()->all()["tag"],$tagsrows))
        {
            unset($tagsrows[request()->all()["tag"]]);
            //dd($tagsrows);

            $tagsrows=json_encode($tagsrows,JSON_UNESCAPED_UNICODE);
            $Footer->tagsrows = $tagsrows;
     
            $Footer->save();

        }
        else
        {
            echo "Key does not exist!";
        }
        return redirect('dashboard/dynamic-edit/footer');
    }

    function taghasRecord()
    {
        $Footer = Footer::whereNotNull('tagsrows')->whereNotNull('title2')->first();
        return $Footer ?? null;
    }


    //=====IMAGE====
    function imagestore()
    {
        $title3 = request()->input('title3');
        $image = request()->file('image');

        if ($image != null) {
            $imagerows = [
                "image" => 'footer/' . $image->getClientOriginalName()
            ];
            $imagerows = [$imagerows];
            $image->storeAs('public/images/footer/', $image->getClientOriginalName());
            $imagerows=json_encode($imagerows,JSON_UNESCAPED_UNICODE);
        } else {
            $imagerows = null;
        }

        // Footer tablosundaki satır sayısını al
        $rowCount = DB::table('footers')->count();

        if ($rowCount === 0) {
            // Footer tablosunda veri yok
            $Footer = new Footer;
            $Footer->imagerows = $imagerows;
            $Footer->title3 = $title3;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        } else {
            // Footer tablosunda en az bir satır var
            $Footer = new Footer;
            $Footer = Footer::whereNull('imagerows')->whereNull('title3')->get()->first();
            $Footer->imagerows = $imagerows;
            $Footer->title3 = $title3;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        }
    }

    function imageupdate()
    {
        $title3=request()->input('title3');
        $image =request()->file('image');
        $oldImage = request()->input('oldImage');
        
        if($image != null)
        {
            $index = 0;
            $imageKey = array_key_last($image);
            $oldKey = array_key_last($oldImage);
            $total = max($imageKey,$oldKey) +1 ;
            $imagerows = [];
            
            for($index = 0;$index < $total; $index++){
                //dd($oldFile);
                $imagerows[$index] = [
                    "image" => isset($image[$index]) ? 'footer/'.$image[$index]->getClientOriginalName() : $oldImage[$index]
                ];
                
                if(isset($image[$index])){
                    $image[$index]->storeAs('public/images/footer/', $image[$index]->getClientOriginalName());
                }
               
            }
        
            $imagerows=json_encode($imagerows,JSON_UNESCAPED_UNICODE);
        }
        else
        {
            $imagerows = null;
        }
        
        

        $Footer = Footer::whereNotNull('imagerows')->whereNotNull('title3')->first();
        $Footer->imagerows = $imagerows;
        $Footer->title3 = $title3;
        $Footer->save();
        return redirect('dashboard/dynamic-edit/footer');
    }

    public function imagedelete($image)
    {
        $image = "footer/".$image;
        // $record = InfoBox::latest()->first();
        $Footer = Footer::whereNotNull('imagerows')->latest()->first();

        if($Footer)
        {
            $imagerows = json_decode($Footer->imagerows, true);

            foreach($imagerows as $key => $value)
            {
                if($value['image'] == $image)
                {
                   
                    // Delete the file from the storage
                    Storage::delete('InfoBoxDownloads/'.$image);

                    // Remove the record from the array
                    unset($imagerows[$key]);

                    // Update the rows in the database
                    $Footer->imagerows = json_encode($imagerows);
                    $Footer->save();
                    
                    return redirect('dashboard/dynamic-edit/footer')->with('success', 'image deleted successfully');
                }
            }
        }

        return redirect()->back()->with('error', 'File not found');
    }

    function imagehasRecord()
    {
        $Footer = Footer::whereNotNull('imagerows')->whereNotNull('title3')->first();
        return $Footer ?? null;
    }


    //=====TITLE4====
    function title4store()
    {
        $title4 = request()->input('title4');

        // Footer tablosundaki satır sayısını al
        $rowCount = DB::table('footers')->count();

        if ($rowCount === 0) {
            // Footer tablosunda veri yok
            $Footer = new Footer;
            $Footer->title4 = $title4;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        } else {
            // Footer tablosunda en az bir satır var
            $Footer = new Footer;
            $Footer = Footer::whereNull('title4')->get()->first();
            $Footer->title4 = $title4;
            $Footer->save();
            return redirect('dashboard/dynamic-edit/footer');
        }
    }

    function title4update()
    {
        $title4 = request()->input('title4');

        $Footer = Footer::find(1);
        

        if ($Footer->inforows == null && $Footer->tagsrows == null) {
            $Footer->title4 = $title4;
            $Footer->save();
        } else {
            $Footer = Footer::whereNull('title4')->first();
            $Footer->title4 = $title4;
            $Footer->save();
        }

        return redirect('dashboard/dynamic-edit/footer');
    }

    function title4hasRecord()
    {
        $Footer = Footer::whereNotNull('title4')->first();
        return $Footer ?? null;
    }
}