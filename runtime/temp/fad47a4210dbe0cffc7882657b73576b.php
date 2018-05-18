<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:78:"D:\IT_study\recordthing\public/../application/index\view\user\index\index.html";i:1526622922;s:65:"D:\IT_study\recordthing\application\index\view\common\header.html";i:1526622262;s:73:"D:\IT_study\recordthing\application\index\view\user\index\tabContent.html";i:1526622887;s:72:"D:\IT_study\recordthing\application\index\view\user\index\myRecords.html";i:1526620066;s:72:"D:\IT_study\recordthing\application\index\view\user\index\addRecord.html";i:1526545158;s:76:"D:\IT_study\recordthing\application\index\view\user\index\friendRecords.html";i:1526619717;s:73:"D:\IT_study\recordthing\application\index\view\user\index\friendList.html";i:1526544993;s:72:"D:\IT_study\recordthing\application\index\view\user\index\addFriend.html";i:1526545226;s:69:"D:\IT_study\recordthing\application\index\view\user\index\logout.html";i:1526545292;s:68:"D:\IT_study\recordthing\application\index\view\user\index\reply.html";i:1526606083;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>


	<!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
  <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />

	<!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

 	<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script type="text/javascript" src="/static/js/bootstrap.min.js"></script>

	<!-- <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <?php 
        /**
             * 多维评论线性化
             * @var [type]
             */
            $test =function($data,&$arr=array(),$last_comment_author='')use(&$test){
              if(empty($data['comment_children']))
              {
                $d = $data;
                unset($d['comment_children']);
                $d['last_comment_author']=$last_comment_author;
                $arr[]=$d;
              }else
              {
                foreach ($data['comment_children'] as $d_item) {
                  $d = $data;
                  unset($d['comment_children']);
                  $d['last_comment_author']=$last_comment_author;
                  $arr[]=$d;
                  $test($d_item,$arr,$d['name']);
                }
              }
            };

   ?>
	<link rel="stylesheet" type="text/css" href="/static/css/index.css" />

	<style>

	</style>
	</head>
<body>
<header>
<!-- 	<div class="h3 col-lg-12 bg-info">Leoc——记事共享</div>
	<h4><?php echo $check; ?></h4>	 -->
</header>
<header id="header">
	<h1><a href="#">Future Imperfect</a></h1>
	<nav class="links">
		<ul>
	<!-- 		<li><a href="#">Lorem</a></li>
			<li><a href="#">Ipsum</a></li>
			<li><a href="#">Feugiat</a></li>
			<li><a href="#">Tempus</a></li>
			<li><a href="#">Adipiscing</a></li> -->
			<li role="presentation" class="active"><a href="#my_records" aria-controls="home" role="tab" data-toggle="tab">我的说说</a></li>
		    <li role="presentation"><a href="#add_record" aria-controls="add_record" role="tab" data-toggle="tab">添加说说</a></li>
		    <li role="presentation"><a href="#friends_records" aria-controls="friends_records" role="tab" data-toggle="tab">好友说说</a></li>
		    <li role="presentation"><a href="#friends_list" aria-controls="friends_list" role="tab" data-toggle="tab">好友列表</a></li>
		    <li role="presentation"><a href="#add_friend" aria-controls="add_friend" role="tab" data-toggle="tab">添加好友</a></li>
		    <li role="presentation"><a href="#logout" aria-controls="logout" role="tab" data-toggle="tab">注销登录</a></li>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<li class="search">
				<a class="fa-search" href="#search">Search</a>
				<form id="search" method="get" action="#">
					<input type="text" name="query" placeholder="Search" />
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
	 <!-- Tab panes -->
</header>
<content>

