<?php

namespace app\admin\controller;


class AuthRule extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取规则数据
        $rules = $this->auth_rule->where('status',1)->paginate();

        $this->assign('rules',$rules);
        return $this->fetch('list');
    }

    /**
     * 保存新建的资源
     *
     */
    public function save()
    {
        if(request()->isPost()){
            $res = $this->auth_rule->add(input('post.'));
            if($res['code'] == 0){
                $this->error($res['msg']);
            }else{
                $this->success($res['msg']);
            }
        }
        return $this->fetch('add');
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
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
        $res = $this->auth_rule->where('id',$id)->delete();
        if($res){
            $this->error('删除成功！','auth_rule/index');
        }else{
            $this->error('删除失败！');
        }
    }
}
