<?php
namespace app\index\controller\record;
use think\Controller;
use think\Db;
use think\Request;
/**
 * @Author: Administrator
 * @Date:   2018-05-14 21:26:17
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-15 12:37:05
 */
class Comment extends Controller{
	private $commentModel ; 
	public function _initialize()
	{
		$this->commentModel=model('index/record/Comment');
	}
	public function index()
	{

	}
	public function getComment($record_id)
	{

		//var_dump($this->commentModel);
		$res = $this->commentModel->getComment($record_id);
		//TODO：放模版里看看
		// $this->assign([
		// 	'data'=>$res
		// 	]);
		// return $this->fetch();
		// 
		return $res?$res:0;
	}
}