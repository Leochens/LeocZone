<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 



function getParam($field,$errorMsg='出现错误',$method='get')
    {
    	\think\Request::instance()->filter(['strip_tags','htmlspecialchars']);
        $req = \think\Request::instance();
        if($req->has($field,$method))
            $res=$req->param($field);
        else
        {
            $c = new \think\Controller();
            $c->error($errorMsg);
        }
        return $res;
    }
function test($T)
{
        echo "<pre>";
        print_r($T);
        echo "</pre>";
}

/**
 * 消息添加助手函数
 * @param [type]  $from_id     [发布者id ]    
 * @param [type]  $to_id       [接受者id]
 * @param [type]  $content     [消息内容]
 * @param string  $link        [跳转链接]
 * @param integer $type        [消息类型]
 * @param [type]  $create_time [时间戳 用来和用户最后一次刷新页面比对]
 * @param string  $extra       [附加json值]
 * @param string  $head_pic       [用户头像路径]
 */

function addMsg($from_id,$to_id,$content,$link='',$type=1,$create_time='',$extra='',$head_pic='')
{

    if($create_time=='')
        $create_time=date('y-m-d H-i-s');
    
    $data=[
    'from_id'=>$from_id,
    'to_id'=>$to_id,
    'content'=>$content,
    'link'=>$link,
    'type'=>$type,
    'create_time'=>$create_time,
    'extra'=>$extra,

    ];
    return \think\Db::table('massages')->insert($data);
}











