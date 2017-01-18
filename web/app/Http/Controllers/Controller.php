<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function jsonResult($success, $message = '', $data = []){
        return json_encode([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], JSON_UNESCAPED_UNICODE);
    }

    protected function getParams(Request $request){
        return $request->input('params');
    }

    protected function getInvoker($voker){
        return app('App\Invokers\\'. $voker);
    }

    public function upload(Request $request){
        $files = $request->file();
        $path = '';
        foreach ($files as $file){
            $uuid = Uuid::generate();
            if(is_array($file)){
                $file = $file[0];
            }
            $fileName = $uuid . '.' . $file->getClientOriginalExtension();
            $path = '/upload/' . $fileName;
            $file->move(public_path('upload'), $fileName);
        }
        return response()->json(['success' => true, 'path' => $path]);
    }
}
