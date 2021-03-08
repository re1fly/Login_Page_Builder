<?php

if (!function_exists('parse_response_json')) {

    /**
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function parse_response_json($data)
    {
        return response()->json($data, 200);
    }

}

if (!function_exists('redirect_back_error')) {

    function redirect_back_error()
    {
    }

}