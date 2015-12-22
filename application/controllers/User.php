<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH.'libraries/upyun.class.php');//引入upyun SDK
class User extends MY_Controller{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->model('user_model','user');
        $users = $this->user->user_list();
        $this->load->view('/user/index',['users'=>$users]);
    }

    public function add() {
        $this->load->view('/wall/add');
    }
}
