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
    public function add($wall)
    {
        return $this->db->insert(self::TABLE_WALLS,$wall);
    }
}