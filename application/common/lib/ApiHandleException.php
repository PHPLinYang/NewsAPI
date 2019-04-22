<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/22 0022
 * Time: 9:49
 */
namespace app\common\lib;
use think\exception\Handle;

class ApiHandleException extends Handle
{
    protected $httpCode = 500;
    public function render(\Exception $e)
    {
        if($e instanceof ApiException){
            $this->httpCode = $e->httpCode;
        }
        if(config('app_debug')){
            return parent::render($e);
        }else{
            return show($e->getCode(),$e->getMessage(),[],$this->httpCode);
        }

    }
}