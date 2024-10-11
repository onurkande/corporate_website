<?php

namespace App\Http\Controllers;

use App\Models\ContactUsLine;
use Illuminate\Http\Request;

class ContactUsLineController extends Controller
{
    function index()
    {
        $record = ContactUsLineController::hasRecord();
        return view('dynamic.contact-us-line',['record'=>$record]);
    }

    public static function view()
    {
        $record = ContactUsLineController::hasRecord();
        return $record;
    }

    function store()
    {
        $contactusline = new ContactUsLine;

        $title = request()->input('title');
        $number = request()->input('number');

        $contactusline->title = $title;
        $contactusline->number = $number;

        $contactusline->save();

        return redirect('dashboard/dynamic-edit/contact-us-line')->with('store', 'Contact Us Line eklendi');
    }

    function update($id)
    {
        $contactusline = ContactUsLine::find($id);

        $title = request()->input('title');
        $number = request()->input('number');

        $contactusline->title = $title;
        $contactusline->number = $number;

        $contactusline->save();

        return redirect('dashboard/dynamic-edit/contact-us-line')->with('update', 'Contact Us Line güncellendi');
    }

    public static function hasRecord()
    {
        $contactusline = new ContactUsLine;
        $contactusline = $contactusline::latest()->first();
        if($contactusline)
        {
            return $contactusline;
        }
        else
        {
            return $contactusline;
        }
    }

    function delete($id)
    {
        $contactusline = ContactUsLine::find($id);
        $contactusline->delete();
        return redirect('dashboard/dynamic-edit/contact-us-line')->with('delete', 'Contact Us Line silindi');
    }
}
