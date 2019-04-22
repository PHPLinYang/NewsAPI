<?php
namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    public $auth_rule;
    public function _initialize()
    {
        $this->auth_rule = model('AuthRule');
    }
}