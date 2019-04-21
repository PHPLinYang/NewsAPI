<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取分类数据
        $categorys = model('Category')->order('sort')->paginate(5);

        $this->assign('categorys',$categorys);
        return $this->fetch('list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch('add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if($request->isPost()){
            $res = model('Category')->add(input('post.'));
            if($res['code'] == 0){
                $this->error($res['msg']);
            }else{
                $this->error($res['msg']);
            }
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        if(empty($id) || !is_numeric($id)){
            $this->error('参数不合法！');
        }
        //获取指定分类数据
        $category = model('Category')->find($id);
        if(request()->isPost()){
            halt(input('post.'));
        }
        $this->assign('category',$category);
        return $this->fetch();
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        if(empty($id) || !is_numeric($id)){
            $this->error('参数不合法！');
        }
        $res = model('Category')->where('id',$id)->delete();
        if($res){
            $this->error('删除成功！','category/index');
        }else{
            $this->error('删除失败！');
        }
    }
}
