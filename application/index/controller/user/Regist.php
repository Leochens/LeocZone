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
 * @Last Modified time: 2018-05-18 23:20:43
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
        $flag = $this->checkName($username);
        if($flag['code']!=1)
        {
            $this->error('注册失败！请按照要求来进行注册好嘛？');

        }
		$res=Db::table("users")->insert(['name'=>$username,'password'=>$password]);
		if($res)
			$this->success('用户注册成功！马上跳转到登录界面','user/Login');
		else 
			$this->error('注册失败！');
    }
    public function checkName()
    {
    	$username=getParam("username",'','post');
        if($username=="")
            return ['code'=>-1,'msg'=>'用户名不能为空'];

    	$flag = Db::table('users')->where('name',$username)->find();
    	if(!$flag)
    		return ['code'=>1,'msg'=>'用户名检测通过'];
    	else
    		return ['code'=>0,'msg'=>'用户名已被占用'];
    }
}
