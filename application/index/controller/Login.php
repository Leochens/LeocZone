<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Login extends Controller
{
    public function index()
    {
    	echo '这里是登录界面';
    	$this->check();
    	
    }
    public function check()
    {
 
    	$req=Request::instance();
    	//echo $req->url(); 
    	$data=$req->get();
    	print_r($data);

	}
}
