<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:22
 */

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
//use Log;
trait ApiInvoker
{
    protected $methodMap = [
        'webinfo' => [
            'get' => 'GET',
            'update' => 'POST'
        ],
        'friendlink' => [
            'create' => 'POST',
            'update' => 'POST'
        ],
        'article' => [
            'get' => 'GET',
            'create' => 'POST',
            'update'=> 'POST',
            'list' => 'GET',
            'like' => 'GET',
            'unlike' => 'GET',
            'comment' => 'POST',
            'update' => 'POST'
        ],
        'user' => [
            'get' => 'GET',
            'getbyname' => 'GET',
            'create'=> 'POST',
            'list'=>'GET',
            'update'=>'POST',
            'delete'=>'GET',
            'followers'=>'GET',
            'lastedarticles' => 'GET',
        ],
        'tag' => [
            'get' => 'GET',
            'create' => 'POST',
            'list' => 'GET',
            'update' =>  'POST',
            'delete' => 'GET',
            'subscribe' => 'GET',
            'unsubscribe' => 'GET',
            'articles' => 'GET',
            'subscriber' => 'GET',
        'newsflash' => [
            'create' => 'POST',
            'update' => 'POST'
        ],
        'sponsors' => [
            'create' => 'POST',
            'update' => 'POST'
        ]
        ]

    ];

    protected function invoke($module, $func, $params){
        $baseUrl = env('BASE_URL');
        $url = $baseUrl . $module . '/' . $func ;
        $client = new Client();
        //Log::debug('api url is ' . $url . '. params is ' . var_export($params, true));

        $requestParam = [];
        foreach ($params as $p){
            $requestParam = array_merge($requestParam, $p);
        }

        try{
            if(isset($this->methodMap[$module]) && isset($this->methodMap[$module][$func]) && $this->methodMap[$module][$func] !="GET"){
                $method = $this->methodMap[$module][$func];
                $res = $client->request($method, $url, [
                    'form_params' => $requestParam
                ]);
            }else {
                $method = 'GET';
                $res = $client->request($method, $url, ['query' => $requestParam]);
            }

            $r = $res->getBody();
            //echo $r;
            $r = json_decode($r, true);
            return $r;
        }catch (ClientException $ce){
            //Log::error($ce);
        }

    }

}