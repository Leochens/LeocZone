<?php
namespace app\index\controller\user;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;

class Index extends Controller
{
    private $e;
	private $c;
    private $user_name;
    private $user_id;
	public function _initialize(){
        $this->e = controller('index/record/Record');
    	$this->c = controller('index/record/Comment');
        $this->user_name=Session::get('name');
        $this->user_id=Session::get('user_id');
	}
    public function index()
    {
    	
        $this->check();
    	$check = "用户".$this->user_name."已登录,id为：".$this->user_id;
        $show=1;
        $record_with_comment_list = $this->getRecord();
        $friendList= $this->getFriends();
        $friendsRecordList=$this->getFriendsRecord();
        //$commentList = $this->getComment();
       // $tmp=[];
        //$commentList = $this->getComment(null,$tmp);
        test($friendsRecordList);
        // echo '<pre>';
        // print_r($record_with_comment_list);
        // echo '</pre>';
        //echo APP_PATH;
        $this->assign([
            'msg'=>'这里是首页', 
            'check'=>$check,
            'recordList'=>$record_with_comment_list,
            'friendList'=>$friendList,
            'friendsRecordList'=>$friendsRecordList
            ]);
 
    	return $this->fetch();  	
    }
    private function check(){
    	if(Session::has('user'))
    		return 1;
    	else 
    		$this->error('用户未登陆,请登陆一下.',config('INDEX')."/user_login/index",'',$wait=1);
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
        //echo "当前用户的带评论说说数据 begin";
        $res = $this->e->getByUser($this->user_id);
        //echo "当前用户的带评论说说数据 end";
        return $res;
    }
    public function addRecord()
    {   
        $this->accessCheck();
        $req = Request::instance();
        $data = $req->param();
        if($data['title']=="")
            $data['title']="无标题";
        if($data['content']=="")
            $this->error("你总得说点什么吧老铁~~");
        $flag = $this->e->insertByUser($this->user_id,$data);
        if($flag)
            $this->success('添加成功');
        else
            $this->error('添加失败');

    }
    public function deleteRecord($user_id,$id)
    {
        //防止别人删除别人的记录
        if($user_id!=$this->user_id)
            $this->error("你可不能删除别人的记录哦！");
        $flag = $this->e->delete($id);
        if($flag)
            $this->success('删除成功');
        else
            $this->error('删除失败');
    }
    public function updateRecord(){


        $content = getParam('content','','post');
        $record_id = getParam('id','','post');
        $user_id = getParam('user_id','','post');
        if($user_id!=$this->user_id)
            $this->error("你可不能编辑别人的记录哦！");


        $res=$this->e->update($record_id,['content'=>$content]);
        if($res)
            $this->success('编辑成功');
        else
            $this->error('编辑失败');
    }
    //根据friend的id集 来聚合说说带评论
    public function getFriendsRecord()
    {
        $friends = $this->getFriends();
        $friendsIdList = [];
        foreach ($friends as $friend) {
            $friendsIdList[]=$friend['friend_id'];
        }
        $friend_record_with_comment = $this->e->getByUser(implode(',',$friendsIdList));

        return $friend_record_with_comment;
    }
    //用户对好友的操作
    private function getFriends(){
        $friend = model('index/user/Friend');

        $res = $friend->getFriends($this->user_id);

        return $res;
    }
    public function addFriend()
    {
        $user_name=getParam('user_name','请输入要加的好友的名字');
        if($user_name=="")
            $this->error('你还没有输入好友的用户名');
        $friend_id = $this->findUserId($user_name);
        if(!$friend_id)
        {
            $this->error("该好友不存在！请检查你的输入。");
        }
        $data = ['user_id' => $this->user_id,'friend_id'=>$friend_id['id']];
        $res = Db::table('friends')->insert($data);
        if($res)
            $this->success('添加成功');
        else
            $this->error('添加失败');
    }
    private function findUserId($user_name)
    {
        $res = Db::table('users')->where('name',$user_name)
        ->find();
        if($res)
            return $res;
        else
            return 0;
    }
    public function deleteFriend()
    {
        $friend_id=getParam('friend_id');
        $res = Db::table('friends')
        ->where('user_id',$this->user_id)
        ->where('friend_id',$friend_id)
        ->delete();
        if($res)
            $this->success('删除成功');
        else
            $this->error('删除失败');
    }

    public function getComment(){
        $res = $this->c->getComment();
        return $res?$res:0;
    }
    public function addComment(){
        $content = getParam('content','content lost','post');
        $record_id = getParam('record_id','record_id lost','post');
        $comment_author_id = $this->user_id;
        $data=[
            'record_id'=>$record_id,
            'content'=>$content,
            'create_time'=>date('Y-m-d h-i-s'),
            'parent_id'=>null,
            'comment_author_id'=>$comment_author_id
        ];
        $res = $this->c->addComment($data);
        return $res?$this->success('评论成功！'):0;
    }
    



    /**
     * 注销登录
     * @return [type] [description]
     */
	public function logout(){
        Session::delete('user');
		Session::delete('user_id');
		$this->success('删除session成功',config('INDEX').'/user_login/index');    //
        
        }
}
