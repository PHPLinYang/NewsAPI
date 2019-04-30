<?php
namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'cate_id|分类' => 'require|integer',
        'title|标题' => 'require|length:1,30|unique:article',
        'author|作者' => 'require|length:1,20',
        'content|内容' => 'require',
    ];
    protected $message = [];

    protected $scene = [];
}