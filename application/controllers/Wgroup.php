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

    /**
     * 查询套图数据
     */
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

    /**
     * 添加套图
     */
    public function save() {
        $name = $this->input->post('wg_name');
        if(!$name) {
            out('fail','参数错误喔！');exit;
        }
        $this->load->model('wgroup_model','wg_model');
        $res = $this->wg_model->save($name);
        if(!$res) {
            out('fail','添加失败咯！');exit;
        }
        out('success','添加好了，正在刷新...');exit;
    }

    public function up_or_down() {
        $key = $this->input->post('key'); //操作
        $wgid = $this->input->post('wgid'); //操作
        if(!$key || !$key) {
            out('fail','参数错误喔！');exit;
        }
        $this->load->model('wgroup_model','wg_model');
        $res = $this->wg_model->up_or_down(strtoupper($key),$wgid);
        if(!$res) {
            out('fail','操作失败咯！');exit;
        }
        out('success','操作成功了，正在刷新...');exit;
    }
}