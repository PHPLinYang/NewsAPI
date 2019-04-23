<?php

namespace app\api\controller\v1;
use app\api\controller\Base;


class Search extends Base
{
    /**
     * APP搜索接口
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取搜索关键字
        //内容与文章列表页相同
        //条件where('title','like','%'.$title.'%');
    }
}
