<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Index
{
    public function index()
    {
    	echo '这里是首页';
    	$this->check();
    }
    private function check()
    {
    	$req=Request::instance();
    	$data=$req->parma();
    	if($this->isAdmin($data))
    	{
    		echo "<br>用户".$data['name']."登录成功";
    	}else{
    		echo "<br>用户登录失败，用户名或密码错误";
    	}
	}
	/**
	 * 判断数据库内是否有这个管理员
	 * @param  [type]  $e [获得的参数]
	 * @return boolean    [1 是管理员 0 未找到管理员]
	 */
	private function isAdmin($e){
		$res = Db::table('users')
			->where('name',$e['name'])
			->where('password',$e['password'])
			->find();
		//print_r($res);
		if($res)
			return 1;
		else
			return 0;
	}
}
