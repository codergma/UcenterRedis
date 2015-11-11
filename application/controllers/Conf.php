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
		//生成验证码
		$this->load->helper('captcha');
		$vals = array(
		    'img_path'  => $this->config->item('root_path').'captcha/',
		    'img_url'   => base_url().'captcha/',
		    'font_path' => $this->config->item('root_path').'/font/SIMYOU.TTF',
		    'img_width' => 150,
		    'img_height'    => 40,
		    'expiration'    => 200,
		    'word_length'   => 4,
		    'font_size' => 25,
		    'img_id'    => 'Imageid',
		    'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		    // White background and border, black text and red grid
		    'colors'    => array(
		        'background' => array(255, 255, 255),
		        'border' => array(255, 255, 255),
		        'text' => array(0, 0, 0),
		        'grid' => array(0, 0, 0)
		    )
		);

		$cap = create_captcha($vals);
		$data = array(
			'url'=>$url,
			'path'=>$path,
			'captcha'=>$cap,
			);

		$this->load->view('conf/conf',$data);

	}


}
