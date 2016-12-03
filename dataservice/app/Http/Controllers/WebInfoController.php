<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-1
 * Time: 下午9:41
 */

namespace App\Http\Controllers;


use App\Repositories\WebInfoRepository;
use Illuminate\Http\Request;

class WebInfoController extends Controller
{


    private $webInfoRepository;

    public function __construct(WebInfoRepository $webInfoRepository)
    {
        $this->webInfoRepository = $webInfoRepository;
    }

    public function update(Request $request){
        return $this->webInfoRepository->update($request);
    }

    public function get(){
        return $this->webInfoRepository->getById(1);
    }


}