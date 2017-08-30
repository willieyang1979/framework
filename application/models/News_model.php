<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 咨询。
 *
 * 
 * 
 */
class News_model extends CI_Model 
{
    /**
     * 构造函数。
     */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * 获取咨询。
     * @param 。
     * @return array
     */
    function get_info($where = NULL,$field='*',$limit = 8,$offset = 0,$like = "")
    {
        $db_news = $this->load->database('news',TRUE);
        $db_news->select($field);
//        $db_news->where("source is not null");
        if ($where)
        {
            $db_news->where($where);
        }
        if (!empty($like))
        {
            $db_news->or_like("title",$like);
            $db_news->or_like("brief",$like);
        }
        $db_news->order_by("id","desc");
        $db_news->limit($limit,$offset);
        
        return $db_news->get('itnews_list')->result_array();
    }
    
    /**
     * 获取资讯详情信息。
     * @param type $where 查找条件。
     * @param type $field 查询字段。
     * @return type
     */
    function get_detail_info($where = NULL,$field = "*")
    {
        $db_news = $this->load->database('news',TRUE);
        $db_news->select($field);
        if ($where) {
            if (is_array($where)) {
                $db_news->where($where);
            }
        }
        return $db_news->get('itnews_detail')->result_array();
    }
    
}
