<?php

namespace App\Helpers\Response;

class Status
{
    /**
     * @var array|string|null
     */
    public $status;

    /**
     * @var array|string|null
     */
    public $info;


    /**
     * Status constructor.
     *
     * @param array|string|null $status
     * @param array|string|null $info
     */
    public function __construct($status = null, $info = null)
    {
        $this->status = $status;
        $this->info = is_string($info) ? [$info] : $info;
    }

}
