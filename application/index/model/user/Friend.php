<?php
namespace app\index\model\user;
use think\Model;
use think\Db;
/**
 * @Author: Administrator
 * @Date:   2018-05-11 22:51:31
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-11 23:18:17
 */
class Friend extends Model{

	protected $table='user_friends';

	protected function initialize()
	{
		parent::initialize();
	}

	public function getFriends($user_id)
	{
		return $this
			->where('user_id',$user_id)
			->select();
	}
}