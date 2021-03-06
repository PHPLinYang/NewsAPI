<?php

namespace app\admin\model;

use think\Model;

class AuthRule extends Model
{
    public function add($data)
    {
        //自动写入时间戳
        //过滤数据
        //验证数据
        $validate = validate('AuthRule');
        if(!$validate->check($data)){
            return ['code' => 0,'msg' => $validate->getError()];
        }
        //写入数据库
        $res = $this->allowField(true)->save($data);
        if($res){
            return ['code' => 1,'msg' => '新增成功!'];
        }else{
            return ['code' => 0,'msg' => '新增失败!'];
        }
    }
}
