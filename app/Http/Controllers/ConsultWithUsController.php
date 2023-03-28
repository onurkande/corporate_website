<?php

namespace App\Http\Controllers;

use App\Models\ConsultWithUs;
use Illuminate\Http\Request;

class ConsultWithUsController extends Controller
{
    function index()
    {
        return view('dynamic.consult-with-us');
    }

    function store()
    {
        $title = request()->input('title');
        $header = request()->input('header');
        $content = request()->input('content');

        if ($title != null or $header != null or $content != null) {
            $rows = [
                $header => [
                    "header" => $header,
                    "content" => $content
                ]
            ];

            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
        } else {
            $rows = null;
        }

        $consultwithus = new ConsultWithUs;
        $consultwithus->title = $title;
        $consultwithus->rows = $rows;

        $consultwithus->save();

        return redirect('dashboard/dynamic-edit/consult-with-us');
    }

    function update()
    {
        $title = request()->input('title');
        $header = request()->input('header');
        $content = request()->input('content');

        if ($title != null or $header != null or $content != null) {
            $rows = [
                $header => [
                    "header" => $header,
                    "content" => $content
                ]
            ];

            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
        } else {
            $rows = null;
        }

        $consultwithus = ConsultWithUs::latest()->first();
        $consultwithus->title = $title;
        $consultwithus->rows = $rows;

        $consultwithus->save();

        return redirect('dashboard/dynamic-edit/consult-with-us');
    }
}