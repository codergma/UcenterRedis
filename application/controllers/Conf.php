<?php
defined('BASEPATH') or die('No direct script access allowed');

class Conf extends CI_Controller
{
	public function index()
	{
		//url辅助函数
		$this->load->helper('url');
		$url = array(
			"site_url()"=> site_url('sign/index','http'),
			"base_url()"=> base_url('sign/index','http'),
			"current_url()"=>current_url(),
			"uri_string()"=>uri_string(),
			"index_page()"=>index_page(),
			"anchor(conf/index,'click me')"=>anchor('conf/index','click me',"title='title'"),
			"anchor_popup(conf/index,'click me','array()')"=>anchor('conf/index','click me',array()),
			"mailto(fortestaa@163.com,'Contact me','array()')"=>mailto('fortestaa@163.com','Contact me',array()),
			"auto_link()"=>auto_link('我的github账户是https://github.com/codergma/ 我的邮箱是fortestaa@163.com','both',TRUE),
			"pre_url()"=>prep_url('example.com'),
			"redirect()"=>'redirect',
			"date_default_timezone_get"=>date_default_timezone_get(),
		);
		//路径辅助函数
		$this->load->helper('path');
		$path = array(
			"set_realpath()"=>set_realpath('.',TRUE),
			);

		$data = array(
			'url'=>$url,
			'path'=>$path,
			);

		$this->load->view('conf/conf',$data);

	}


}
