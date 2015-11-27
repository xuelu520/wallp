<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH.'libraries/upyun.class.php');//引入upyun SDK
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
            try {
                $file_name = $_FILES["file"]["name"];
                //处理上传
                //初始化 upyun SDK
                $upyun = new UpYun(UPYUN_BUCKET, UPYUN_USERNAME, UPYUN_PWD);
                $file = fopen($_FILES["file"]['tmp_name'], 'r'); //流打开上传临时文件
                $uid = $_SESSION['admin:id']; //用户ID
                $time = time(); //道歉时间
                $upyun_file_name = md5($file_name) . "." . parent::get_image_type($file_name); //upyun 文件名
                $path = "/" . $uid . "/" . $upyun_file_name; //upyun 文件路径
                $res = $upyun->writeFile($path, $file, true); //upyun文件上传
                fclose($file);
                if ($res) {
                    //上传成功，写入用户壁纸表
                    $data = ['uid' => $uid, 'url' => $path, 'create_time' => $time];
                    $this->load->model('wall_model','wall');
                    $res = $this->wall->add($data);
                    if (!$res) {
                        $upyun->delete($path); // 删除文件
                    }
                    echo json_encode(['status'=>'success', 'msg'=>'upload upyun success','data'=>['url'=>$path]]);exit;
                }else{
                    echo json_encode(['status'=>'fail','msg'=>'上传错误']);exit;
                }
                //TODO 添加 redis 数据
            }catch (Exception $e) {
                echo json_encode(['status'=>'fail', 'msg'=>$e->getMessage()]);exit;
            }
        }
    }
}
