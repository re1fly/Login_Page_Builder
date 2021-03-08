<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Converter extends Controller
{
    public function convertHtml()
    {
//        $url = 'http://127.0.0.1:8000/html';
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_HTTPGET, true);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $response_json = curl_exec($ch);
//        curl_close($ch);
//        $response = json_decode($response_json, true);
//        dd($response);
        $htmlPath = storage_path('tmp') . '/template_html.html';
        $content = file_get_contents($htmlPath);

        return view('data',compact('content'));

    }
}
