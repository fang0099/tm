<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-18
 * Time: 下午4:34
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class AdminUploadController extends AdminBaseController
{

    public function upload(Request $request){
        $files = $request->file();
        $path = '';
        foreach ($files as $file){
            $uuid = Uuid::generate();
            $fileName = $uuid . '.' . $file->getClientOriginalExtension();
            $path = '/upload/' . $fileName;
            $file->move(public_path('upload'), $fileName);
        }
        return response()->json(['success' => true, 'path' => $path]);
    }
}