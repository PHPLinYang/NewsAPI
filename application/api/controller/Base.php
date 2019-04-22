<?php
namespace app\api\controller;

use app\common\lib\ApiException;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $this->checkRequestAuth();
    }

    //检查每次APP请求数据是否合法
    private function checkRequestAuth()
    {
        //获取头信息
        $headers = request()->header();
        //halt($headers['sign']);
        //tudo
        if(empty($headers['sign'])){
            throw new ApiException('Sign不存在',400);
        }

        //请求过期时间检验:此处等待AES解密头信息

        if(!in_array($headers['app_type'],config('api.app_type'))){
            throw new ApiException('设备不合法',400);
        }

        $this->checkSign($headers['sign']);
    }

    //检验sign合法性
    private function checkSign($data)
    {
        //解密:sha1是不可逆函数,所以请换AES加密算法
        $sign = 'b08dc2d5b837618e53f86e606f80698767ea81aa';

        if($sign != $data){
            throw new ApiException('Sign不合法',401);
        }
    }
}