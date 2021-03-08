<?php

namespace App\Helpers\Response\Constants;

class Error
{
    /*
     |--------------------------------------------------------------------------
     |  GLOBAL
     |--------------------------------------------------------------------------
     */
    const VALIDATION = [10001, 'Missing required parameters'];
    const PROCESS_FAILED = [10002, 'Process data is failed'];
    const DATA_NOT_FOUND = [10003, 'Data not found'];
    const UNABLE_TO_UPLOAD_FILE = [10004, 'Unable to upload file'];


    /*
     |--------------------------------------------------------------------------
     |  LOGIN PAGE
     |--------------------------------------------------------------------------
     */
    const LOGIN_PAGE = [
        'UNABLE_TO_SAVE_PAGE' => [20001, 'Unable to save login page'],
        'LOGIN_PAGE_NOT_FOUND' => [20002, 'Hotspot login page not found'],
        'UNABLE_TO_DECODE_FORM' => [20003, 'Unable to decode form'],
        'UNABLE_TO_SAVE_FORM' => [20004, 'Unable to save form'],
    ];


    /*
     |--------------------------------------------------------------------------
     |  SERVICE LOCATION
     |--------------------------------------------------------------------------
     */
    const SERVICE_LOCATION = [
        'SERVICE_LOCATION_NOT_FOUND' => [30001, 'Service location not found'],
    ];

}
