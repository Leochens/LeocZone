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
    	//echo '这里是首页';
    	$this->login();
    	if($this->check())
    	{
    		$check = "用户".Session::get('name')."已登录";
    	}else
    	{
    		$check = "用户未登陆";
    	}
    	$this->assign([
    		'msg'=>'这里是首页',
            'check'=>$check
    		]);
    	return $this->fetch();
    	/*记得把index这个模块名写上*/

    	//print_r($this->e->deleteByUser(1,3));
    	
    }

    private function check(){
    	if(Session::has('user'))
    		return 1;
    	else 
    		return 0;
    }

    /**
     * 登录
     * @return [type] [description]
     */
    
    private function login()
    {
    	$req=Request::instance();
    	$data=$req->param();
    	if($this->isAdmin($data))
    	{
    		//echo "<br>用户".$data['name']."登录成功";
    		//$this->success("<br>用户".$data['name']."登录成功");
    		Session::set('user',$data['name']);
    		return 1;
    	}else{
    		//$this->error("<br>用户登录失败，用户名或密码错误");
    		return 0;
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



	public function logout(){
		Session::delete('user');
		return '删除session成功';
	}
}
