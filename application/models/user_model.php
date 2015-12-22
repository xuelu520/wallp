<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/2
 * Time: 23:10
 */
class User_Model extends CI_Model {
    const TABLE_USERS = "users";
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
        $sql = "SELECT u.id id,u.username username,u.create_time create_time,u.status status,o.type type
                FROM users AS u
                LEFT JOIN open_login AS o on u.id = o.user_id
                ORDER BY u.create_time DESC";
        return $this->db->query($sql)->result();
    }

    /**
     * 上架或下架
     * @param $key string 大写 UP-激活  DOWN-禁用
     * @param $uid int 用户ID
     * @return mixed
     */
    function up_or_down($key,$uid) {
        $status = 1;
        if($key == 'UP') {
            $status = 1;
        }else{
            $status = 2;
        }
        $data = array(
            'status' => $status
        );

        $this->db->where('id', $uid);
        return $this->db->update(self::TABLE_USERS, $data);
    }
}