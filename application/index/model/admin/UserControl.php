<?php
namespace app\index\model\admin;
use think\Model;
use think\Db;
/**
 * @Author: Administrator
 * @Date:   2018-05-11 17:38:45
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-11 18:11:38
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
    	return Db::table($this->table)->select();
    }
}