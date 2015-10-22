<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends CI_Controller{
	private $redis;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('portal_model');
		$this->load->model('sign_model');
		$this->load->helper('url_helper');
        $this->load->library('LB_base_lib');
        $this->redis = new Redis();
        $this->redis->connect(REDIS_ADDR,REDIS_PORT);
	}

	public function index()
	{
		if (isset($_COOKIE['uid']))
		{
			if($this->redis->exists($_COOKIE['uid']))
			{
				$this->load->view('portal/portal_redis');
				return;
			}
		}
		$this->load->view('sign/sign_redis');
	}
}
