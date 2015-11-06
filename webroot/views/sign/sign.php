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
      padding-top: 125px;
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
      padding-bottom: 50px;     
    }
    .error{
      width:700px;
      margin:0 auto;
    }
    </style>
  </head>
  <body>
  <div class="container">
    <div id="error_msg" class="alert alert-warning alert-dismissible error text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" ><span >&times;</span></button>
    </div>

    <div class="sign-page">
    	<div class="logo text-center">
       share 
      </div>
    	<h4 class="title text-center">
        <span>
          <a href="##" id="link-signin" style="color:#000;">登录</a>
          <b class="text-muted">·</b>
          <a href="##" id="link-signup" class="text-muted" href="##">注册</a>
        </span>
      </h4>

    	<div class="sign-container">
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
          <div class="checkbox">
          <label>
            <input type="checkbox" checked="checked">
            记住密码
          </label>
          </div>
        <input type="submit" name="signin" id="signin-btn" class="btn btn-success btn-lg btn-block" style="margin-top:30px;" value="登录">
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
          <input type="submit" class="btn btn-success btn-lg btn-block text-center" id="btn-signup" value="注册">
        </form> 
      </div>
    	<div class="sign-sns"></div>
    </div>
  </div>

    <script src="/jquery/jquery-1.11.3.min.js"></script>
    <script src="/jquery/jquery.form.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      $("#link-signin").on('click',function(){
        $(this).css('color','#000');
        $('#link-signup').css('color',"#777");
        $('#signin').show();
        $('#signup').hide();
      });
      $("#link-signup").on('click',function(){
        $(this).css('color','#000');
        $('#link-signin').css('color',"#777");
        $('#signup').show();
        $('#signin').hide();
      });
      // jquery.form.js插件发送登录请求
      $("#signin").ajaxForm({
        type:'post',
        dataType:'json',
        success:function(result){
          if (result.num > 0)
            {
              $("#error_msg").hide();
              alert('success');
            }
            else
            {
              $("#error_msg p").remove();
              $('#error_msg').append("<p>"+result.msg+"</p>").show();
            }
        }
      });
      // jquery.form.js插件发送注册请求
      $('#signup').ajaxForm({
        type:'post',
        dataType:'json',
        success:function(result){
          if (result.num > 0)
           {
              $("#error_msg").hide();
              alert('success');
           }
          else
          {
              $("#error_msg p").remove();
              $('#error_msg').append("<p>"+result.msg+"</p>").show();
          }
        }
      });
    });
    </script>
  </body>
</html>