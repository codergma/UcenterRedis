<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    .sign-page{
      padding-top: 100px;
      padding-bottom: 50px;
      width: 940px;
      margin: 0 auto;
    }
    .logo{
      font-size: 150px;
      color: pink;
    }
    .title{
      margin: 70px 0 50px;
      border-bottom: solid 1px #eeeeee;
    }
    .title span{
      position: relative;
      top:10px;
      background-color: rgba(255,255,255,1);
    }
    .title a{
      padding: 0 15px;
      font-weight:bold;
      text-decoration: none;
      color:#777;
    }

    .title a:hover{
      color: #000;
    }
    .title b{
      padding: 0 5px;
    }
    .sign-container{
      padding: 0 320px;
      padding-bottom: 20px;     
    }
    .error{
      width:700px;
      margin:0 auto;
    }
    #forget-password{
      padding-left:150px;
      color: #333;
      text-decoration:none;
    }
    #error-msg{
      margin-top: 50px;
      width:300px;
    }
    #signin-gen-cap,#signup-gen-cap{
      margin-left:180px;
    }
    #btn-signup{
      margin-top: 10px;
    }
    </style>
  </head>
  <body>
  <div class="container">
    <div class="sign-page">
    	<div class="logo text-center">
       share 
      </div>
    	<h4 class="title text-center">
        <span>
          <a href="javascript:void(0);" id="link-signin" style="color:#000;">登录</a>
          <b class="text-muted">·</b>
          <a href="javascript:void(0);" id="link-signup" class="text-muted" href="##">注册</a>
        </span>
      </h4>
    
    	<div class="sign-container">
        <div id="error-msg" class="alert alert-warning alert-dismissible error text-center" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" ><span >&times;</span></button>
        </div>
        <!--登录-->
        <?php
          echo form_open('sign/signin',"id='signin'");
        ?>
          <div class="form-group">
            <label class="control-label sr-only" for="singin-username">用户名</label>
            <div class="input-group">
              <span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
              <input type="input" class="form-control input-lg" name="signin-username"id="signin-username"
               required="required"autofocus="autofocus"  placeholder="用户名" value="<?php echo set_value('signin-username');?>">
            </div>
          </div>
          <div class="form-group" >
            <label class="control-lable sr-only" for="signin-password">密码</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" class="form-control input-lg" name="signin-password"id="signup-password"
               required="required"autofocus="autofocus"  placeholder="密码" value="<?php echo set_value('signin-password'); ?>">
            </div>
          </div>
          <div style="max-width:150px;position:relative;">
              <input type="text" class="form-control input-lg" name="signin-captcha"id="signin-captcha"
               required="required"placeholder="验证码" >
              <div id='signin-cap-container'style="position:absolute; top:3px;left:160px;width:140px;height:40px;">
                <?php echo $captcha['image'];?>
              </div>
          </div>
        <a id='signin-gen-cap'href="javaScript:void(0);">看不清楚？换一张</a>
        <input type="submit" name="signin" id="signin-btn" class="btn btn-success btn-lg btn-block" style="margin-top:30px;outline:none;" value="登录">
          <div class="checkbox" style="display:inline-block;">
            <label>
              <input type="checkbox" checked="checked" >
              记住密码
            </label>
          </div>
          <a id='forget-password'href='javaScript:void(0);'>忘记密码?</a>
        </form>
       <!--注册-->
        <?php
          echo form_open('sign/signup',"id='signup' style='display:none'");
        ?>
          <div class="form-group">
            <label class="control-label sr-only"for="signup-email">邮箱</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              <input type="input" name="signup-email" id="signup-email"class="form-control input-lg"
              autofocus="autofocus" required="required" placeholder="请输入邮箱">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label sr-only"for="signup-username">昵称</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="input" name="signup-username"id="signup-username"class="form-control input-lg" 
               required="required" placeholder="请输入昵称">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label sr-only"for="signup-password">密码</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password"name="signup-password"id="signup-password"class="form-control input-lg"
               required="required" placeholder="请输入密码">
            </div>
          </div>
          <div style="max-width:150px;position:relative;">
              <input type="text" class="form-control input-lg" name="signup-captcha"id="signup-captcha"
               required="required"placeholder="验证码" >
              <div id='signup-cap-container'style="position:absolute; top:3px;left:160px;width:140px;height:40px;">
              </div>
          </div>
        <a id='signup-gen-cap'href="javaScript:void(0);">看不清楚？换一张</a>
          <input type="submit" class="btn btn-success btn-lg btn-block text-center" id="btn-signup" value="注册">
        </form> 
      </div>
    	<div class="sign-sns"></div>
    </div>
  </div>