<div class="tab-content">
		 <div role="tabpanel" class="tab-pane fade in active" id="my_records">
	  	<br>
		<button class="btn btn-success" onclick="Control()">编辑</button>

		<ul>
			<?php if(is_array($recordList) || $recordList instanceof \think\Collection || $recordList instanceof \think\Paginator): $i = 0; $__LIST__ = $recordList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_item): $mod = ($i % 2 );++$i;?>
			<li>
			<div class="panel panel-default">
			  <div class="panel-heading">
			  <span class="h3"><?php echo $record_item['author']; ?></span>
			  <div class="control pull-right">
				    <a class="btn btn-danger" href="<?php echo \think\Config::get('INDEX'); ?>/user_r_delete?user_id=<?php echo $record_item['user_id']; ?>&id=<?php echo $record_item['id']; ?>" >删除</a>
					<button type="button" class="btn btn-warning" onclick="Load(<?php echo $record_item['id']; ?>)" data-toggle="modal" data-target="#update_record">编辑</button>
				</div>
			 <!--  <span class="h3 small pull-right">作者:<?php echo $record_item['author']; ?></span> -->
			  <span class="h3 small">添加时间:<?php echo $record_item['create_time']; ?></span>
			  </div>
			  <div class="panel-body">
			    <?php echo $record_item['content']; ?>
			    
				<div class="comment">
				<form method="post" action='<?php echo \think\Config::get('INDEX'); ?>/user_c_add' class="form-group col-lg-12">
			  	评论：<input type="text" name='content' class="form-control">
			  	<input type="hidden" name="record_id"  value="<?php echo $record_item['id']; ?>">
						<input class="btn btn-info" type="submit" value="提交">
					<?php if(is_array($record_item['comments']) || $record_item['comments'] instanceof \think\Collection || $record_item['comments'] instanceof \think\Paginator): $i = 0; $__LIST__ = $record_item['comments'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_item): $mod = ($i % 2 );++$i;
						$arr1 =array();
						$test($c_item,$arr1);
						$arr1[0]['parent']=1;
					 if(is_array($arr1) || $arr1 instanceof \think\Collection || $arr1 instanceof \think\Paginator): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_item): $mod = ($i % 2 );++$i;?>
						<div class="row">
							<li class="com_item " id="c_<?php echo $c_item['id']; ?>">
							<?php if(empty($child_item['last_comment_author'])): ?>

								<?php echo $child_item['name']; ?>:<?php echo $child_item['content']; else: ?>

								<?php echo $child_item['name']; ?>回复<?php echo $child_item['last_comment_author']; ?>:<?php echo $child_item['content']; endif; ?>
							<div class="item_control">
							<button type="button" class="btn btn-danger btn-sm" onclick="myCommentDel(<?php echo $c_item['id']; ?>,<?php echo $c_item['record_author_id']; ?>)">删除</button>
							<button type="button" class="btn btn-info btn-sm"  onmouseover="pushData(<?php echo $child_item['record_id']; ?>,<?php echo $child_item['id']; ?>,<?php echo $child_item['comment_author_id']; ?>)" data-toggle="modal" data-target="#reply_comment">回复</button>
							</div>
							</li>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
				

				</form>

			  	</div>
			  </div>
			</div>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>

	  </div>
		<div role="tabpanel" class="tab-pane fade" id="add_record">
		<br>
	  	<br>
		<form class="form-group" action="<?php echo \think\Config::get('INDEX'); ?>/user_r_add" method="post">
			title:<input class="form-control" type="text" name="title"><br>
			content: <textarea class="form-control" name="content"  cols="30" rows="10"></textarea>
			<input class="form-control" type="submit" value="add">	
		</form>
