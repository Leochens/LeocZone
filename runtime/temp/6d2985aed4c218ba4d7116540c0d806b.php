<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\IT_study\recordthing\public/../application/index\view\user\login\index.html";i:1526268152;s:65:"D:\IT_study\recordthing\application\index\view\common\header.html";i:1526200105;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登录</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

 	<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<div class="container col-lg-4 col-lg-offset-4 text-center">
	<h3>登陆Leoc</h3>
	</div>
	<form class="form-group col-lg-4 col-lg-offset-4" action="<?php echo \think\Config::get('INDEX'); ?>/user_login/login" method="post">
		<input class="input form-control" type="text" name="name" placeholder="用户名" ><br>
		<input class="input form-control" type="password" name="password" placeholder="密码" id=""><br>
		<input class="form-control btn btn-info" type="submit" value="Login Now">	
		<a href="<?php echo \think\Config::get('INDEX'); ?>/user_regist/index">没有账号？注册一个</a>

	</form>
</body>
</html>