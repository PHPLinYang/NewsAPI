<?php

namespace app\api\controller\v1;
use app\api\controller\Base;


class Category extends Base
{
    /**
     * 分类接口
     *
     * @return \think\Response
     */
    public function index()
    {
        if(input('param.id')){
            $id = input('param.id');
            if(empty($id) || !is_numeric($id)){
                return show(0,'请求参数错误！',[],403);
            }
            $category = model('Category')->where('status',1)
                ->field('id,cate_name')
                ->find($id);

            return show(config('api.successCode'),'OK',$category,200);
        }else{
            $categorys = model('Category')->where('status',1)
                ->field('id,cate_name')
                ->select();
            $result[] = [
                'id' => 0,
                'cate_name' => '首页',
            ];
            foreach ($categorys as $v){
                $result[] = [
                    'id' => $v['id'],
                    'cate_name' => $v['cate_name'],
                ];
            }

            return show(config('api.successCode'),'OK',$result,200);
        }
    }
}
