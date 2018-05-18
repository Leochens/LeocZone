<?php if (!defined('THINK_PATH')) exit(); /*a:9:{s:78:"D:\IT_study\recordthing\public/../application/index\view\user\index\index.html";i:1526606671;s:65:"D:\IT_study\recordthing\application\index\view\common\header.html";i:1526200105;s:68:"D:\IT_study\recordthing\application\index\view\user\index\reply.html";i:1526606083;s:72:"D:\IT_study\recordthing\application\index\view\user\index\myRecords.html";i:1526604322;s:72:"D:\IT_study\recordthing\application\index\view\user\index\addRecord.html";i:1526545158;s:76:"D:\IT_study\recordthing\application\index\view\user\index\friendRecords.html";i:1526545046;s:73:"D:\IT_study\recordthing\application\index\view\user\index\friendList.html";i:1526544993;s:72:"D:\IT_study\recordthing\application\index\view\user\index\addFriend.html";i:1526545226;s:69:"D:\IT_study\recordthing\application\index\view\user\index\logout.html";i:1526545292;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>


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

	<style>
		ul,li{
			list-style: none;
			margin: 0;
			padding: 0;
		}
		.control{
			visibility: hidden;
		}
	</style>
	</head>
<body>
<header>
	<div class="h3 col-lg-12 bg-info">Leoc——记事共享</div>
	<h4><?php echo $check; ?></h4>
	<button class="btn btn-success" onclick="Control()">编辑</button>
	
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

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#my_records" aria-controls="home" role="tab" data-toggle="tab">我的说说</a></li>
    <li role="presentation"><a href="#add_record" aria-controls="add_record" role="tab" data-toggle="tab">添加说说</a></li>
    <li role="presentation"><a href="#friends_records" aria-controls="friends_records" role="tab" data-toggle="tab">好友说说</a></li>
    <li role="presentation"><a href="#friends_list" aria-controls="friends_list" role="tab" data-toggle="tab">好友列表</a></li>
    <li role="presentation"><a href="#add_friend" aria-controls="add_friend" role="tab" data-toggle="tab">添加好友</a></li>
    <li role="presentation"><a href="#logout" aria-controls="logout" role="tab" data-toggle="tab">注销登录</a></li>
  </ul>
 <!-- Tab panes -->
	<div class="tab-content">
		 <div role="tabpanel" class="tab-pane fade in active" id="my_records">
	  	<br>
	  	<br>

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
						$test($c_item,$arr1);
						$arr1[0]['parent']=1;
						// echo "<pre>";
						// print_r($arr1);
						// echo "</pre>";
						//$child_comment_list=$test($c_item);
						
					 if(is_array($arr1) || $arr1 instanceof \think\Collection || $arr1 instanceof \think\Paginator): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_item): $mod = ($i % 2 );++$i;?>
							<li id="c_<?php echo $c_item['id']; ?>">
							<?php if(empty($child_item['last_comment_author'])): ?>

								<?php echo $child_item['name']; ?>:<?php echo $child_item['content']; else: ?>

								<?php echo $child_item['name']; ?>回复<?php echo $child_item['last_comment_author']; ?>:<?php echo $child_item['content']; endif; ?>
							<button class="btn btn-danger btn-sm" onclick="myCommentDel(<?php echo $c_item['id']; ?>,<?php echo $c_item['comment_author_id']; ?>);return false;">删除</button>
							
							<button type="button" class="btn btn-info btn-sm"  onmouseover="pushData(<?php echo $child_item['record_id']; ?>,<?php echo $child_item['id']; ?>,<?php echo $child_item['comment_author_id']; ?>)" data-toggle="modal" data-target="#reply_comment">回复</button>
							</li>
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
						<?php if(is_array($item['comments']) || $item['comments'] instanceof \think\Collection || $item['comments'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['comments'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_item): $mod = ($i % 2 );++$i;?>
						<li><?php echo $c_item['name']; ?>:<?php echo $c_item['content']; ?></li>
							<?php if(is_array($c_item['comment_children']) || $c_item['comment_children'] instanceof \think\Collection || $c_item['comment_children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $c_item['comment_children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child_item): $mod = ($i % 2 );++$i;?>
								<li style="padding-left:40px ;"><?php echo $child_item['name']; ?>回复<?php echo $c_item['name']; ?>:<?php echo $child_item['content']; ?></li>
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

<script>
	
	var dataTmp ;
	//暂存数据
	
	function pushData(record_id='',comment_id='',comment_author_id='')
	{
		//TODO：全局变量
		dataTmp=[];
		dataTmp['record_id']=record_id;
		dataTmp['comment_id']=comment_id;
		dataTmp['comment_author_id']=comment_author_id;
		$('#test').html(dataTmp['comment_id']);
		return false;
	}
	// function testData()
	// {
	// 	$('#tda').html(data['comment_id']);
	// }
	function Load(record_id)
	{
		console.log(record_id);

		$.ajax({
			url: '/index.php/index/record.Record/getSingleRecord',
			type: 'GET',
			//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {id:record_id },

		})
		.done(function(data) {
			console.log("success");
			console.log(data);
			$('#old_record').val(data.content);
			$('#old_record_id').val(data.id);
			$('#user_id').val(data.user_id);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	function Control(){
		console.log('hello');
		flag=$(".control").css("visibility");
		if(flag=="hidden")
			$(".control").css("visibility","visible");
		else
			$(".control").css("visibility","hidden");
	}
	function myCommentDel(record_id,comment_author_id)
	{
		console.log('删除评论：'+record_id);
		$.ajax({
			url: '/index.php/user_c_del',
			type: 'GET',
			//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {record_id:id,comment_author_id:comment_author_id},

		})
		.done(function(data) {
			console.log("del comment:success");
			console.log('已删除 返回值： '+data);
			//删除Dom节点
			$('#c_'+id).remove();
		})
		.fail(function() {
			console.log("del comment:error");
		})
		.always(function() {
			console.log("del comment:complete");
		});
	}
	function reply() {
		rep_content = $('#reply_content').val()
		// if(data.length==0)
		// {
		// 	alert('暂存数据为空');
		// 	return 0;
		// }
		console.log(typeof rep_content);
		dataTmp['rep_content']=rep_content;
		console.log(dataTmp);
		console.log(rep_content);
		$.ajax({
			url: '/index.php/user_c_reply',
			type: 'POST',
			//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {
				//从全局暂存数据得到
				'record_id':dataTmp['record_id'],
				'comment_author_id':dataTmp['comment_author_id'],
				'parent_id':dataTmp['comment_id'],
				'rep_content':dataTmp['rep_content'],
			}

		})
		.done(function(data) {
			console.log("reply comment:success");
			console.log(data);
			//删除Dom节点
			//$('#c_'+id).remove();
		})
		.fail(function() {
			console.log("reply comment:error");
		})
		.always(function() {
			console.log("reply comment:complete");
		});
		return false;
	}
</script>	
</body>
</html>	