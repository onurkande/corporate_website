<?php

namespace App\Http\Controllers;

use App\Models\InfoBox;
use Illuminate\Http\Request;

class InfoBoxController extends Controller
{
    function index()
    {
        return view('dynamic.info-box');
    }
}
