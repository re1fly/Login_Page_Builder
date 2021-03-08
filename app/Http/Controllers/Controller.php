<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Http\Requests\TemplateRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $tmpDir;
    private $htmlPath;
    private $jsonPath;
    private $formPath;


    public function __construct()
    {
        $this->tmpDir = storage_path('tmp');
        $this->htmlPath = $this->tmpDir . '/template_html.html';
        $this->jsonPath = $this->tmpDir . '/template_json.json';
        $this->formPath = $this->tmpDir . '/form_json.json';
    }

    public function testing(Request $request)
    {
        return substr(strrchr('testing.test.php', '.'), 1);
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
        $template = json_decode($request->template, true);

        if (!file_exists($this->tmpDir)) {
            mkdir($this->tmpDir, 0777, true);
        }

        if (file_exists($this->formPath)) {
            unlink($this->jsonPath);
        }

        $design = $this->setDesign($template);

        fopen($this->jsonPath, 'w');
        file_put_contents($this->jsonPath, json_encode($template['design'], true));

        $content = file_get_contents($this->jsonPath);
        $content = json_decode($content, true);

        return ['status' => 'success', 'results' => $content];
    }

    public function getForm()
    {
        $content = file_get_contents($this->formPath);
        $content = json_decode($content, true);

        return ['status' => 'success', 'results' => $content];
    }

    public function saveForm(FormRequest $request)
    {
        $form = json_decode($request->form, true);

        if (!file_exists($this->tmpDir)) {
            mkdir($this->tmpDir, 0777, true);
        }

        if (file_exists($this->formPath)) {
            unlink($this->formPath);
        }

        fopen($this->formPath, 'w');
        file_put_contents($this->formPath, json_encode($form, true));

        $content = file_get_contents($this->formPath);
        $content = json_decode($content, true);

        return ['status' => 'success', 'results' => $content];
    }

    private function setDesign($template)
    {
        if (isset($template['design']['body']['rows'])) {

            foreach ($template['design']['body']['rows'] as $rowKey => $row) {

                if (isset($row['columns'])) {

                    foreach ($row['columns'] as $columnKey => $column) {

                        if (isset($column['contents'])) {

                            foreach ($column['contents'] as $contentKey => $content) {

                                if (isset($content['type'])) {

                                    if ($content['type'] == 'image') {

                                        if ($content['values']['src']['url']) {
                                            $this->saveImageFromUrl($content['values']['src']['url']);
                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }
    }

    private function saveImageFromUrl($url)
    {
        $filename = Str::random(16) . '.' . substr(strrchr($url, '.'), 1);
        $ch = curl_init($url);
        $fp = fopen($this->tmpDir . '/' . $filename, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }

}
