<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-18
 * Time: 下午4:34
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class AdminUploadController extends AdminBaseController
{

    public function upload(Request $request){
        $files = $request->file();
        $path = '';
        foreach ($files as $file){
            $path = $file->store(public_path('upload'));
        }
        return ['success' => true, 'path' => $path];
    }
}