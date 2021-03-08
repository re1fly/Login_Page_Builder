<?php

namespace App\Exceptions;

use App\Helpers\Response\Constants\Error;

class DataNotFoundException extends ProcessFailedException
{
    protected function defaultStatus(): array
    {
        return Error::DATA_NOT_FOUND;
    }
}
