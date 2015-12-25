<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function wg_one() {
        $wg_id = $this->input->get('wg_id',TRUE);
        if(!$wg_id){
            //套图ID不存在
            out(FAIL_STATUS,GET_FAIL_MSG);exit;
        }
        //查询数据
        $this->load->model('wgroup_model','wg_model');
        $wg = $this->wg_model->one($wg_id);
        if(!$wg) {
            out(FAIL_STATUS,GET_FAIL_MSG);exit;
        }
        out(SUCCESS_STATUS,GET_SUCCESS_MSG,$wg);exit;
    }
}
