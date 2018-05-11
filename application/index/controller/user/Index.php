<?php
namespace app\index\controller\user;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class Index extends Controller
{
	private $e;
    private $user_name;
    private $user_id;
	public function _initialize(){
    	$this->e = controller('index/record/Record');
        $this->user_name=Session::get('name');
        $this->user_id=Session::get('user_id');
	}
    public function index()
    {
    	
    	if($this->check())
    		$check = "用户".$this->user_name."已登录,id为：".$this->user_id;
        else
            $this->error('用户未登陆,请登陆一下.',"index/user.login/index",'',$wait=1);

        $res = $this->getRecord();
        $this->assign([
            'msg'=>'这里是首页',
            'check'=>$check,
            'data'=>$res
            ]);
        //print_r($res);
    	return $this->fetch();
    	
    }
    private function check(){
    	if(Session::has('user'))
    		return 1;
    	else 
    		return 0;
    }

    private function getRecord(){
        $res = $this->e->getByUser($this->user_id);
        if($res==-1)
            $this->error('获取用户记事列表失败');
        else
            return $res;
    }
    

	public function logout(){
        Session::delete('user');
		Session::delete('user_id');
		$this->success('删除session成功','index/user/login');    //
        
        }
}
