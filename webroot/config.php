<?php
/*
* 此文件为配置文件，定义若干个常量，之所以不使用全局变量，原因是全局变量在函数中使用不方便。
*/
define('UCENTER_HOST','localhost:80');
define('UCENTER_ADDR','localhost');
define('UCENTER_PORT',80);
//用于缓存的redis服务
define('REDIS_ADDR', 'localhost');
define('REDIS_PORT', 6379);
//登录错误次数
define('MAX_ERR_NUM',5);
define('EXPIRE', 1800);
//修改密码链接的过期时间
define('PASSWD_EXPIRE',3600);
