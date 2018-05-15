<?php
namespace app\index\controller\record;
use think\Controller;
use think\Db;
use think\Request;
/**
 * @Author: Administrator
 * @Date:   2018-05-14 21:26:17
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-15 21:58:13
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
	public function getComment()
	{

		$res = $this->commentModel->getComment();
		return $res;
	}
	public function addComment($data)
	{
		$res = $this->commentModel->addComment($data);
		return $res;
	}
}