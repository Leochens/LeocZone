<?php
namespace app\index\controller\record;
use think\Controller;
use think\Db;
/**
 * @Author: Administrator
 * @Date:   2018-05-09 21:46:03 
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-11 22:16:54
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
	 */
	public function getByUser($user_id)
	{
		$res = $this->single_user_records
				->where('user_id',$user_id)
				->select();
		return $res?$res:-1;
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
	public function updateByUser($record_id,$data)
	{
		//$data['user_id']=$user_id;
		$flag = $this->table
				->where('id',$record_id)
				->update($data);
		return $flag?1:0;

	}
	


} 