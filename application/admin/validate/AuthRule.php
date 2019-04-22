<?php
namespace app\admin\validate;

use think\Validate;

class AuthRule extends Validate
{
    protected $rule = [
        'title|名称' => 'require|chsAlphaNum|length:1,20|unique:auth_rule',
        'name|规则' => 'max:100',
    ];
    protected $message = [];

    protected $scene = [];
}