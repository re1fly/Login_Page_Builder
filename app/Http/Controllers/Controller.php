<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $tmpDir;
    private $htmlPath;
    private $jsonPath;

    public function __construct()
    {
        $this->tmpDir = storage_path('tmp');
        $this->htmlPath = $this->tmpDir . '/template_html.html';
        $this->jsonPath = $this->tmpDir . '/template_json.json';
    }

    public function testing(Request $request)
    {
        $this->saveImageFromUrl();
    }

    public function getHtml()
    {
        $content = file_get_contents($this->htmlPath);

        return ['status' => 'success', 'results' => $content];
    }

    public function saveHtml(TemplateRequest $request)
    {
        if (!file_exists($this->tmpDir)) {
            mkdir($this->tmpDir, 0777, true);
        }

        if (file_exists($this->htmlPath)) {
            unlink($this->htmlPath);
        }

        fopen($this->htmlPath, 'w');
        file_put_contents($this->htmlPath, $request->template);

        $content = file_get_contents($this->htmlPath);

        return ['status' => 'success', 'results' => $content];
    }

    public function getJson()
    {
        $content = file_get_contents($this->jsonPath);
        $content = json_decode($content, true);

        return ['status' => 'success', 'results' => $content];
    }

    public function saveJson(TemplateRequest $request)
    {
        if (!file_exists($this->tmpDir)) {
            mkdir($this->tmpDir, 0777, true);
        }

        if (file_exists($this->jsonPath)) {
            unlink($this->jsonPath);
        }

        fopen($this->jsonPath, 'w');
        file_put_contents($this->jsonPath, json_encode($request->template, true));

        $content = file_get_contents($this->jsonPath);
        $content = json_decode($content, true);

        return ['status' => 'success', 'results' => $content];
    }

    private function saveImageFromUrl()
    {
        $ch = curl_init('https://unroll-images-production.s3.amazonaws.com/projects/0/1613982288069-WhatsApp%20Image%202021-02-05%20at%2011.04.55.jpeg');
        $fp = fopen($this->tmpDir . '/testing.jpeg', 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }

}
