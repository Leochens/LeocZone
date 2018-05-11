<?php
namespace app\index\controller\record;
use think\Controller;
use think\Db;
/**
 * @Author: Administrator
 * @Date:   2018-05-09 21:46:03
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-11 16:43:55
 * 分层控制器  主要提供其他控制器数据集
 */

class Record extends Controller{


	private $user_table ;

	public function _initialize()
	{
		//$this->table = Db::table('records');
		$this->table = Db::table('single_user_records');
	}
	public function index(){

	}
	/*
	获取全部的数据
	主要对于管理员
	 */
	public function getAll()
	{
		$res = $this->table->select();
		return $res?$res:-1;
	}
	/*
		获取对应用户的记录数据
	 */
	public function getByUser($user_id)
	{
		$res = $this->table
				->where('user_id',$user_id)
				->select();
		return $res?$res:-1;
	}

	/**
	 * 根据用户插入记录
	 * @param [type] $user_id [description]
	 * @param [type] $data    [description]
	 */
	public function InsertByUser($user_id,$data)
	{
		$data['user_id']=$user_id;
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
	public function DeleteByUser($user_id,$record_id)
	{
		$flag = $this->table
			->where('user_id',$user_id)
			->delete($record_id);
		return $flag?1:0;
	}
	
	/**
	 * 根据用户更新记录
	 * @param [type] $user_id   [description]
	 * @param [type] $record_id [description]
	 */
	public function UpdateByUser($record_id,$data)
	{
		//$data['user_id']=$user_id;
		$flag = $this->table
				->where('id',$record_id)
				->update($data);
		return $flag?1:0;

	}
	


} 