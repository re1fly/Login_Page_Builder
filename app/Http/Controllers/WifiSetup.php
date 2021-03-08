<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WifiSetup extends Controller
{
    public function index(Request $request)
    {
        return view('wifi_setup.index');
    }

    public function logoUpload(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Error' => $validator
                ], 'error', 500);
        }

        $uploadFolder = 'logo_images';
        $logoImage = $request->file('logo_image');

//        $logoName = time().'.'>$request->logo_image->extension();
    }
}
