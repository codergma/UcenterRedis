<!DOCTYPE html>
<html>
<head>
<title>首页</title>
<meta charset='utf-8'>
<style >
*{
    margin:0;
    padding:0;
}
body{
    font-family: "Arial"
}
.top{
    height:1000px;
    background-color: #0078d8;
    /*margin-bottom: 20px;*/
}
/*.bottom{
    height: 500px;
    background-color: #c52f24;
}*/
.inner-wrapper{
    width: 740px;
    margin: 0 auto ;
    overflow: hidden;
}
.inner-logo{
   float: left;
   width: 440px; 
   padding-top: 160px;
   font-size: 100px;
   color: #FFF;

}
.inner-sign{
   float: left;
   width: 220px; 
   color: #FFF;
   padding-top:20px;
}
#top-signup{
    float: left;
}
#top-signin{
    float: right;
}
#top-signup:hover,#top-signin:hover{
    cursor: pointer;
}
.input-wrapper {
    height: 17px;
    width:200px;
    padding:8px 10px;
    border-radius: 5px;
    border:1px solid #FFF;
    margin-top: 15px;
    font-size: 15px;
}
.signup-btn{
    height: 33px;
    width:220px;
    border-radius:5px;
    margin-top: 15px;
    font-size: 15px;
    text-align: center;
    line-height: 33px;
    color: #FFF;
}
.disable{
    border:1px solid #aaa;
    background-color: #aaa;
}
.enable{
    background-color: #80c3f7;
    border:1px solid #80c3f7;
}
.enable:hover{
    cursor: pointer;
}
.error-tip{
    font-size: 12px;
    padding-left: 10px;
    padding-top: 5px;
    width: 220px;
}
a{
    text-decoration: none;
    color:#FFF;
    font-size: 13px;
}
.modify-password{
    margin-top:10px;
    margin-left: 150px;
}

</style>
</head>
<body>
<div class="top">
    <div class="inner-wrapper" >
        <div class="inner-logo"> share </div>
        <div class="inner-sign">
            <div id="top-signup">注册</div>
            <div id="top-signin">登陆</div>
            <div style="clear:both;"></div>
            <div id="signup" class="signup-wrapper" style="display:none;">
                <input class="input-wrapper" required type="text" name="username"  placeholder="用户名"/>
                <div id="username-error" class="error-tip" style="display:none">！姓名要在6-32个字符之间</div>
                <input class="input-wrapper" required type="text" name="email"     placeholder="邮箱"/>
                <div id="email-error" class="error-tip" style="display:none">！邮箱格式不正确</div>
                <input class="input-wrapper" required type="password" name="password"  placeholder="密码(不少于6位)">
                <div id="password-error" class="error-tip" style="display:none">！至少包含字母和数字，6-16个字符</div>
                <input class="input-wrapper" required type="password" name="password2" placeholder="再次输入密码"/>
                <div id="username-error" class="error-tip" style="display:none">！两次输入密码不一致</div>
                <button id="btn-signup" class="signup-btn disable" type="submit" disabled="true" >注册 share</button>
            </div>
            <div id="signin" class="signin-wrapper">
                <input class="input-wrapper" required type="text" name="login-username"  placeholder="用户名"/>
                <div id="login-username-error" class="error-tip" style="display:none">用户名不能为空</div>
                <input class="input-wrapper" required type="password" name="login-password"  placeholder="密码">
                <div id="login-password-error" class="error-tip" style="display:none">密码不能为空</div>
                <button id="btn-signin" class="signup-btn enable" type="submit" >登&nbsp&nbsp录</button>
            </div>
            <p class='modify-password'><a href="">无法登录？</a></p>
        </div>
    </div>
</div>
<div style="clear:both;"></div>
<script src="/js/jq.js" ></script>
<script type="text/javascript">
   var Utils =  new Object();
   //用户名是否合法
   Utils.isName = function(name)
   {
    //6-32位数字，字母，下划线
    var regexp = /^[0-9A-Za-z_]{6,32}$/;
    return regexp.test(name);
   }
   //判断邮箱是否合法
   Utils.isEmail = function (email)
   {
    //直接常量法　发创建一个正则表达式对象
    var regexp = /^([0-9A-Za-z]+)([0-9a-zA-Z_-]*)@([0-9A-Za-z]+).([A-Za-z]+)$/;
    return regexp.test(email);
   }
   //密码是否合法
   Utils.isPasswd = function(passwd)
   {
    //6-16个字符，至少包含数字和字符
    var regexp = /[a-zA-Z]+/;
    var regexp2 = /[0-9]+/;
    var regexp3 = /[\s\S]{6,16}$/;
    // return "'"+regexp.test(passwd)+"','"+  regexp2.test(passwd)+"','" + regexp3.test(passwd)+"'";
    return regexp.test(passwd)&&regexp2.test(passwd)&&regexp3.test(passwd);
   }

