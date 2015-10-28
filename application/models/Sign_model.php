<?php
defined('BASEPATH') or die('No direct script access allowed');

class Sign_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//根据用户名，获取用户信息
	public function get_user_by_username($username)
	{
		$query = "SELECT * FROM ci_user WHERE username='$username'";
		$query_result = $this->db->query($query);
		$row_num = $query_result->num_rows;
		$result = $query_result->row();
		return $result;//如果没有查询结果返回空
	}
	//检查用户名是否已经注册,返回数据库查询行数，所以0表示没有被注册
	public function check_username_exists($username) 
	{
		$query = "SELECT * FROM ci_user WHERE username='$username'";
		$query_result = $this->db->query($query);
		$num =$query_result->num_rows();
    return $num;
	}
	//检查邮箱是否已经注册,返回数据库查询行数，所以0表示没有被注册
	public function check_email_exists($email) 
	{
		$query = "SELECT * FROM ci_user WHERE email='$email'";
		$query_result = $this->db->query($query);
		$num = $query_result->num_rows();
		return $num;
	}
	//注册接口
	public function add_user($username,$email,$password,$regip='')
	{
		$salt     = $this->gen_salt();
		$password = $this->gen_passwd($password,$salt);
		$query = "INSERT INTO ci_user(username,email,password,regip,salt) VALUES 
					('$username','$email','$password','$regip','$salt')";
		$this->db->query($query);
		$num = $this->db->affected_rows();
	    return $num;
	}

	//登录成功后更新信息
	public function update_signin($last_signin_ip,$time,$username)
	{
		$query = "UPDATE ci_user SET lastsigninip='$last_signin_ip',lastsignintime=$time WHERE username='$username'";
		$result = $this->db->query($query);
	}

	//重置密码 
	public function reset_passwd($email,$password)
	{
		$salt     = $this->gen_salt();
		$passwd = $this->gen_passwd($password,$salt);//数据库密码采用盐+两次md5加密的方式

		$query = "UPDATE ci_user SET password="."'$passwd'".",salt="."'$salt'"." WHERE email="."'$email'";
		$this->db->query($query);
		$num = $this->db->affected_rows();
	    return $num>0?true:false;
	}

	//盐的生成规则
	private function gen_salt()
	{
		return substr(uniqid(rand()),-6);
	}
	//密码生成规则
	private function gen_passwd($passwd,$salt)
	{
		return md5(md5($passwd).$salt);
	}




}
