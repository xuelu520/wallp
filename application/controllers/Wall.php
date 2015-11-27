<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wall extends MY_Controller{

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
        $this->load->view('/wall/index');
    }

    public function add() {
        $this->load->view('/wall/add');
    }

    /**
     * 上传接口
     */
    public function upload() {
        if ($_FILES["file"]["error"] > 0){
            echo json_encode(['status'=>'fail','msg'=>'上传错误']);exit;
        }else {
            if (!file_exists("images/" . $_FILES["file"]["name"])) {
                move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
            }
            $url = "/images/" . $_FILES["file"]["name"];
            echo json_encode(['status' => 'success', "msg" => "upload success", "data" => ['url' => $url]]);
            //array(,,)
            exit;
        }
    }
}
