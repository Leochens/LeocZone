<?php
namespace app\index\controller\record;
use think\Controller;
use think\Db;
/**
 * @Author: Administrator
 * @Date:   2018-05-09 21:46:03
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-09 23:24:25
 * 分册控制器  主要提供其他控制器数据集
 */

class Record extends Controller{

	public function index(){

	}
	/*
	获取全部的数据
	主要对于管理员
	 */
	public function getAll()
	{
		$res = Db::table('records')->select();
		return $res?$res:-1;
	}
	/*
	获取对应用户的记录数据
	 */
	public function getByUser($user_id)
	{
		$res = Db::table('records')
				->where('user_id',$user_id)
				->select();
		return $res?$res:-1;
	}


} 