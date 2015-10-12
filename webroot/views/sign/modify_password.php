<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>修改密码</title>
<style type="text/css">
*{
	font-family: Microsoft YaHei,sans serif;
}
body{
	background-color: #f6f6f6;
}
.container{
	width: 500px;
	margin: 0 auto;
	padding: 10px;
	margin-top: 75px;
	padding: 75px 30px;
	border: 1px solid #333;
	background-color:#fff;	
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
</style>
</head>

<body>
<div class="container">
	<label>请输入新密码:</label><br/>
	<input type="text" id="first-password" placeholder='password'><br/>
	<label>请再次输入密码:</label><br/>
	<input type='text' id="second-password" placeholder='password'><br/>
	<button type="button">确认</button><br/>
</div>
</body>

</html>
