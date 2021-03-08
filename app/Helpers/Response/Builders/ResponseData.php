<?php

namespace App\Helpers\Response\Builders;

use App\Helpers\Response\Constants\Success;

class ResponseData
{
    /**
     * @var int
     */
    public $status = Success::DEFAULT_CODE;

    /**
     * @var string
     */
    public $message = Success::DEFAULT_MESSAGE;

    /**
     * @var array|null
     */
    public $info = null;

    /**
     * @var array|null
     */
    public $data = null;

    /**
     * @var array|null
     */
    public $paginate = null;

}