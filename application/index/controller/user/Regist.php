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
 * @Last Modified time: 2018-05-12 20:41:54
 */
class Regist extends Controller{
	public function index(){
		return $this->fetch();
	}


	private function getParam($field,$errorMsg='出现错误',$method='get')
    {
        $req = Request::instance();
        if($req->has($field,$method))
            $res=$req->param($field);
        else
            $this->error($errorMsg);
        return $res;
    }
    public function regist()
    {
    	$username=$this->getParam("username",'','post');
		$password=md5($this->getParam("password",'','post'));
		$res=Db::table("users")->insert(['name'=>$username,'password'=>$password]);
		if($res)
			$this->success('用户注册成功！马上跳转到登录界面','user/Login');
		else
			$this->error('注册失败！');
    }
}
