<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use SebastianBergmann\Template\Template;

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

        return ['status' => 'success'];
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
        file_put_contents($this->jsonPath, $request->template);

        return ['status' => 'success'];
    }

}
