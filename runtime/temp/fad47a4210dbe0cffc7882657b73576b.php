<?php if (!defined('THINK_PATH')) exit(); /*a:11:{s:78:"D:\IT_study\recordthing\public/../application/index\view\user\index\index.html";i:1526637065;s:65:"D:\IT_study\recordthing\application\index\view\common\header.html";i:1526636288;s:68:"D:\IT_study\recordthing\application\index\view\user\index\reply.html";i:1526606083;s:73:"D:\IT_study\recordthing\application\index\view\user\index\tabContent.html";i:1526636343;s:72:"D:\IT_study\recordthing\application\index\view\user\index\myRecords.html";i:1526637002;s:72:"D:\IT_study\recordthing\application\index\view\user\index\addRecord.html";i:1526545158;s:76:"D:\IT_study\recordthing\application\index\view\user\index\friendRecords.html";i:1526626669;s:73:"D:\IT_study\recordthing\application\index\view\user\index\friendList.html";i:1526544993;s:72:"D:\IT_study\recordthing\application\index\view\user\index\addFriend.html";i:1526545226;s:69:"D:\IT_study\recordthing\application\index\view\user\index\logout.html";i:1526545292;s:65:"D:\IT_study\recordthing\application\index\view\common\script.html";i:1526628172;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
  <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/main.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/index.css" />

	<!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

 	<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->


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

	<style>
		.my_records{
			overflow: auto;
		}
	</style>
	</head>
<body>
<header>
<!-- 	<div class="h3 col-lg-12 bg-info">Leoc——记事共享</div>
	<h4><?php echo $check; ?></h4>	 -->
</header>
<header id="header">
	<h1><a href="#">LEOC</a></h1>
	<nav>

	<div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#my_records" aria-controls="my_records" role="tab" data-toggle="tab">我的说说</a></li>
		    <li role="presentation"><a href="#add_record" aria-controls="add_record" role="tab" data-toggle="tab">添加说说</a></li>
		    <li role="presentation"><a href="#friends_records" aria-controls="friends_records" role="tab" data-toggle="tab">好友说说</a></li>
		    <li role="presentation"><a href="#friends_list" aria-controls="friends_list" role="tab" data-toggle="tab">好友列表</a></li>
		    <li role="presentation"><a href="#add_friend" aria-controls="add_friend" role="tab" data-toggle="tab">添加好友</a></li>
		    <li role="presentation"><a href="#logout" aria-controls="logout" role="tab" data-toggle="tab">注销登录</a></li>
		</ul>
	
	</div>


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



<div class="col-lg-8 col-lg-offset-2">
<div class="tab-content">
		
 <div  role="tabpanel" class="my_records tab-pane fade in active" id="my_records">

		<button class="button small" onclick="Control()">编辑</button>

			<?php if(is_array($recordList) || $recordList instanceof \think\Collection || $recordList instanceof \think\Paginator): $i = 0; $__LIST__ = $recordList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record_item): $mod = ($i % 2 );++$i;?>
			<!-- <div class="panel panel-default"> -->
			<div class="post">
				 <div class="control pull-right">
				    <a class="button small" href="<?php echo \think\Config::get('INDEX'); ?>/user_r_delete?user_id=<?php echo $record_item['user_id']; ?>&id=<?php echo $record_item['id']; ?>" >删除</a>
					<button type="button" class="button small" onclick="Load(<?php echo $record_item['id']; ?>)" data-toggle="modal" data-target="#update_record">编辑</button>
				  </div>
				  <div class="title">
					<h2><?php echo $record_item['author']; ?></h2>
					<p><?php echo $record_item['content']; ?></p>
				  </div>
				  <div class="meta">
					<span class="author name">来自Vivo X21</span>
				  </div>
				  <footer>
				<!-- 	<ul class="actions">
						<li><a href="#" class="button big">Continue Reading</a></li>
					</ul> -->
					<ul class="stats">
						<li><a href="#">发表于：<?php echo $record_item['create_time']; ?></a></li>
						<li><a href="#" class="icon fa-heart"><?php echo $record_item['hits']; ?></a></li>
						<li onclick="showComment()"><a href="javascript:(void);" class="icon fa-comment">评论</a></li>
					</ul>
					</footer>
				  <div class="comment">
						<form method="post" action='<?php echo \think\Config::get('INDEX'); ?>/user_c_add' class="form-group">
					  	<input type="text" name='content' class="form-control" placeholder="评论">
					  	<input type="hidden" name="record_id"  value="<?php echo $record_item['id']; ?>">
					  	<button class="button small" type="submit" value="提交">提交</button>
							<?php if(is_array($record_item['comments']) || $record_item['comments'] instanceof \think\Collection || $record_item['comments'] instanceof \think\Paginator): $i = 0; $__LIST__ = $record_item['comments'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_item): $mod = ($i % 2 );++$i;
								$arr1 =array();
								$test($c_item,$arr1);
								$arr1[0]['parent']=1;
							 if(is_array($arr1) || $arr1 instanceof \think\Collection || $arr1 instanceof \think\Paginator): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_item): $mod = ($i % 2 );++$i;?>
								<div class="row">
									<li class="com_item " id="c_<?php echo $c_item['id']; ?>">
									<?php if(empty($child_item['last_comment_author'])): ?>

										<span class="h5" onmouseover="pushData(<?php echo $child_item['record_id']; ?>,<?php echo $child_item['id']; ?>,<?php echo $child_item['comment_author_id']; ?>)" data-toggle="modal" data-target="#reply_comment"><?php echo $child_item['name']; ?> : <?php echo $child_item['content']; ?></span>

									<?php else: ?>

										<span class="h5" onmouseover="pushData(<?php echo $child_item['record_id']; ?>,<?php echo $child_item['id']; ?>,<?php echo $child_item['comment_author_id']; ?>)" data-toggle="modal" data-target="#reply_comment"><?php echo $child_item['name']; ?> 回复 <?php echo $child_item['last_comment_author']; ?> : <?php echo $child_item['content']; ?></span>

									<?php endif; ?>
									<div class="item_control">
									<button type="button" class="button small" onclick="myCommentDel(<?php echo $c_item['id']; ?>,<?php echo $c_item['record_author_id']; ?>)">删除</button>
									<button type="button" class="button small"  onmouseover="pushData(<?php echo $child_item['record_id']; ?>,<?php echo $child_item['id']; ?>,<?php echo $child_item['comment_author_id']; ?>)" data-toggle="modal" data-target="#reply_comment">回复</button>
									</div>
									</li>
								</div>
								<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
						</form>
			 	  </div>
			  </div>
			 	 <?php endforeach; endif; else: echo "" ;endif; ?>
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
	 
		 <div role="tabpanel" class="tab-pane fade " id="friends_records">
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
</div>
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

<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/skel.min.js"></script>
<script type="text/javascript" src="/static/js/util.js"></script>
<script type="text/javascript" src="/static/js/main.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/js/index.js"></script>


</body>
</html>	

