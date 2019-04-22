<?php
namespace app\api\controller;

use think\Controller;

class Test extends Controller
{
    public function index()
    {
        //加密
        $data = [
            'name' => config('api.name'),
            'token' => config('api.token'),
        ];
        //排序
        krsort($data);
        $string = http_build_query($data);
        $string = sha1($string.'yl');
        return $string;
    }
}