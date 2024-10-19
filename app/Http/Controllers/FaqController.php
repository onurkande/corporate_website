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
        $faqs = new Faq;

        $title=request()->input('title');

        $header=request()->input('header');
        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $faqs->header = $header;

        $content=request()->input('content');
        $content = json_encode($content, JSON_UNESCAPED_UNICODE);
        $faqs->content = $content;
        
        $faqs->title=$title;

        $faqs->save();

        return redirect('dashboard/dynamic-edit/faqs')->with('store',"Faq eklendi");
    }

    function update($id)
    {
        $faqs = Faq::find($id);

        $title=request()->input('title');

        $header = request()->input('header');
        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $faqs->header = $header;

        $content = request()->input('content');
        $content = json_encode($content, JSON_UNESCAPED_UNICODE);
        $faqs->content = $content;

        $faqs->title = $title;
 
        $faqs->save();

        return redirect('dashboard/dynamic-edit/faqs')->with('update',"Faq güncellendi");
    }

    public static function hasRecord()
    {
        $faqs= Faq::latest()->first();
        if($faqs)
        {
            return $faqs;   
        }
        else
        {
            return $faqs;
        }
    }


    function delete($id)
    {
        $faqs = Faq::first(); 
    
        $header = json_decode($faqs->header, TRUE);
        $content = json_decode($faqs->content, TRUE);
    
        $index = array_search($id, $header);
    
        if ($index !== false) {
            // Check if only one entry is left in both arrays
            if (count($header) == 1 && count($content) == 1) {
                // If there is only one entry and it's being deleted, delete the entire record
                $faqs->delete();
                return redirect('dashboard/dynamic-edit/faqs')->with('delete', "All FAQ entries deleted.");
            } else {
                // If more than one entry exists, remove the specific entry
                unset($header[$index]);
                unset($content[$index]);
                
                // Save the updated arrays back to the database
                $faqs->header = json_encode(array_values($header), JSON_UNESCAPED_UNICODE);
                $faqs->content = json_encode(array_values($content), JSON_UNESCAPED_UNICODE);
                
                $faqs->save();
    
                return redirect('dashboard/dynamic-edit/faqs')->with('delete', "FAQ entry deleted.");
            }
        } else {
            return redirect('dashboard/dynamic-edit/faqs')->with('delete', "Value not found in the list.");
        }
    }
    

    function allDelete($id)
    {
        $faqs = Faq::find($id);
        $faqs->delete();
        return redirect('dashboard/dynamic-edit/faqs')->with('delete',"Faq Us Row silindi");
    }

}
