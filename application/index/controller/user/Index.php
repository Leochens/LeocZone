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
    	
        $this->check();
    	$check = "用户".$this->user_name."已登录,id为：".$this->user_id;
        $show=1;
        $recordList = $this->getRecord();


        $friendList= $this->getFriends();
        // echo '<pre />';
        // print_r($res2);
        $friendsRecordList=$this->getFriendsRecord();
        $this->assign([
            'msg'=>'这里是首页', 
            'check'=>$check,
            'recordList'=>$recordList,
            'friendList'=>$friendList,
            'friendsRecordList'=>$friendsRecordList
            ]);
        //print_r($res);
    	return $this->fetch();  	
    }
    private function check(){
    	if(Session::has('user'))
    		return 1;
    	else 
    		$this->error('用户未登陆,请登陆一下.',"index/user.login/index",'',$wait=1);
    }
    private function accessCheck()
    {
        $res =  Db::table('users')
            ->where('id',$this->user_id)
            ->value('is_forbidden');
        if($res)
            $this->error('您已被禁言，无法发表言论，如需解除请联系管理员。');
        else
            return 1;
    }

    // 用户对记录的操作
    private function getRecord(){
        $res = $this->e->getByUser($this->user_id);
        return $res;
    }
    public function addRecord()
    {   
        $this->accessCheck();
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
    public function updateRecord(){
        $content = $this->getParam('content','','post');
        $record_id = $this->getParam('id','','post');
        $res=$this->e->update($record_id,['content'=>$content]);
        if($res)
            $this->success('编辑成功','user/index');
        else
            $this->error('编辑失败');
    }
    //
    public function getFriendsRecord()
    {
        $friends = $this->getFriends();
        $friendsIdList = [];

        foreach ($friends as $friend) {
            $friendsIdList[]=$friend['friend_id'];
        }
        $res = Db::table('single_user_records')
            ->where('user_id','in',$friendsIdList)
            ->select();
        return $res;
    }


    //用户对好友的操作
    private function getFriends(){
        $friend = model('index/user/Friend');

        $res = $friend->getFriends($this->user_id);

        return $res;
    }
    public function addFriend()
    {
        $user_name=$this->getParam('user_name','请输入要加的好友的名字');
        $friend_id = $this->findUserId($user_name);
        $data = ['user_id' => $this->user_id,'friend_id'=>$friend_id['id']];
        $res = Db::table('friends')->insert($data);
        if($res)
            $this->success('添加成功');
        else
            $this->error('添加失败');
    }
    private function findUserId($user_name)
    {
        return Db::table('users')->where('name',$user_name)
        ->find();
    }
    public function deleteFriend()
    {
        $friend_id=$this->getParam('friend_id');
        $res = Db::table('friends')
        ->where('user_id',$this->user_id)
        ->where('friend_id',$friend_id)
        ->delete();
        if($res)
            $this->success('删除成功');
        else
            $this->error('删除失败');
    }



    /**
     * 注销登录
     * @return [type] [description]
     */
	public function logout(){
        Session::delete('user');
		Session::delete('user_id');
		$this->success('删除session成功','index/user/login');    //
        
        }


    /**
     * [获得 请求变量]
     * @param  [type] $field  [变量名]
     * @param  [type] $errorMsg  [出现错误时的返回字符串]
     * @param  string $method [方法 get|post]
     * @return [type]         [返回变量值]
     */
    private function getParam($field,$errorMsg='出现错误',$method='get')
    {
        $req = Request::instance();
        if($req->has($field,$method))
            $res=$req->param($field);
        else
            $this->error($errorMsg);
        return $res;
    }

}
