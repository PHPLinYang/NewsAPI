<?php

namespace app\api\controller\v1;
use app\api\controller\Base;


class Articles extends Base
{
    /**
     * APP首页接口
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取分类ID
        $cate_id = input('param.cate_id');
        //模拟数据，实际获取数据库数据，更具相应条件返回数据
        //status=1,create_time desc
        //文章列表页，需要根据分类ID获取对应文章数据
        $articles = config('api.news');

        $result = [];
        foreach ($articles as $v){
            if($v['cate_id'] == $cate_id){
                $result[] = $v;
            }
        }

        //处理分页
//        $size = input('param.size');
//        $totle = 40;
//        $page_num = ceil($totle/$size);

        return show(config('api.successCode'),'OK',$result);
    }

    //文章详情页
    public function read($id)
    {
        $id = intval($id);
        $articles = config('api.news');
        $result = [];
        foreach ($articles as $v){
            if($v['id'] == $id){
                $result[] = $v;
            }
        }
        //更新阅读数+1

        return show(config('api.successCode'),'OK',$result);
    }
}
