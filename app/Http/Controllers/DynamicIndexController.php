<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicIndexController extends Controller
{
    function index()
    {
        return view('dynamic.index');
    }
}