<!-- 忘记密码模态窗体 -->
<div class="modal fade bs-example-modal-sm" id='modal-forget-password'tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
         通过注册邮箱重置密码 
      </div>
      <div class="modal-body">
        <input id="reset-password-email"type="text" class='form-control' placeholder='请填写注册邮箱'>
      </div>
      <div class="modal-footer">
        <button id="btn-send-email"type="button" class="btn btn-success">发送邮件</button>
      </div>
    </div>
  </div>
</div>

    <script src="/jquery/jquery-1.11.3.min.js"></script>
    <script src="/jquery/jquery.form.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      //切换登录和注册页面
      $("#link-signin").on('click',function(){
        $(this).css('color','#000');
        $('#link-signup').css('color',"#777");
        $('#signin').show();
        $('#signup').hide();
        gen_captcha('#signin-cap-container');
      });
      $("#link-signup").on('click',function(){
        $(this).css('color','#000');
        $('#link-signin').css('color',"#777");
        $('#signup').show();
        $('#signin').hide();
        gen_captcha('#signup-cap-container');
      });
      // jquery.form.js插件发送登录请求
      $("#signin").ajaxForm({
        type:'post',
        dataType:'json',
        success:function(result){
          if ( result.status > 0)
            {
              $("#error-msg").hide();
              window.location.href = "<?php echo $this->config->base_url();?>"+"portal/index";
            }
            else
            {
              $("#error-msg p").remove();
              $('#error-msg').append("<p>"+result.msg+"</p>").show();
              gen_captcha('#signin-cap-container');
            }
        }
      });
      // jquery.form.js插件发送注册请求
      $('#signup').ajaxForm({
        type:'post',
        dataType:'json',
        success:function(result){
          if ( result.status > 0)
           {
              $("#error-msg").hide();
              alert('success');
           }
          else
          {
              $("#error-msg p").remove();
              $('#error-msg').append("<p>"+result.msg+"</p>").show();
              gen_captcha('#signup-cap-container');
          }
        }
      });
      //忘记密码
      $('#forget-password').on('click',function(){
        $('#modal-forget-password').modal();
      });
      //发送重置密码邮件
      $('#btn-send-email').on('click',function(){
        var url = "<?php echo base_url('sign/modify_password');?>";
        var data = {"email":$('#reset-password-email').val()};
        $.ajax({
          url:url,
          type:'post',
          data:data,
          dataType:'json',
          success:function(result){
          }
        });
      });
      //登录页面更换验证码图片
      $('#signin-gen-cap').on('click',function(){
        gen_captcha('#signin-cap-container');
      });
      //注册页面更换验证码图片
      $('#signup-gen-cap').on('click',function(){
        gen_captcha('#signup-cap-container');
      });

    });
  //获取验证码
  function gen_captcha(id)
  {
    var url = "<?php echo base_url('sign/gen_captcha');?>";
    $.ajax({
      "url":url,
      "type":'post',
      "dataType":'json',
      "success":function(result){
        if (result.status){
         var image = result.data.image; 
         $(id+" img").remove();
         $(id).append(image);
        };
      }
    });
  }
    </script>
  }
  </body>
</html>