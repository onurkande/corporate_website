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
        $title = request()->input('title');
        $number = request()->input('number');

        $contactusline = new ContactUsLine;
        $contactusline->title = $title;
        $contactusline->number = $number;
        $contactusline->save();
    }

    function update()
    {
        $title = request()->input('title');
        $number = request()->input('number');

        $contactusline = new ContactUsLine;
        $contactusline = $contactusline::find(1);
        $contactusline->title = $title;
        $contactusline->number = $number;
        $contactusline->save();
    }

    public static function hasRecord()
    {
        $contactusline = new ContactUsLine;
        $contactusline = $contactusline::find(1);
        if($contactusline)
        {
            return $contactusline;
        }
        else
        {
            return $contactusline;
        }
    }
}
