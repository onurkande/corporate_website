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
        $title = request()->input('title');
        $content = request()->input('content');
        $button = request()->input('button');

        $EmailBox = new EmailBox;
        $EmailBox->title = $title;
        $EmailBox->content = $content;
        $EmailBox->button = $button;
        $EmailBox->save();

        return redirect('dashboard/dynamic-edit/email-box');
    }

    function update()
    {
        $title = request()->input('title');
        $content = request()->input('content');
        $button = request()->input('button');

        $EmailBox = new EmailBox;
        $EmailBox = $EmailBox::find(1);
        $EmailBox->title = $title;
        $EmailBox->content = $content;
        $EmailBox->button = $button;
        $EmailBox->save();

        return redirect('dashboard/dynamic-edit/email-box');
    }

    function hasRecord()
    {
        $EmailBox = new EmailBox;
        $EmailBox = EmailBox::find(1);
        return $EmailBox ?? null;
    }
}
