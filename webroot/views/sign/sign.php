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
      color: #b1b1b1;
      padding: 0 5px;
    }
    .title a:link,a:hover,a:active,a:visited{
      text-decoration: none;
    }
    .title b{
      padding: 0 5px;
    }
    </style>
  </head>
  <body>
  <div class="container">
    <div class="signin-page">
    	<div class="logo text-center">
       share 
      </div>
    	<h4 class="title text-center">
        <span>
          <a  href="##">登录</a>
          <b class="text-muted">·</b>
          <a href="##">注册</a>
        </span>
      </h4>
    	<div class="sign-container"></div>
    	<div class="sign-sns"></div>
    </div>
  </div>

    <script src="/jquery/jquery-1.11.3.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>