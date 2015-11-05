<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    .signin-page{
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
    }
    .title a:link,a:active,a:visited{
      text-decoration: none;
      color: #777;
    }
    .title a:hover{
      text-decoration: none;
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
  <?php if(!empty(validation_errors())): ?>
    <div class="alert alert-warning alert-dismissible error text-center" >
      <button type="button" class="close" data-dismiss="alert" ><span >&times;</span></button>
      <?php echo validation_errors(); ?>
    </div>
  <?php endif; ?>

    <div class="signin-page">
    	<div class="logo text-center">
       share 
      </div>
    	<h4 class="title text-center">
        <span>
          <a href="##" style="color:#000" >登录</a>
          <b class="text-muted">·</b>
          <a class="text-muted" href="##">注册</a>
        </span>
      </h4>

    	<div class="sign-container">
        <!--登录-->
        <?php
          echo $b = set_value('signin-username');
          echo form_open('sign/signin','id="signin"');
        ?>
          <div class="form-group">
            <label class="control-label sr-only" for="singin-username">用户名</label>
            <div class="input-group">
              <span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
              <input type="input" class="form-control input-lg" name="signin-username"id="signin-username"
               autofocus="autofocus"  placeholder="用户名">
            </div>
          </div>
          <div class="form-group" >
            <label class="control-lable sr-only" for="signup-password">密码</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" class="form-control input-lg" name="signin-password"id="signup-password"
               autofocus="autofocus"  placeholder="密码">
            </div>
          </div>
          <div class="checkbox">
          <label>
            <input type="checkbox" checked="checked">
            记住密码
          </label>
          </div>
        <input type="submit" id="signin-btn" class="btn btn-success btn-lg btn-block" style="margin-top:30px;"value="登录">
        </form>
        
      </div>
    	<div class="sign-sns"></div>
    </div>
  </div>

    <script src="/jquery/jquery-1.11.3.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>