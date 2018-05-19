<?php
namespace app\index\controller\user;
use think\Controller;
use think\Db;

/**
 * @Author: Administrator
 * @Date:   2018-05-19 15:07:47
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-19 15:56:29
 */
//用户从分享链接过来要进行的操作
//此时用户是游客 可以看到朋友给他分享的说说 还可以看见点赞数最多的说说
//可以有一个登陆或注册的按钮

class Presentation extends Controller
{
	public function index()
	{
		$data = $this->dataArr();
		$record_data = $this->getRecordById($data['r_id']);
		//$record_comment = $this->getCommentById($data['r_id']);
		
		$this->assign([
			'msg'=>'这里是用户通过分享链接访问的控制器',
			'record'=>$record_data,
			//'comment'=>$record_comment
			]);
		
		return $this->fetch();

	}
	//获取传输参数
	private function dataArr()
	{
		$r_id = getParam('r_id','获取说说id失败','get');

		return [
		'r_id'=>$r_id,
		];
	}
	private function getRecordById($r_id)
	{
		//$R = controller('index/record/Record');

		//$res = Db::table('record_comment')->where('record_id',$r_id)->find();
		$res = Db::table('single_user_records')->where('id',$r_id)->find();
		
		return $res?$res:0;
	}
	// private function getCommentById($r_id)
	// {
	// 	$commentModel = model('index/record/Comment');
	// 	$comment=$commentModel->getComment($r_id); 
	// 	return $comment?$comment:array();
	// }
}
