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
     * 激活或禁用用户
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

    /**
     * 添加用户数据
     * @param $username string 用户名
     * @param $passwd string 密码
     * @return mixed
     */
    public function save($username,$passwd) {
        //构造数据
        $user = ['username'=>$username,
            'passwd'=>md5($passwd.PASSWD_SALT),
            'create_time'=>time()];
        $res = $this->db->insert(self::TABLE_USERS,$user);
        return $res;
    }

    /**
     * 查询 用户名是否存在
     * @param $username string 用户名
     * @return mixed
     */
    public function check_username($username) {
        $sql = "SELECT id FROM ".(self::TABLE_USERS)." WHERE username = '".$username."'";
        return $this->db->query($sql)->row_array();
    }
}