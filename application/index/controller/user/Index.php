<?php
namespace app\index\controller\user;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class Index extends Controller
{
	private $e;
	public function _initialize(){
    	$this->e = controller('index/record/Record');
	}
    public function index()
    {
    	
    	if($this->check())
    		$check = "用户".Session::get('name')."已登录";
        else
            $this->error('用户未登陆,请登陆一下.',"index/user.login/index",'',$wait=1);

    	$this->assign([
    		'msg'=>'这里是首页',
            'check'=>$check
    		]);
    	return $this->fetch();
    	
    }

    private function check(){
    	if(Session::has('user'))
    		return 1;
    	else 
    		return 0;
    }

    

	public function logout(){
		Session::delete('user');
		$this->success('删除session成功','index/user/login');    //
        
        }
}
