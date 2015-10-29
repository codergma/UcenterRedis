(function(){
	var cssPath =  ['/css/unable_login.css'];
	for(path in cssPath)
	{
		var link = document.createElement('link');
		link.style = 'text/css';
		link.rel = 'stylesheet';
		link.href =  cssPath[path];
		// document.getElementsByTagName('head')[0].appendChild(link);
		$('head').append(link);
	}

})();

function retrieve_passwd()
{
	$('.modal-wrap').show();
}


$(document).ready(function(){
	var html = 
	'<div class="modal-wrap" style="display:none;">'+
		'<div id="modal-first-page" class="modal-unable-login" >'+
			'<span class="modal-icon modal-close"></span>'+
			'<h1>无法登录</h1>'+
			'<h2>我们通过两种方式帮你重新登录</h2>'+
			'<button id="modal-retrieve-passwd" class="blue-button reset-passwd">找回密码</button>'+
			'<button class="blue-button sms-login">使用手机验证码登录</button>'+
		'</div>'+
		'<div id="modal-second-page" class="modal-unable-login"  style="display:none;" >'+
			'<span class="modal-icon modal-close"></span>'+
			'<span class="modal-icon modal-back"></span>'+
			'<h1>找回密码</h1>'+
			'<h2>请填写您的注册邮箱</h2>'+
			'<div class="input-wrap" style="position:relative;">'+
				'<input id="email-for-reset" type="text" name="account" placeholder="请填写邮箱" ></button>'+
				'<label id="modal-email-error" ></label>'+
			'</div>'+
			'<button class="blue-button send-email" >发送邮件</button>'+
		'</div>'+
	'</div>';
	$('body').append(html);

	//关闭
	for(val in $('.modal-close'))
	{
		$('.modal-close').eq(val).bind('click',function(){
			$('.modal-wrap').hide();
			$('#modal-first-page').show();
			$('#modal-second-page').hide();
		});
	}
	//后退
	$('.modal-back').bind('click',function(){
			$('#modal-first-page').show();
			$('#modal-second-page').hide();
	});
	
	//找回密码
	$('#modal-retrieve-passwd').bind('click',function(){
		$('#modal-first-page').hide();
		$('#modal-second-page').show();
	});
	//input
	$('#email-for-reset').bind('blur',function(event){
		if ($(this).val() == '')
		{
			$('#modal-email-error').html("请填写注册邮箱");
			$('#modal-email-error').show();
			return;
		};
	    var pattern = /^([0-9A-Za-z]+)([0-9a-zA-Z_-]*)@([0-9A-Za-z]+).([A-Za-z]+)$/;
	    if (!pattern.test($(this).val()))
    	{
			$('#modal-email-error').html("邮箱地址不合法");
			$('#modal-email-error').show();
			return;
    	};
    	$('#email-for-reset').attr('disabled','false');

	});
	//发送邮件
	$('.send-email').bind('click',function(){
		var data = {"email":$('#email-for-reset').val()};
		var url = "/sign/modify_password";
		$.ajax({
			url:url,
			data:data,
			type:'post',
			dataType:'json',
			success:function(result){
				if (result.num == 1)
				{
					$('#modal-email-error').html("邮件已发送");
					$('#modal-email-error').show();
				}
				else
				{
					$('#modal-email-error').html("邮件发送失败");
					$('#modal-email-error').show();
				}
			}
		});

	});

});
