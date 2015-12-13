<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/12
 * Time: 0:21
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Wgroup extends MY_Controller{
    public function index() {
        $this->load->model('wgroup_model','wg');
        $wgs = $this->wg->getList();
        $this->load->view('/wgroup/index',['wgroups'=>$wgs]);
    }


    public function ajax_get_one() {
        $wg_id = $this->input->get('wgid',TRUE);
        if(!$wg_id){
            //套图ID不存在
            out(FAIL_STATUS,GET_FAIL_MSG);exit;
        }
        $wg = [];
        if(false){
            out(SUCCESS_STATUS,GET_SUCCESS_MSG,$wg);exit;
        }else{
            //查询数据库
            $this->load->model('wgroup_model','wg_model');
            $wg = $this->wg_model->one($wg_id);
            if(!$wg) {
                out(FAIL_STATUS,GET_FAIL_MSG);exit;
            }
            out(SUCCESS_STATUS,GET_SUCCESS_MSG,$wg);exit;
        }
    }
}