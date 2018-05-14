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
$INDEX='index.php/';


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