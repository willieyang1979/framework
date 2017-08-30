<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 文章表操作类。
 *
 * @author 
 * 2017年6月5日14:36:56。
 */
class Product_model extends CI_Model
{
    /**
     * 构造函数。
     */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * 获取osa_article信息。
     * @param type $where
     * @param type $field
     * @return type
     */
    public function get_info($where = NULL,$limit = null,$field='*',$order_by=null,$d_or_a = null)
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
        }else{
            $this->db->order_by("product_id","desc");
        }
        if ($limit)
        {
            $this->db->limit($limit,0);
        }
        
        return $this->db->get('osa_product')->result_array();
    }
    
    public function get_home_products($menu,$limit = null)
    {
        $this->db->select('*');
        $this->db->where('group_id',$this->config->item('web_id'));
        $this->db->where('is_publish','1');
        $this->db->where('show_in_home','1');
        $this->db->where('belong_menu',$menu);
        $this->db->order_by("product_id","desc");
        $this->db->limit($limit,0);
        
        return $this->db->get('osa_product')->result_array();
    }
}
