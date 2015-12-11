<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/11/28
 * Time: 1:10
 */
class Wall_Model extends CI_Model {
    const TABLE_WALLS = "walls";
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        //加载数据库
        $this->load->database('default');
    }


    /**
     * 添加壁纸数据
     * @param $wall
     * @return mixed
     */
    public function add($wall) {
        return $this->db->insert(self::TABLE_WALLS,$wall);
    }

    /**
     * 查询管理员 上传的壁纸
     * @param $admin_id int 管理的ID
     * @return mixed  array object壁纸列表
     */
    function getList($admin_id) {
        $sql = "SELECT * FROM walls WHERE uid = ? and status = 1";
        return $this->db->query($sql,[$admin_id])->result();
    }
}