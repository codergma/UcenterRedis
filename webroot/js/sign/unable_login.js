$(document).ready(function(){
var html = '<div class="unable-login" style="display:none;">'+
	'<h1>无法登录</h1>'+
	'<h2>我们通过两种方式帮你重新登录</h2>'+
	'<button class="blue-button reset-passwd">找回密码</button>'+
	'<button class="blue-button sms-login">使用手机验证码登录</button>'+
'</div>';
$('body').append(html);

function retrieve_passwd()
{
	alert('ab');
}

});