<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{
    public function add($data)
    {
        //自动写入时间戳
        //过滤数据
        //验证数据
        $validate = validate('Category');
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

    //获取器
    public function getStatusAttr($value)
    {
        $status = [
            1=>'<span class="label label-success radius">正常</span>',
            2=>'<span class="label label-warning radius">待审</span>'
        ];
        return $status[$value];
    }
}
