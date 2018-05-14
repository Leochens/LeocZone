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

\think\Route::rule('user_login','index/user.Index/login');
\think\Route::rule('user_r_add','index/user.Index/addRecord');
\think\Route::rule('user_r_update','index/user.Index/updateRecord');
\think\Route::rule('user_r_delete','index/user.Index/deleteRecord');


\think\Route::rule('admin_page','index/admin.Admin/index');
\think\Route::rule('admin_logout','index/admin.Admin/logout');
\think\Route::rule('admin_login','index/admin.Admin/login');
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
