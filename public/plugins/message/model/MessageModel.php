<?php
/**
 * 留言model
 * User: jason
 * Date: 18-1-15
 * Time: 上午9:42
 */
namespace plugins\message\model;
use think\Model;
use think\Validate;


class MessageModel extends Model
{
    protected $autoWriteTimestamp = true;

    public function saves($data)
    {
        $result = $this->validate(
            [
                'name'  => 'require|max:25',
                'phone' => ['regex:/^1[3|4|5|7|8][0-9]\d{4,8}$/']
            ],
            [
                'name.require'  =>  '用户名必须填,最多不可超过十个字',
                'phone' =>  '手机号不正确',
            ]
        )->save($data);
        if (false === $result){
            return $this->getError();
        }else{
            return true;
        }
    }
}