<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/2
 * Time: 23:10
 */
class User_Model extends CI_Model {
    const TABLE_ADMINS = "admins";
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        //加载数据库
        $this->load->database('default');
    }

    /**
     * 查询用户列表
     * @return mixed
     */
    public function user_list() {
        $sql = "SELECT u.username username,u.create_time create_time,u.status status,o.type type
                FROM users AS u
                LEFT JOIN open_login AS o on u.id = o.user_id
                WHERE uid = ? and status = 1 ORDER BY create_time DESC";
        return $this->db->query($sql)->result();
    }
}