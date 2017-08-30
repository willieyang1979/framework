<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Osa_style_model
 *
 * @author XH
 */
class Style_model extends CI_Model
{
    //构造函数。
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 获取seo内容。
     * @param type $where
     * @param type $field
     * @param type $limit
     * @return type
     */
    public function get_info($where = NULL,$field='*',$order_by=null,$d_or_a = null, $limit = null)
    {
        $this->db->select($field);
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
        return $this->db->get('osa_style')->result_array();
    }
}
