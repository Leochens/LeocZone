<?php
namespace app\index\controller\admin;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
class Admin extends Controller
{
    public function index()
    {
    	if($this->check())
    	{
    		$msg = '管理员'.Session::get('admin').'登录成功';
    	}else{
    		 $this->error('管理员未登陆,跳转至登陆页面',"index/admin.Login/index");
    	}
        $userList = $this->getAllUser();
        // echo "<pre/>";
        // print_r($userList);
       
    	$this->assign([
    			'msg'=>$msg,
                'userList'=>$userList
    			]);
    	return $this->fetch();
    }


    private function getAllUser()
    {
        $userControl = model('index/admin/UserControl');
        //$userControl = new UserControl();
        $res = $userControl->getAllUser();
        return $res;
    }










    private function check()
    {
    	if(Session::has('admin'))
    		return 1;
    	else 
    		return 0;
	}
	public function logout(){
		Session::delete('user');
		$this->success('删除session成功','admin/Login');    //
        
        }


}
