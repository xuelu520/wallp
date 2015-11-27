<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/11/14
 * Time: 17:20
 */
class Admin_Model extends CI_Model {
    const TABLE_ADMINS = "admins";
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        //加载数据库
        $this->load->database('default');
    }

    /**
     * 查询管理员
     * @param $username
     * @param $pwd
     * @return mixed
     */
    public function one($username, $pwd)
    {
        $query = $this->db->get_where(self::TABLE_ADMINS, array('username'=>$username,'pwd'=>md5($pwd)));
        $row = $query->row_array();
        return $row;
    }
}