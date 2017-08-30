<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * banner表操作类。
 *
 * @author lantian
 * 2017年6月5日14:36:56。
 */
class Banner_model extends CI_Model
{
    /**
     * 构造函数。
     */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * 获取osa_banner信息。
     * @param type $where
     * @param type $field
     * @return type
     */
    public function get_info($where = NULL,$field='*',$order_by=null,$d_or_a = null, $limit = null)
    {
        $this->db->select($field);
        $this->db->where('group_id',$this->config->item('web_id'));
        //$this->db->where('is_publish','1');//上线的菜单
        if ($where)
        {
            $this->db->where($where);
        }
        if ($order_by && $d_or_a)
        {
            $this->db->order_by($order_by,$d_or_a);
        }
        
        if ($limit)
        {
            $this->db->limit($limit,0);
        }
        return $this->db->get('osa_banner')->result_array();
    }
}
