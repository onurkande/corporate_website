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
        $contactusrow=new ContactUsRow;

        $title = request()->input('title');
        $content = request()->input('content');
        $header = request()->input('header');
        $paragraph = request()->input('paragraph');
        $icon = request()->input('icon');
        
        $icon = json_encode($icon, JSON_UNESCAPED_UNICODE);
        $contactusrow->icon = $icon;

        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $contactusrow->header = $header;

        $paragraph = json_encode($paragraph, JSON_UNESCAPED_UNICODE);
        $contactusrow->paragraph = $paragraph;


        $contactusrow->title=$title;
        $contactusrow->content=$content;

        $contactusrow->save();

        return redirect('dashboard/dynamic-edit/contact-us-row')->with('store',"Contact Us Row eklendi");
    }

    function update($id)
    {
        $contactusrow = ContactUsRow::find($id);
        $title = request()->input('title');
        $content = request()->input('content');
        $header = request()->input('header');
        $paragraph = request()->input('paragraph');
        $icon = request()->input('icon');

        $icon = json_encode($icon, JSON_UNESCAPED_UNICODE);
        $contactusrow->icon = $icon;

        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $contactusrow->header = $header;

        $paragraph = json_encode($paragraph, JSON_UNESCAPED_UNICODE);
        $contactusrow->paragraph = $paragraph;


        $contactusrow->title = $title;
        $contactusrow->content = $content;
 
        $contactusrow->save();

        return redirect('dashboard/dynamic-edit/contact-us-row')->with('update',"Contact Us Row güncellendi");
    }

    public static function hasRecord()
    {
        $contactusrow= ContactUsRow::latest()->first();
        if($contactusrow)
        {
            return $contactusrow;   
        }
        else
        {
            return $contactusrow;
        }
    }

    function delete($id)
    {
        $contactusrow = ContactUsRow::first(); 

        $header = json_decode($contactusrow->header, TRUE);
        $paragraph = json_decode($contactusrow->paragraph, TRUE);
        $icon = json_decode($contactusrow->icon, TRUE);

        $index = array_search($id, $header);

        if($header[$index] && $paragraph[$index] && $icon[$index])
        {
            unset($header[$index]);
            unset($paragraph[$index]);
            unset($icon[$index]);
            
            $contactusrow->header = json_encode(array_values($header), JSON_UNESCAPED_UNICODE);
            $contactusrow->paragraph = json_encode(array_values($paragraph), JSON_UNESCAPED_UNICODE);
            $contactusrow->icon = json_encode(array_values($icon), JSON_UNESCAPED_UNICODE);

            $contactusrow->save();

            return redirect('dashboard/dynamic-edit/contact-us-row')->with('delete', "rows silindi");
        } 
        else
        {
            return redirect('dashboard/dynamic-edit/contact-us-row')->with('delete', "Değer dizide bulunamadı.");
        }
    }

    function allDelete($id)
    {
        $contactusrow = ContactUsRow::find($id);
        $contactusrow->delete();
        return redirect('dashboard/dynamic-edit/contact-us-row')->with('delete',"Contact Us Row silindi");
    }
}
