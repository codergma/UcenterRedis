<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends CI_Controller{
	private $redis;
	public function __construct()
	{
		parent::__construct();
		$helper = array('form','url','url_helper');
		$this->load->model('portal_model');
		$this->load->helper($helper);
        $this->load->library('CG_base');
        $this->redis = $this->cg_base->get_redis();
	}

	public function index()
	{
		if (isset($_COOKIE['uid']))
		{
			if($this->redis->exists($_COOKIE['uid']))
			{
				$this->load->view('portal/portal');
				return;
			}
		}
		redirect('sign/index');
	}
}
