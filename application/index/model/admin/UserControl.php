<?php
namespace app\index\model\admin;
use think\Model;
use think\Db;
/**
 * @Author: Administrator
 * @Date:   2018-05-11 17:38:45
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-12 15:40:01
 */
class UserControl extends Model{

	protected $table='users';
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }
    public function getAllUser()
    {
    	return $this->select();
    }
    public function forbiddenUser($user_id)
    {
        return $this->where('id',$user_id)
                ->update(['is_forbidden'=>1]);
    }
}