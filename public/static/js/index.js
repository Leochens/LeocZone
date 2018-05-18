/*
* @Author: Administrator
* @Date:   2018-05-18 13:41:58
* @Last Modified by:   Administrator
* @Last Modified time: 2018-05-18 13:41:59
*/
	
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
	function myCommentDel(record_id,record_author_id)
	{
		console.log('删除评论：'+record_id);
		$.ajax({
			url: '/index.php/user_c_del',
			type: 'GET',
			//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {record_id:record_id,
				//comment_author_id:comment_author_id,
				record_author_id:record_author_id
			},
		})
		.done(function(data) {
			console.log("del comment:success");
			//console.log(data);
			//删除Dom节点
			if(data==-2)
			{
				alert('你对这条说说没有控制权，不能随意删除它的评论！');
				return 0;
			}
			$('#c_'+record_id).remove();
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
				//'comment_author_id':dataTmp['comment_author_id'],
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