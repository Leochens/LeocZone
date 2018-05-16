<?php
namespace app\index\model\record;
use think\Model;
use think\Db;

/**
 * @Author: Administrator
 * @Date:   2018-05-14 21:12:48
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-16 12:28:36
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
	 * @param  [type] $parent_id [description]
	 * @param  array  &$result   [description]
	 * @return [type]            [description]
	 */
	public function getComment($parent_id = null,&$result = array())
	{
		$arr = Db::table('record_comment')
		->where('parent_id',$parent_id)->select();
		if(empty($arr)){
        	return array();
    	}
		foreach ($arr as $cm) {  
	        $thisArr=&$result[];
	        $cm["comment_children"] = $this->getComment($cm["id"],$thisArr);    
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