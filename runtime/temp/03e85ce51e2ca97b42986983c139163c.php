<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"D:\IT_study\recordthing\public/../application/index\view\admin\admin\index.html";i:1526269027;s:65:"D:\IT_study\recordthing\application\index\view\common\header.html";i:1526200105;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员界面</title>
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
	<h1>这里是管理员界面</h1>
	<h2><?php echo $msg; ?></h2>

	<h2>用户列表</h2>
	<ul>
	<?php if(is_array($userList) || $userList instanceof \think\Collection || $userList instanceof \think\Paginator): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<h3>用户<?php echo $item['id']; ?> <a href="<?php echo \think\Config::get('INDEX'); ?>/admin_f_user?user_id=<?php echo $item['id']; ?>">禁言</a>
							<a href="<?php echo \think\Config::get('INDEX'); ?>/admin_uf_user?user_id=<?php echo $item['id']; ?>">解禁</a></h3>
		<li>用户名 <?php echo $item['name']; ?></li>
		<li>密码 <?php echo $item['password']; ?></li>
		<li>是否禁言 <?php echo $item['is_forbidden']; ?></li>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>

	<h2>记事列表</h2>
	<ul>
	<?php if(is_array($recordList) || $recordList instanceof \think\Collection || $recordList instanceof \think\Paginator): $i = 0; $__LIST__ = $recordList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<h3>id: <?php echo $item['id']; ?></h3>
		<li>标题 	<?php echo $item['title']; ?></li>
		<li>内容 	<?php echo $item['content']; ?></li>
		<li>作者 	<?php echo $item['author']; ?></li>
		<li>创建时间 <?php echo $item['create_time']; ?> </li>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	
<a href="<?php echo \think\Config::get('INDEX'); ?>/admin_logout">注销</a>
</body>
</html>