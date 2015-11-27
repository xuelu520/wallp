<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * 登录页面，如果登录过则重定向到壁纸管理
	 */
	public function index(){
		if(@$_SESSION['admin:id']){
			header("Location:/wall");die;
		}
		$this->load->view('/login/index');
	}

	/**
	 * 处理登录
	 */
	public function login_action(){
		$username = $_POST['username'];
		$pwd = $_POST['pwd'];
		$this->load->model('admin_model','admin');
		$admin = $this->admin->one($username, $pwd);
		if($admin){
			$_SESSION['admin:id'] = $admin['id'];
			$_SESSION['admin:username'] = $admin['username'];
			echo json_encode(array('status'=>1001,
				'data' => array()));die;
		}else{
			echo json_encode(['status'=>1002,
				'data' => []]);die;
		}
	}

	/**
	 * 登出
	 */
	public function logout(){
		session_unset();
		header("Location:/login");die;
	}
}
