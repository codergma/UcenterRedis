<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>修改密码</title>
<style type="text/css">
*{
	font-family: Microsoft YaHei,sans-serif;
}
body{
	background-color: #fff;
}
.container{
	width: 500px;
	margin: 0 auto;
	padding: 10px;
	margin-top: 75px;
	padding: 0px  30px 55px 30px;
	border: 1px solid #cbcbcb;
	background-color:#fff;	
	box-shadow:0 0 15px 0 rgba(0,0,0,.3);

}	
.container input{
	width:300px;
    border: 1px solid #3A85C6;
	padding:5px;
	margin:5px 0;
	height: 25px;
	width: 470px; 
	border-radius: 3px;
}
.container button{
	width: 70px;
	height: 30px;
	border-radius: 3px;
	background-color: #52b678;
	border:1px solid  #52b678;
	color: #FFF;
	outline: none;
}
.container button:hover{
	cursor: pointer;
	background-color: #64c886;
	border:1px solid  #64c886;
}
.error-wrap{
	margin-top: 20px;
	margin-bottom: 10px;
	height: 30px;
	line-height: 30px;
}
#error-msg{
	background-color: #fcf8ec;	
	text-align: center;
	display: none;
}
#reset{
	display: block;	
	margin: 0 auto;
	margin-top:25px;
}

</style>
</head>

<body>
<div class="container">
	<div class="error-wrap">
		<div id="error-msg" ></div>
	</div>
	<label>请输入新密码:</label><br/>
	<input type="password" id="first-password" placeholder='password'><br/>
	<label>请再次输入密码:</label><br/>
	<input type='password' id="second-password" placeholder='password'><br/>
	<button type="button" id="reset">确认</button><br/>
</div>
<script type="text/javascript" src="/js/jq.js"></script>
<script type="text/javascript">
	//确认修改
	$('#reset').bind('click',function(event){
		passwd = $('#first-password').val();
		passwd2 = $('#second-password').val();
		if (passwd=='' || passwd2=='')
		{
			$('#error-msg').html('密码不能为空!').show();
			return ;
		};
		if (passwd != passwd2)
		{
			$('#error-msg').html('两次密码输入不一致，请重新输入!').show();
			return ;
		};
		if (check_password(passwd) && check_password(passwd2))
		{
            var query_str = "<?php echo substr($_SERVER['REQUEST_URI'],-32);?>";
			var url = '/Sign/reset_passwd/'+query_str;
			var data = {"password":passwd};
			$.ajax({
				url:url,
				data:data,
				type:'post',
				dataType:'json',
				success:function(result){
					if (result.num = 1)
					{
						count_time = 5;
						clear_interval = window.setInterval(ramain_time,1000);
					}
					else
					{
						$("#error-msg").html('修改失败！').show();
					}
				}
			});
		}
		else
		{
			$('#error-msg').html('密码必须包含数字和字符，6-16位').show();
			return;
		}
	});
	//input
	$('input').bind('focus',function(){
		$('#error-msg').hide();
	});
	//检查密码是否符合要求
	function check_password(passwd)
	{
	    var regexp = /[a-zA-Z]+/;
	    var regexp2 = /[0-9]+/;
	    var regexp3 = /[\s\S]{6,16}$/;
	    return regexp.test(passwd)&&regexp2.test(passwd)&&regexp3.test(passwd);
	}
	//密码修改成功 
	function ramain_time()
	{
		if (count_time > 0)
		{
			var msg = '修改成功 '+count_time+' 秒后跳转到首页';
			$("#error-msg").html(msg).show();
			count_time--;
		}
		else
		{
			window.clearInterval(clear_interval);
			window.location.href = '/sign/index'
		}
	}

</script>
</body>

</html>
