<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/11/28
 * Time: 1:10
 */
require_once APPPATH."core/WRedis.php";
class Wgroup_Model extends CI_Model {
    const TABLE_WGROUP = "wgroup";
    const TABLE_WGROUP_ITEM = "wg_items";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        //加载数据库
        $this->load->database('default');
    }


    /**
     * 添加套图数据
     * @param $wgroup
     * @return mixed
     */
    public function add($wgroup) {
        //
        $wg = $this->db->insert(self::TABLE_WGROUPS,$wgroup);
        if($wg) {
            //添加写缓存
            $key = "wgroup:id:";
            $this->cache->redis->set($key,$wg);
        }
        return $wg;
    }

    /**
     * 查询管理员 上传的壁纸
     * @return mixed  array object壁纸列表
     */
    function getList() {
        $sql = "SELECT * FROM wgroup WHERE status = 1 ORDER BY create_time DESC";
        return $this->db->query($sql)->result();
    }

    /**
     * 查询套图数据
     * @param $wg_id int 套图ID
     * @return mixed|string
     */
    function one($wg_id) {
        //查询缓存
        $redis_key = 'wgroup:id:'.$wg_id;
        $redis = new WRedis();
        $wgroup = [];
        $wgroup = $redis->get($redis_key);
        if(!$wgroup) {
            $sql = "SELECT * FROM ".(self::TABLE_WGROUP)." WHERE id = ".$wg_id." AND status = 1";
            $wgroup = $this->db->query($sql)->row_array();
            if($wgroup) {
                //查询items数据
                $items = $this->items($wg_id);
                $wgroup['items'] = $items;
                $redis = new WRedis();
                $redis->set($redis_key, json_encode($wgroup,TRUE));
            }
        }else{
            $wgroup = json_decode($wgroup,TRUE);
        }

        return $wgroup;
    }

    /**
     * 查询套图壁纸数据
     * @param $wg_id
     * @return mixed
     */
    function items($wg_id) {
        //查询缓存
        $redis_key = 'wgroup:items:id:'.$wg_id;
        $redis = new WRedis();
        $wg_items = [];
        $wg_items = $redis->get($redis_key);
        if(!$wg_items) {
            //数据库查询
            $sql = "SELECT *
                    FROM ".self::TABLE_WGROUP_ITEM." AS i
                    RIGHT JOIN walls as w ON w.id = i.wall_id
                    WHERE i.wg_id = $wg_id AND i.status = 1 AND w.status = 1";
            $wg_items = $this->db->query($sql)->result_array();
            //设置缓存
            $redis->set($redis_key,json_encode($wg_items));
        }else{
            $wg_items = json_decode($wg_items,TRUE);
        }
        return $wg_items;
    }
}