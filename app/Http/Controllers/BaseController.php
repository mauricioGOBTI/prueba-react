<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller {
    public function sendResponse($result, $message, $code = 200) {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'code'    => $code,
        ];
  
        return response()->json($response, 200);
    }
  
    public function sendError($error, $errorMessages = [], $code = 404) {
        $response = [
            'success' => false,
            'message' => $error,
            'code'    => $code,
        ];
  
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
  
        return response()->json($response, $code);
    }
}
