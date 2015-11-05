#项目概述(还未完成)

---

*	使用的框架是CoderIgniter;
*	为了提高安全性项目根目录在/webroot目录下; 		
	移动index.php文件到/webroot目录下,同时修改index.php中的$application_folder,$view_folder,$system_path;			
	views目录也移动到了/webroot目录下，使其可以直接访问;		
	通过/webroot目录下的.htaccess文件移除url中的index.php;		
*	下面是apache配置





		<VirtualHost *:8084>		
		DocumentRoot /home/liubin/Downloads/Ucenter_Redis/webroot 		
		<Directory /home/liubin/Downloads/Ucenter_Redis/webroot>		
			Require all granted		
			AllowOverride all 		
			Options  MultiViews FollowSymlinks		
		</Directory>		
		</VirtualHost>		

