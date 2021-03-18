<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $tmpDir;
    private $formPath;

    public function __construct()
    {
        $this->tmpDir = storage_path('tmp');
        $this->formPath = $this->tmpDir . '/form_json.json';
    }

    public function testing(Request $request)
    {
    }

    public function getHotspot()
    {
        $content = file_get_contents($this->formPath);
        $content = json_decode($content, true);

        return ['status' => 'success', 'results' => $content];
    }

    public function saveHotspot(Request $request)
    {
        $template = $request->all();
//        $template = json_decode($template, true);

        if (!file_exists($this->tmpDir)) {
            mkdir($this->tmpDir, 0777, true);
        }

        if (file_exists($this->formPath)) {
            unlink($this->formPath);
        }

        fopen($this->formPath, 'w');
        file_put_contents($this->formPath, json_encode($template, true));

        $content = file_get_contents($this->formPath);
        $content = json_decode($content, true);

        return ['status' => 'success', 'results' => $content];
    }

}
