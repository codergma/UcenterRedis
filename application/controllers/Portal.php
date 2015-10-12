<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('portal_model');
		$this->load->model('sign_model');
		$this->load->helper('url_helper');
        $this->load->library('LB_base_lib');
	}


	public function index_session()
	{
		//redis
		session_start();
		$is_online = $_SESSION['online'] ? true:false;
		if ($is_online)
		{
			$this->load->view('portal/index_session');
		}
		else
		{
			$this->load->view('sign/sign_session');
		}
	}
	public function index_redis()
	{
		$this->load->view('portal/index_redis');
	}

	

}
