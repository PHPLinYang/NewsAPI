<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/22 0022
 * Time: 9:49
 */
namespace app\common\lib;


use think\Exception;

class ApiException extends Exception
{
    protected $message;
    protected $code;
    public $httpCode;
    public function __construct($message = '',$httpCode = 0,$code = 0){
        $this->message = $message;
        $this->code = $code;
        $this->httpCode = $httpCode;
    }
}