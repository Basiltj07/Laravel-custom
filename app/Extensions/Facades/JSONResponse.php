<?php
namespace App\Extensions\Facades;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class JSONResponse extends Response {
    public static function send($status, $message, $content = NULL, $httpCode = 200){
        if ($status == Config::get('constants.STATUS.INACTIVE') && $httpCode == Config::get('constants.STATUS_CODE.HTTP_200')) {
            $httpCode = Config::get('constants.STATUS.HTTP_500');
        }

       return parent::json( array(
            'status'=> $status,
            'message'=> $message,
            'content' =>$content
        ))->setStatusCode($httpCode);
    }
}