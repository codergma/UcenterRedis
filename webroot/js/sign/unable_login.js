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
		'<div class="unable-login" style="display:none">'+
			'<h1>无法登录</h1>'+
			'<h2>我们通过两种方式帮你重新登录</h2>'+
			'<button class="blue-button reset-passwd">找回密码</button>'+
			'<button class="blue-button sms-login">使用手机验证码登录</button>'+
		'</div>'+
		'<div class="unable-login"  id="reset-by-email" >'+
			'<h1>找回密码</h1>'+
			'<h2>请填写您的注册邮箱</h2>'+
			'<div class="input-wrap" >'+
			'<input type="text" name="account" placeholder="请填写邮箱" id="email-for-reset"></button>'+
			'<label id="email-error" style="color:#c33;position:absolut;top:0;right:0;display:hidden;"></label>'+
			'</div>'+
			'<button class="blue-button send-email" >发送邮件</button>'+
		'</div>'+
	'</div>';
	$('body').append(html);

	// $('#email-for-reset').bind('blur',function(event){
	// 	if ($(this).val() == '')
	// 	{
	// 		$('#email-error').html("请填写注册邮箱");
	// 		$('#email-error').show();
	// 		return;
	// 	};
	//     var pattern = /^([0-9A-Za-z]+)([0-9a-zA-Z_-]*)@([0-9A-Za-z]+).([A-Za-z]+)$/;
	//     if (!pattern.test($(this).val()))
 //    	{
	// 		$('#email-error').html("邮箱地址不合法");
	// 		$('#email-error').show();
	// 		return;
 //    	};
 //    	$('#email-for-reset').attr('disabled','false');

	// });
	$('.send-email').bind('click',function(){
		var data = {"email":$('#email-for-reset').val()};
		var url = "/sign/modify_password";
		$.ajax({
			url:url,
			data:data,
			type:'post',
			dataType:'json',
			success:function(result){

			}
		});

	});

});
