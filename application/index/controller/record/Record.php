<?php
namespace app\index\controller\record;
use think\Controller;
use think\Db;
use think\Request;
/**
 * @Author: Administrator
 * @Date:   2018-05-09 21:46:03 
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-16 22:38:46
 * 分层控制器  主要提供其他控制器数据集
 */

class Record extends Controller{


	private $single_user_records ;
	private $table;

	public function _initialize()
	{
		//$this->table = Db::table('records');
		$this->single_user_records=Db::table('single_user_records');
		$this->table = Db::table('records');
	}
	public function index(){

	}
	/*
	获取全部的数据
	主要对于管理员
	 */
	public function getAllRecords()
	{
		$res = $this->single_user_records->select();
		return $res?$res:-1;
	}
	/*
		获取对应用户的记录数据
		包括说说的内容和评论 
	 */
	public function getByUser($user_id)
	{

		$c= controller('index/record/Comment');
		$record_with_comment = $c->getRecordWithComment($user_id);
		//test($record_with_comment);
		return $record_with_comment;
	}

	/**
	 * 根据用户插入记录
	 * @param [type] $user_id [description]
	 * @param [type] $data    [description]
	 */
	public function insertByUser($user_id,$data)
	{
		$data['user_id']=$user_id;
		$data['create_time']=Date('y-m-d h-i-s');
		$flag = $this->table
				->insert($data);

		return $flag?1:0;
	}
	// public function InsertByAdmin($user_id,$data)
	// {
	// 	$data['user_id']=$user_id;
	// 	$data['type']=2;
	// 	$flag = $this->table
	// 			->insert($data);
	// }
	/**
	 * 根据用户删除记录
	 * @param [type] $user_id   [description]
	 * @param [type] $record_id [description]
	 */
	public function delete($record_id)
	{
		$flag = $this->table
			->delete($record_id);
		return $flag?1:0;
	}
	
	/**
	 * 根据用户更新记录
	 * @param [type] $user_id   [description]
	 * @param [type] $record_id [description]
	 */
	public function update($record_id,$data)
	{
		//$data['user_id']=$user_id;
		$flag = $this->table
				->where('id',$record_id)
				->update($data);
		return $flag?1:0;

	}

	//ajax请求
	public function getSingleRecord()
	{
		$record_id = Request::instance()->param('id');
		$res = $this->table
				->where('id',$record_id)
				->find();
		//echo "string";

		return json($res);
	}


} 