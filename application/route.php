<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;


\think\Route::rule('','index.php');
\think\Route::rule('','index/user.Index/index');

//用户登录项
\think\Route::rule('user_login/index','index/user.Login/index');
\think\Route::rule('user_login/login','index/user.Login/login');
\think\Route::rule('user_regist/index','index/user.Regist/index');
\think\Route::rule('user_regist/regist','index/user.Regist/regist');
\think\Route::rule('user_logout','index/user.Index/logout');

//用户操作项
\think\Route::rule('user_r_add','index/user.Index/addRecord');
\think\Route::rule('user_r_update','index/user.Index/updateRecord');
\think\Route::rule('user_r_delete','index/user.Index/deleteRecord');
\think\Route::rule('user_f_add','index/user.Index/addFriend');
\think\Route::rule('user_f_delete','index/user.Index/deleteFriend');
\think\Route::rule('user_c_add','index/user.Index/addComment');

//管理员
\think\Route::rule('admin_page','index/admin.Admin/index');
\think\Route::rule('admin_logout','index/admin.Admin/logout');
\think\Route::rule('admin_login','index/admin.Login/login');
\think\Route::rule('admin_f_user','index/admin.Admin/forbiddenUser');
\think\Route::rule('admin_uf_user','index/admin.Admin/unForbiddenUser');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
