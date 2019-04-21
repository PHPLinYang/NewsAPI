<?php
namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'cate_name|分类名称' => 'require|chsAlphaNum|length:1,20|unique:category',
        'description|备注' => 'max:100',
    ];
    protected $message = [];

    protected $scene = [];
}