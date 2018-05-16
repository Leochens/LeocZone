<?php
namespace app\index\model\record;
use think\Model;
use think\Db;

/**
 * @Author: Administrator
 * @Date:   2018-05-14 21:12:48
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-16 22:03:35
 */
class Comment extends Model{
	//protected $view;
	protected $table='comments';
	public function initialize()
	{
		parent::initialize();
		$this->view = Db::table('record_comment');
	}

	/**
	 * 递归获得评论列表 包含子评论
	 * @param  [type] $where [某一用户的说说的id集合]
	 * @param  [type] $parent_id [description]
	 * @param  array  &$result   [description]
	 * @return [type]            [返回$where集合中每一个说说的评论]
	 */
	public function getComment($where,$parent_id = null,&$result = array())
	{
		$arr = Db::table('record_comment')
		->where('parent_id',$parent_id)
		->where('record_id in ('.$where.')')
		->select();

		if(empty($arr)){
        	return array();
    	}
		foreach ($arr as $cm) {  
	        $thisArr=&$result[];
	        $cm["comment_children"] = $this->getComment($where,$cm["id"],$thisArr);    
	        $thisArr = $cm;                               
	    }
		return $result;
	}
	
	public function addComment($data)
	{
		
		$res=$this->insert($data);
		return $res?$res:0;
	}
	public function deleteComment($id)
	{
		$res=$this->view->delete($id);
		return $res?$res:0;
	}
}