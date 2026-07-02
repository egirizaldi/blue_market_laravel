<?php
namespace App\Helpers;
use iluminate\Http\JsonResponse;

class responseHelper
{
    public static function jsonResponse($success,$message,$data,$statusCode)
    {
        return response()->json([
            'success'=>$success,
            'message'=>$message,
            'data'=>$data
        ],$statusCode);
    }
}
?>