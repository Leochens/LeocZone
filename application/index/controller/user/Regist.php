<?php
namespace app\index\controller\user;
use think\Controller;
use think\Db; 
use think\Request;
use think\Session;
/**
 * @Author: Administrator
 * @Date:   2018-05-12 20:19:21
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-05-13 16:43:39
 */
class Regist extends Controller{
	public function index(){
		return $this->fetch();
	}


    public function regist()
    {
    	$username=getParam("username",'','post');
        $password=getParam("password",'','post');
        if($password==""||$username=="")
            $this->error("信息不全！");
		$password=md5(getParam("password",'','post'));

		$res=Db::table("users")->insert(['name'=>$username,'password'=>$password]);
		if($res)
			$this->success('用户注册成功！马上跳转到登录界面','user/Login');
		else
			$this->error('注册失败！');
    }
}
