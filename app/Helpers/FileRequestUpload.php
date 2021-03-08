<?php

namespace App\Helpers;

use App\Exceptions\ProcessFailedException;
use App\Helpers\Response\Constants\Error;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FileRequestUpload
{
    /**
     * @var UploadedFile
     */
    public $uploadedFile;

    /**
     * @var string
     */
    public $directory;

    /**
     * @var null|string
     */
    public $filename;


    /**
     * FileRequestUpload constructor.
     *
     * @param UploadedFile $uploadedFile
     * @param string $directory
     * @param string|null $filename
     */
    public function __construct(UploadedFile $uploadedFile, string $directory, string $filename = null)
    {
        $this->uploadedFile = $uploadedFile;
        $this->directory = $directory;
        $this->filename = $filename;
    }


    /**
     * @param string $filename
     *
     * @return $this
     */
    public function setFilename(string $filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return null|string
     */
    public function upload()
    {
        try {

            $destination = Path::DEFAULT_PUBLIC_PATH($this->directory);

            if (!$this->filename) {
                $this->setCustomFilename();
            }

            $file = $this->directory . '/' . $this->filename;
            $this->uploadedFile->move($destination, $this->filename);

            return $file;

        } catch (\Exception $exception) {
            Log::error($exception);
            throw new ProcessFailedException(Error::UNABLE_TO_UPLOAD_FILE,
                $this->uploadedFile->getClientOriginalName());
        }
    }


    /*
     |--------------------------------------------------------------------------
     |  Private Function
     |--------------------------------------------------------------------------
     */

    private function setCustomFilename()
    {
        $extension = $this->uploadedFile->getClientOriginalExtension();
        $nameOnly = explode(".$extension", $this->uploadedFile->getClientOriginalName())[0];

        $this->filename = trim(str_replace(" ", "_",
            $nameOnly . Str::random('8') . ".$extension"));

        return $this;
    }

}
