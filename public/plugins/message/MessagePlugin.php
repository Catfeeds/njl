<?php
/**
 * 留言板插件
 * User: jason
 * Date: 18-1-15
 * Time: 上午9:15
 */
namespace plugins\message;//Demo插件英文名，改成你的插件英文就行了
use cmf\lib\Plugin;

//Demo插件英文名，改成你的插件英文就行了
class MessagePlugin extends Plugin
{

    public $info = array(
        'name'        => 'Message',//Demo插件英文名，改成你的插件英文就行了
        'title'       => '留言板插件',
        'description' => '实现留言功能',
        'status'      => 1,
        'author'      => 'Jason',
        'version'     => '1.0'
    );

    public $hasAdmin = 1;//插件是否有后台管理界面

    // 插件安装
    public function install()
    {
        return true;//安装成功返回true，失败false
    }

    // 插件卸载
    public function uninstall()
    {
        return true;//卸载成功返回true，失败false
    }

    //实现的footer钩子方法
    public function footerStart($param)
    {
        $config = $this->getConfig();
        $this->assign($config);
        echo $this->fetch('widget');
    }

}