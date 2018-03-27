<?php
/**
 * 留言控制器.
 * User: jason
 * Date: 18-1-15
 * Time: 上午9:42
 */
namespace plugins\message\controller;
use cmf\controller\PluginBaseController;
use plugins\message\model\MessageModel;

class AdminIndexController extends PluginBaseController
{
    // 初始化后台用户，判断用户是否登陆
    public function _initialize()
    {
        //获取后台用户id
        $admin_id = cmf_get_current_admin_id();
        if (empty($admin_id)){
            $this->error('未登录');
        }
    }

    // 所有留言展示
    public function index()
    {
        $model = new MessageModel();
        // 倒叙显示
        $data = $model->order('id desc')->select();
        $this->assign('data',$data);
        return $this->fetch('/admin_index');
    }

    // 查看单条留言
    public function show()
    {
        // 获取id值
        $id = $this->request->param('id');
        $model = new MessageModel();
        // 查找单条数据
        $data = $model->find($id);
        $this->assign('data',$data);
        return $this->fetch('/admin_show');
    }

    // 删除某条留言
    public function delete()
    {
        $id = $this->request->param('id');
        MessageModel::destroy($id);
        return $this->success('删除成功');

    }

    // 写入留言
    public function insert_post()
    {
//        $data = $this->request->param();

        $post = $_POST;
        $model = new MessageModel();
        $reult = $model->saves($post);
        if ($reult == 1){
            return $this->success('留言成功');
        }else{
            return $this->error($reult);
        }
    }
}