</script>
<script type="text/javascript">
$(document).ready(function()
{   
    //绑定顶部注册｜登陆按钮
    $('#top-signup').bind('click',function(event){
       $('#signin').hide(); 
       $('#signup').show();
    });
    $('#top-signin').bind('click',function(event){
       $('#signup').hide();
       $('#signin').show(); 
    });
    var isName = false;
    var isEmail = false;
    var isPasswd = false;
    var isPasswd2 =false;
    //判断注册按钮是否可以点击
    function valid_btn()
    {
        if (isName&&isEmail&&isPasswd&&isPasswd2) 
        {
            $('#btn-signup').attr('disabled',false);
            $('#btn-signup').addClass('enable');
            $('#btn-signup').removeClass('disable');
        }else{
            $('#btn-signup').attr('disabled',true);
            $('#btn-signup').addClass('disable');
            $('#btn-signup').removeClass('enable');
        }
    }
    //绑定用户名验证
    $("input[name='username']").bind('blur', function(event){
       if(Utils.isName($(this).val()))
       {
           $(this).next().hide();
           isName = true;
       }else{
           $(this).next().show();
           isName = false;
       }
       valid_btn();
    });
    //绑定邮箱验证
    $("input[name='email']").bind('blur', function(event){
        if(Utils.isEmail($(this).val()))
        {
            $(this).next().hide();
            isEmail = true;
        }else{
            $(this).next().show();
            isEmail =false;
        }
        valid_btn();
    });
    //绑定第一次密码验证
    $("input[name='password']").bind('blur',function(){
        if(Utils.isPasswd($(this).val()))
        {
            $(this).next().hide();
            isPasswd = true;
        }else{
            $(this).next().show();
            isPasswd = false;
        }
        valid_btn();
    });

    //绑定重复输入密码验证
    $("input[name='password2']").bind('blur',function(){
        var password = $("input[name='password']").val(); 
        var password2 = $(this).val(); 
        if (password2 == password)
        {
            $(this).next().hide();
            isPasswd2 = true;
        }else{
            $(this).next().show();
            isPasswd2 = false;
        }
        valid_btn();
    });
    //绑定注册按钮
    $('#btn-signup').bind('click',function(){
        var url = '/Sign/signup';
        var username = $("input[name='username']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var password2 = $("input[name='password2']").val();
        var data = {
            'username':username,
            'email':email,
            'password':password,
            'password2':password2
        };
        
        $.ajax({
            url:url,
            type:'post',
            data:data,
            dataType:'json',
            success:function(result){
                if (true == result.num) 
                {
                    alert('注册成功');
                };
            }
        });
    });
    //绑定用户名输入框
    $("input[name='login-username']").bind('blur',function(){
        if($(this).val().length == 0)
        {
            $(this).next().show();
        }
        else
        {
            $(this).next().hide();
        }

    });
    //绑定密码输入框
    $("input[name='login-password']").bind('blur',function(){
        if($(this).val().length == 0)
        {
            $(this).next().show();
        }
        else
        {
            $(this).next().hide();
        }
    });
    //绑定登录按钮
    $('#btn-signin').bind('click',function(){
       var login_username = $("input[name='login-username']").val(); 
       var login_passwd   = $("input[name='login-password']").val();

       if (login_username.length == 0 || login_passwd.length == 0)
        return;

        var url = "/Sign/signin";
        var data = {
            "login_username":login_username,
            "login_passwd":login_passwd
        }
        $.ajax({
            url:url,
            type:'post',
            data:data,
            dataType:'json',
            success:function(result){
                if (true == result.num)
                {
                    window.location.href = "/portal/index";
                }else{
                    alert(result.msg);
                };
            }
        });

    });


    $('.modify-password').bind('click',function(){
        var url = '/sign/modify_password'
        $.ajax({
            url:url,
            type:'post',
            dataType:'json'
        });
    });


});
</script>
</body>
</html>
