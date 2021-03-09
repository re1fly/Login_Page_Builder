<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WifiSetup extends Controller
{

    public function index(Request $request)
    {
        return view('wifi_setup.index');
    }
}
