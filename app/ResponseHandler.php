<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class ResponseHandler
{
    public function resSuccess($code, $status, $data)
    {
        return response()->json([
            'code' => $code, 'status' => $status, 'data' => $data
        ]);
    }

    public function resError($code, $status, $msg)
    {
        return response()->json([
            'code' => $code, 'status' => $status, 'msg' => $msg
        ]);
    }

    public function validationError($errors)
    {   
        return response()->json([
            'code' => 422,
            'message' => 'Validasi Error !',
            'error' => $errors
        ]);
    }

    public function internalError() {
        return response()->json([
            'status' => 500,
            'message' => "Internal server error",
        ]);
    }

}
?>