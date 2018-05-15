<?php
namespace app\index\model\record;
use think\Model;
use think\Db;

/**
 * @Author: Administrator
 * @Date:   2018-05-14 21:12:48
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-14 21:38:46
 */
class Comment extends Model{
	protected $view;
	protected $table='comments';
	public function initialize()
	{
		parent::initialize();
		$this->view = Db::table('record_comment');
	}
	public function getComment($id)
	{
		$res = $this->where('record_id',$id)->select();
		return $res?$res:0;
	}

	public function addComment($data)
	{
		$res=$this->view->insert($data);
		return $res?$res:0;
	}
	public function deleteComment($id)
	{
		$res=$this->view->delete($id);
		return $res?$res:0;
	}
}