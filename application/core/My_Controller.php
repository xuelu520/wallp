<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//控制器的基类
class MY_Controller extends CI_Controller {

    /**
     * 基类的构造函数
     */
    public function __construct(){
        parent::__construct();
        //检查登录
        $this->checkLogin();
    }

    protected static function checkLogin(){
        if(!$_SESSION['admin:id']){
            header("Location:/login");exit;
        }
    }
}