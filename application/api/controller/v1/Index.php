<?php

namespace app\api\controller\v1;
use app\api\controller\Base;


class Index extends Base
{
    /**
     * APP首页接口
     *
     * @return \think\Response
     */
    public function index()
    {
        //模拟数据，实际获取数据库数据，更具相应条件返回数据
        //获取首页轮播图4条
        $banners = config('api.banner');
        //推荐位文章列表
        $articles = config('api.article');
        $data = [
            'banner' => $banners,
            'article' => $articles
        ];

        return show(config('api.successCode'),'OK',$data,200);
    }
}
