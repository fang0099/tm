<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-17
 * Time: 下午11:57
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminIndexController extends AdminBaseController
{
    public function index(){
        $invoker = app('App\Invokers\WsssebInfoInvoker');
        var_dump($invoker);
        return $invoker->get();
    }

    public function form(Request $request){
        $model = $request->input('model');
        if(!$model){
            return view('admin.notfound');
        }
        $path = 'models/' . $model . '.json';
        if(Storage::exists($path)){
            $content = Storage::get($path);
            $m = json_decode($content, true);
            $id = $request->input('id');
            if($id || $model == 'webinfo'){
                $invoker = $m['invoker'];
                try{
                    $invoker = $this->getInvoker($invoker);
                    $data = $invoker->get(['id' => $id]);
                    if ($data['success']){
                        return view('admin.form', [
                            'config' => $m,
                            'action' => 'update',
                            'data' => $data['data'],
                            'model' => $model
                        ]);
                    }else {
                        return view('admin.error', ['error' => $data['message']]);
                    }

                }catch(Exception $e){
                    return view('admin.internalerror');
                }
            }else {
                return view('admin.form', ['config' => $m, 'action' => 'create', 'model' => $model]);
            }

        }else {
            return view('admin.notfound');
        }
    }

    public function page(Request $request){
        $model = $request->input('model');
        if(!$model){
            return view('admin.notfound');
        }
        $path = 'models/' . $model . '.json';
        if(Storage::exists($path)){
            $content = Storage::get($path);
            $m = json_decode($content, true);
            $id = $request->input('id');
            if($id || $model == 'webinfo'){
                $invoker = $m['invoker'];
                try{
                    $invoker = $this->getInvoker($invoker);
                    $data = $invoker->get(['id' => $id]);
                    if ($data['success']){
                        return view('admin.page', [
                            'config' => $m,
                            'action' => 'update',
                            'data' => $data['data'],
                            'model' => $model
                        ]);
                    }else {
                        return view('admin.error', ['error' => $data['message']]);
                    }

                }catch(Exception $e){
                    return view('admin.internalerror');
                }
            }else {
                return view('admin.form', ['config' => $m, 'action' => 'create', 'model' => $model]);
            }

        }else {
            return view('admin.notfound');
        }
    }

    public function formDo($action, Request $request){
        $model = $request->input('model');
        if($model){
            $path = 'models/' . $model . '.json';
            if(Storage::exists($path)){
                $content = Storage::get($path);
                $m = json_decode($content, true);
                $invoker = $m['invoker'];
                try{
                    $invoker = $this->getInvoker($invoker);
                    $data = $invoker->$action($request->all());
                    if ($data['success']){
                        return ['success' => 'true'];
                    }else {
                        return ['success' => 'false', 'message' => $data['message']];
                    }

                }catch(Exception $e){
                    return ['success' => 'false', 'invoker exception'];
                }

            }else {
                return ['success' => 'false', 'message' => 'model can not found'];
            }
        }else {
            return ['success' => 'false', 'message' => 'no model'];
        }
    }

    public function list(Request $request){
        $model = $request->input('model');
        if($model){
            $path = 'models/' . $model . '.json';
            if(Storage::exists($path)){
                $content = Storage::get($path);
                $m = json_decode($content, true);
                $invoker = $m['invoker'];
                try{
                    $invoker = $this->getInvoker($invoker);
                    $data = $invoker->page();
                    if ($data['success']){
                        return view('admin.list', [
                            'config' => $m,
                            'action' => 'update',
                            'data' => isset($data['data']) ? (isset($data['data']['list']) ? $data['data']['list'] : $data['data']) : $data['list'],
                            'model' => $model
                        ]);
                    }else {
                        return view('admin.error', ['error' => $data['message']]);
                    }

                }catch(Exception $e){
                    return view('admin.internalerror');
                }

            }else {
                return view('admin.notfound');
            }
        }else {
            return view('admin.notfound');
        }
    }

    public function delete(Request $request){
        $model = $request->input('model');
        if($model){
            $path = 'models/' . $model . '.json';
            if(Storage::exists($path)){
                $content = Storage::get($path);
                $m = json_decode($content, true);
                $invoker = $m['invoker'];
                try{
                    $invoker = $this->getInvoker($invoker);
                    $data = $invoker->delete(['ids' => $request->input('ids')]);
                    if ($data['success']){
                        return ['success' => 'true'];
                    }else {
                        return ['success' => 'false', 'message' => $data['message']];
                    }

                }catch(Exception $e){
                    return ['success' => 'false', 'invoker exception'];
                }

            }else {
                return ['success' => 'false', 'message' => 'model can not found'];
            }
        }else {
            return ['success' => 'false', 'message' => 'no model'];
        }
    }

}