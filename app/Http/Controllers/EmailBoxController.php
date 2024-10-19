<?php

namespace App\Http\Controllers;

use App\Models\EmailBox;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EmailBoxController extends Controller
{
    function index()
    {
        $record = $this->hasRecord();
        return view('dynamic/email-box',['record'=>$record]);
    }

    function view()
    {
        $record = $this->hasRecord();
        return $record;
    }

    function store()
    {
        $EmailBox = new EmailBox;

        $title = request()->input('title');
        $content = request()->input('content');
        $button = request()->input('button');
        $email_name = request()->input('email_name');

        $EmailBox->title = $title;
        $EmailBox->content = $content;
        $EmailBox->button = $button;
        $EmailBox->email_name = $email_name;

        $EmailBox->save();

        return redirect('dashboard/dynamic-edit/email-box')->with('store', "Email Box eklendi");
    }

    function update($id)
    {
        $EmailBox = EmailBox::find($id);

        $title = request()->input('title');
        $content = request()->input('content');
        $button = request()->input('button');
        $email_name = request()->input('email_name');

        $EmailBox->title = $title;
        $EmailBox->content = $content;
        $EmailBox->button = $button;
        $EmailBox->email_name = $email_name;

        $EmailBox->save();

        return redirect('dashboard/dynamic-edit/email-box')->with('update', "Email Box güncellendi");
    }

    public static function hasRecord()
    {
        $EmailBox= EmailBox::latest()->first();
        if($EmailBox)
        {
            return $EmailBox;   
        }
        else
        {
            return $EmailBox;
        }
    }


    function allDelete($id)
    {
        $EmailBox = EmailBox::find($id);
        $EmailBox->delete();
        return redirect('dashboard/dynamic-edit/email-box')->with('delete',"Email Box silindi");
    }
}