</div>
	 
		 <div role="tabpanel" class="tab-pane fade" id="friends_records">
  		<br>
	  	<br>
		<?php if(!empty($friendsRecordList)): ?>
		<ul class="list">
			<?php if(is_array($friendsRecordList) || $friendsRecordList instanceof \think\Collection || $friendsRecordList instanceof \think\Paginator): $i = 0; $__LIST__ = $friendsRecordList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
			<li>
			<div class="panel panel-default">
			  <div class="panel-heading">
			  <span class="h3"><?php echo $item['author']; ?></span>
			  <span class="h3 small pull-right">添加时间:<?php echo $item['create_time']; ?></span>
			  </div>
			  <div class="panel-body">
			    <?php echo $item['content']; ?>
			      <div class="comment">
					<form method="post" action='<?php echo \think\Config::get('INDEX'); ?>/user_c_add' class="form-group col-lg-12">
				  	评论：<input type="text" name='content' class="form-control">
				  	<input type="hidden" name="record_id"  value="<?php echo $item['id']; ?>">
							<input type="submit" value="提交">
						<?php if(is_array($item['comments']) || $item['comments'] instanceof \think\Collection || $item['comments'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['comments'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_item): $mod = ($i % 2 );++$i;
						$arr1 =array();
						$test($c_item,$arr1);
						$arr1[0]['parent']=1;
					 if(is_array($arr1) || $arr1 instanceof \think\Collection || $arr1 instanceof \think\Paginator): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_item): $mod = ($i % 2 );++$i;?>
							<li id="c_<?php echo $c_item['id']; ?>">
							<?php if(empty($child_item['last_comment_author'])): ?>

								<?php echo $child_item['name']; ?>:<?php echo $child_item['content']; else: ?>

								<?php echo $child_item['name']; ?>回复<?php echo $child_item['last_comment_author']; ?>:<?php echo $child_item['content']; endif; ?>
							<div class="item_control">
				<!-- 			<button type="button" class="btn btn-danger btn-sm" onclick="myCommentDel(<?php echo $c_item['id']; ?>,<?php echo $c_item['comment_author_id']; ?>)">删除</button> -->
							
							<button type="button" class="btn btn-info btn-sm"  onmouseover="pushData(<?php echo $child_item['record_id']; ?>,<?php echo $child_item['id']; ?>,<?php echo $child_item['comment_author_id']; ?>)" data-toggle="modal" data-target="#reply_comment">回复</button>
							</div>
							</li>
						<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
					</form>
			  	</div>
			  </div>
			
			</div>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<?php else: ?>
		<h1>获取好友记事列表失败，因为你还没有好友或好友并未发表说说。</h1>
		<?php endif; ?>
	  </div>
		<div role="tabpanel" class="tab-pane fade" id="friends_list">
		<br>
	  	<br>
		<ul class="list">
		<?php if(is_array($friendList) || $friendList instanceof \think\Collection || $friendList instanceof \think\Paginator): $i = 0; $__LIST__ = $friendList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
			<li><?php echo $item['friend_name']; ?> 
			<a href="<?php echo \think\Config::get('INDEX'); ?>/user_f_delete?friend_id=<?php echo $item['friend_id']; ?>">删除</a>
			</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	  </div>
		<div role="tabpanel" class="tab-pane fade" id="add_friend">
		<br>
	  	<br>
		<form class="form-group" action="<?php echo \think\Config::get('INDEX'); ?>/user_f_add" method="get">
			name:<input class="form-control" type="text" name="user_name"><br>
			<input class="form-control" type="submit" value="add">	
		</form>
</div>
		
<div role="tabpanel" class="tab-pane fade" id="logout">
<br>
	<br>
<a href="<?php echo \think\Config::get('INDEX'); ?>/user_logout">注销</a>
</div>

</div>

<div id="reply_comment" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">回复评论</h4>
      </div>
      <div class="modal-body">
		<div>
	    <legend></legend>
	
	    <div class="form-group">
	        <label for="">请输入回复内容</label>
	        <input id="reply_content" name="content" type="text" class="form-control"  placeholder="" value="">
          <input type="button" value="回复" onclick="reply()">
	    </div>
	    
		</div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



</content>

<div id="update_record" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑记事</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo \think\Config::get('INDEX'); ?>/user_r_update" method="POST" role="form">
	    <legend></legend>
	
	    <div class="form-group">
	        <label for="">请修改原来的记事</label>
	        <input id="old_record" name="content" type="text" class="form-control"  placeholder="">
	        <input type="hidden" name="id" id="old_record_id" >
	        <input type="hidden" name="user_id" id="user_id" >
	    </div>
	    <button type="submit"  class="btn btn-primary">保存</button>
		</form>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<footer>
	<h1 id="test"></h1>
	<button onclick="testData()">测试data暂存数据</button>
	<h2 id="tda"></h2>
</footer>	

<script type="text/javascript" src="/static/js/index.js"></script>

</body>
</html>	

<!DOCTYPE HTML>
<html>
	<head>
		<title>Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<!-- <link rel="stylesheet" href="assets/css/main.css" /> -->	
		<link rel="stylesheet" type="text/css" href="/static/css/main.css" />


		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Lorem ipsum</h3>
											<p>Feugiat tempus veroeros dolor</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Dolor sit amet</h3>
											<p>Sed vitae justo condimentum</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Feugiat veroeros</h3>
											<p>Phasellus sed ultricies mi congue</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Etiam sed consequat</h3>
											<p>Porta lectus amet ultricies</p>
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><a href="#" class="button big fit">Log In</a></li>
								</ul>
							</section>

					</section>
                    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Magna sed adipiscing</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">November 1, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
								<footer>
									<ul class="actions">
										<li><a href="#" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Ultricies sed magna euismod enim vitae gravida</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-25">October 25, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper.</p>
								<footer>
									<ul class="actions">
										<li><a href="#" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
                                
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Euismod et accumsan</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-22">October 22, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Cras vehicula tellus eu ligula viverra, ac fringilla turpis suscipit. Quisque vestibulum rhoncus ligula.</p>
								<footer>
									<ul class="actions">
										<li><a href="#" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

						<!-- Post -->
						<!--
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Elements</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-18">October 18, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>

								<section>
									<h3>Text</h3>
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<hr />
									<h4>Blockquote</h4>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h4>Preformatted</h4>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
  print 'Iteration ' + i;
  deck.shuffle();
  i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
								</section>

								<section>
									<h3>Lists</h3>
									<div class="row">
										<div class="6u 12u$(medium)">
											<h4>Unordered</h4>
											<ul>
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
												<li>Felis enim feugiat.</li>
											</ul>
											<h4>Alternate</h4>
											<ul class="alt">
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
												<li>Felis enim feugiat.</li>
											</ul>
										</div>
										<div class="6u$ 12u$(medium)">
											<h4>Ordered</h4>
											<ol>
												<li>Dolor pulvinar etiam.</li>
												<li>Etiam vel felis viverra.</li>
												<li>Felis enim feugiat.</li>
												<li>Dolor pulvinar etiam.</li>
												<li>Etiam vel felis lorem.</li>
												<li>Felis enim et feugiat.</li>
											</ol>
											<h4>Icons</h4>
											<ul class="icons">
												<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
											</ul>
										</div>
									</div>
									<h3>Actions</h3>
									<div class="row">
										<div class="6u 12u$(medium)">
											<ul class="actions">
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
											</ul>
											<ul class="actions small">
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
											</ul>
											<ul class="actions vertical">
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
											</ul>
											<ul class="actions vertical small">
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
											</ul>
										</div>
										<div class="6u 12u$(medium)">
											<ul class="actions vertical">
												<li><a href="#" class="button fit">Default</a></li>
												<li><a href="#" class="button fit">Default</a></li>
											</ul>
											<ul class="actions vertical small">
												<li><a href="#" class="button small fit">Small</a></li>
												<li><a href="#" class="button small fit">Small</a></li>
											</ul>
										</div>
									</div>
								</section>

								<section>
									<h3>Table</h3>
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</section>

								<section>
									<h3>Buttons</h3>
									<ul class="actions">
										<li><a href="#" class="button big">Big</a></li>
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions fit">
										<li><a href="#" class="button fit">Fit</a></li>
										<li><a href="#" class="button fit">Fit</a></li>
										<li><a href="#" class="button fit">Fit</a></li>
									</ul>
									<ul class="actions fit small">
										<li><a href="#" class="button fit small">Fit + Small</a></li>
										<li><a href="#" class="button fit small">Fit + Small</a></li>
										<li><a href="#" class="button fit small">Fit + Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button icon fa-download">Icon</a></li>
										<li><a href="#" class="button icon fa-upload">Icon</a></li>
										<li><a href="#" class="button icon fa-save">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button disabled">Disabled</span></li>
										<li><span class="button disabled icon fa-download">Disabled</span></li>
									</ul>
								</section>

								<section>
									<h3>Form</h3>
									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
											</div>
											<div class="12u$">
												<div class="select-wrapper">
													<select name="demo-category" id="demo-category">
														<option value="">- Category -</option>
														<option value="1">Manufacturing</option>
														<option value="1">Shipping</option>
														<option value="1">Administration</option>
														<option value="1">Human Resources</option>
													</select>
												</div>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-low" name="demo-priority" checked>
												<label for="demo-priority-low">Low</label>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-normal" name="demo-priority">
												<label for="demo-priority-normal">Normal</label>
											</div>
											<div class="4u$ 12u$(small)">
												<input type="radio" id="demo-priority-high" name="demo-priority">
												<label for="demo-priority-high">High</label>
											</div>
											<div class="6u 12u$(small)">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="6u$ 12u$(small)">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="12u$">
												<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>

								<section>
									<h3>Image</h3>
									<h4>Fit</h4>
									<div class="box alt">
										<div class="row uniform">
											<div class="12u$"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
										</div>
									</div>
									<h4>Left &amp; Right</h4>
									<p><span class="image left"><img src="images/pic07.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
									<p><span class="image right"><img src="images/pic04.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
								</section>

							</article>
						-->

						<!-- Pagination -->
							<ul class="actions pagination">
								<li><a href="" class="disabled button big previous">Previous Page</a></li>
								<li><a href="#" class="button big next">Next Page</a></li>
							</ul>

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
								<header>
									<h2>Future Imperfect</h2>
									<p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Vitae sed condimentum</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Rutrum neque accumsan</a></h3>
												<time class="published" datetime="2015-10-19">October 19, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Odio congue mattis</a></h3>
												<time class="published" datetime="2015-10-18">October 18, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Enim nisl veroeros</a></h3>
												<time class="published" datetime="2015-10-17">October 17, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
										</article>

								</div>
							</section>

						<!-- Posts List -->
							<section>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
												<time class="published" datetime="2015-10-15">October 15, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
												<time class="published" datetime="2015-10-10">October 10, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
												<time class="published" datetime="2015-10-08">October 8, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic11.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
												<time class="published" datetime="2015-10-06">October 7, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic12.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>About</h2>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
								<ul class="actions">
									<li><a href="#" class="button">Learn More</a></li>
								</ul>
							</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">&copy; Untitled. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>.</p>
							</section>

					</section>

			</div>

		<!-- Scripts -->
			<!-- <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script> -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<!-- <script src="assets/js/main.js"></script> -->
	<script type="text/javascript" src="/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/static/js/skel.min.js"></script>
	<script type="text/javascript" src="/static/js/util.js"></script>
	<script type="text/javascript" src="/static/js/main.js"></script>

	</body>
</html>