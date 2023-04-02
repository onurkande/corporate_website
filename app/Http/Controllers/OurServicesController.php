<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    function index()
    {
        return view('dynamic.our-services');
    }
}
