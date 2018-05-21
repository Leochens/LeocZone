<?php
namespace app\index\controller\massage;

use think\Controller;
use think\Db;
use think\Request;

/**
 * @Author: Administrator
 * @Date:   2018-05-21 17:20:59
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-21 17:28:12
 */

/**
 * 消息控制类
 */
class Massage extends Controller{

	public function index(){

		$user_id = getParam('user_id','获取用户id失败','get');
		$msgs = $this->getMsgs($user_id);
		return $this->fetch();
	}

	/**
	 * 根据用户id获得当前用户的消息列表
	 * @param  [type] $user_id [description]
	 * @return [type] 0 失败 成功返回消息列表
	 */
	public function getMsgs($user_id)
	{
		$res = Db::table('massages')->where('to_id',$user_id)->select();
		return $res?$res:0;
	}

}