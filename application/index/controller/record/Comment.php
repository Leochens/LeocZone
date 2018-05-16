<?php
namespace app\index\controller\record;
use think\Controller;
use think\Db;
use think\Request;
/**
 * @Author: Administrator
 * @Date:   2018-05-14 21:26:17
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-16 13:39:24
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
	/**
	 * 获得当前用户的每条说说的评论
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function getRecordWithComment($user_id)
	{
		$recordListSql = 'SELECT id FROM '.'single_user_records'.' WHERE record_author_id='.$user_id;
		$ids = Db::table('record_comment')
			->where('record_id in ('.$recordListSql.')')
			->column('record_id');

		$commentList = $this->commentModel->getComment(implode(",",$ids));
		// echo "<pre/>";
		// echo implode(",",$ids);
		// print_r($commentList);

		//指定用户说说列表
		$recordList = Db::table('single_user_records')
			->where('user_id',$user_id)
			->select();

		//组合 使每一条说说都增加自己的评论字段 保存在$record_with_comment中
		$record_with_comment=[];
		foreach ($recordList as $r_item) {
                foreach ($commentList as $c_item) {
                    if($c_item['record_id']==$r_item['id'])
                    {
                        $r_item['comments'][]=$c_item;
                    }
                    else continue;
                }
              $record_with_comment[]=$r_item; 
        }
        //print_r($record_with_comment);
		return $record_with_comment;
	}
	public function addComment($data)
	{
		$res = $this->commentModel->addComment($data);
		return $res;
	}
}