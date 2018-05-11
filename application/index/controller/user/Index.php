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

        $show=1;
        $res = $this->getRecord();

        if($res==-1)
            $show=0;
        $res2= $this->getFriends($this->user_id);
        // echo '<pre />';
        // print_r($res2);
        $this->assign([
            'msg'=>'这里是首页', 
            'check'=>$check,
            'data'=>$res,
            'show'=>$show,
            'friendList'=>$res2
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
        return $res;
    }
    public function insertRecord()
    {   
        $req = Request::instance();
        $data = $req->param();
        $flag = $this->e->insertByUser($this->user_id,$data);
        if($flag)
            $this->success('添加成功','user/index');
        else
            $this->error('添加失败');

    }
    public function deleteRecord($id)
    {
        $flag = $this->e->delete($id);
        if($flag)
            $this->success('删除成功','user/index');
        else
            $this->error('删除失败');
    }



    private function getFriends($user_id){
        $friend = model('index/user/Friend');
        $res = $friend->getFriends($user_id);
        return $res;
    }

	public function logout(){
        Session::delete('user');
		Session::delete('user_id');
		$this->success('删除session成功','index/user/login');    //
        
        }
}
