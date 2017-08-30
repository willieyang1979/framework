<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Osa_seo_model
 *
 * @author XH
 */
class Web_menu_model extends CI_Model
{
    //构造函数。
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 获取菜单内容。
     * @param type $where
     * @param type $field
     * @param type $limit
     * @return type
     */
    public function get_info($where = NULL,$field='*',$order_by=null,$d_or_a = null, $limit = null)
    {
        $this->db->select($field);
        $this->db->where('group_id',$this->config->item('web_id'));
        $this->db->where('is_show','1');//上线的菜单
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
        return $this->db->get('osa_web_menu')->result_array();
    }
}
