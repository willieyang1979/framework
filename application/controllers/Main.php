<?php

/**
 * 控制器。
 *
 */
class Main extends CI_Controller
{
    private $seo_info;
    private $header_menu;
    private $footer_menu;
    
    private $position_header;
    private $position_footer;
    private $position_right;
    
    private $preview_on;
    private $preview_off;
    private $select_limit;
    
    private $news_type;
    private $article_type;
    private $product_type;
    
    /**
     * 构造函数。
     */
    public function __construct() 
    {
        parent::__construct();
        //model 层加载
        $this->load->helper('url');
        $this->load->helper("front");
        $this->load->model("seo_model");
        $this->load->model("web_menu_model");
        $this->load->model("style_model");
        $this->load->model("style_category_mode");
        $this->load->model("article_model");
        $this->load->model("product_model");
        $this->load->model("news_model");
        $this->load->model("banner_model");
        $this->load->model("group_model");
        
        //菜单位置设置
        $this->position_header = 1;
        $this->position_footer = 2;
        $this->position_right  = 3;
        
        //是否为预览设置
        $this->preview_on   = 1;
        $this->preview_off  = 0;
        
        //首页数据限制设置
        $this->select_limit = 3;
        
        //数据类型设置
        $this->news_type    = 1;
        $this->article_type = 2;
        $this->product_type = 3;
        
        //seo设置
        $seo_info = $this->seo_model->get_info();
        $seo_info = array_shift($seo_info);
        $this->config->set_item('seo_description', $seo_info['seo_description']);
        $this->config->set_item('seo_keywords', $seo_info['seo_keywords']);
        $this->config->set_item('seo_title', $seo_info['seo_title']);
        
        //页头页尾logo
        $group = $this->group_model->get_info();
        $group = array_shift($group);
        $this->config->set_item('logo', $group['logo']);
        
        //菜单获取，使用所有页面
        $menus = $this->web_menu_model->get_info();
        $header_menu= array();
        $footer_menu= array();
        foreach ($menus as $menu){
            //header menu
            if($menu['show_position'] == $this->position_header){
                $header_menu[$menu['sort']] = $menu;
            }
            //footer menu
            if($menu['show_position'] == $this->position_footer){
                $footer_menu[$menu['sort']] = $menu;
            }
        }
        ksort($header_menu);
        ksort($footer_menu);
        $this->header_menu = $header_menu;
        $this->footer_menu = $footer_menu;
    }
    
    /**
     * 首页。
     */
    public function home()
    {
        $menus = array(); 
        $data= array();
        $data['style_sheets'] = array();  
        $data['js_files']= array();  
        $menus = $this->web_menu_model->get_info();
        //$right_menu= array();

        foreach ($menus as $key=>$menu){
            //右面菜单 -- 先不适用此版本
            /* if($menu['show_position'] == $this->position_right){
                $right_menu[$menu['sort']] = $menu;
            }  */
            
            //获取首页显示所选择样式
            if($menu['show_in_home'] == 1){
                $style = $this->style_model->get_info(array('style_id'=>$menu['pc_in_home_style']));
                $style = array_shift($style);
                //var_dump($style);die;
                $style_category = $this->style_category_mode->get_info(array('style_category_id'=>$menu['style_category_id']));
                $style_category = array_shift($style_category);
                //var_dump($style_category);die;
                $style_sheet = base_url().'public/css/pc_web/style_home/'.$style_category['style_category_ename'].'/'.$style['style_templete'].'.css';
                $js_file = base_url().'public/js/pc_web/home/'.$style_category['style_category_ename'].'/'.$style['style_templete'].'.js';
                $data['style_sheets'][$key]['style_name'] = $style_sheet;
                $data['js_files'][$key]['js_file'] = $js_file;
            }
            
        }
        //ksort($right_menu);
        //$style = array_shift($style);
        //$data['right_menu'] = $right_menu;

        
        $menus = $this->web_menu_model->get_info(array('web_menu_ename'=>'home'));
        $menus = array_shift($menus);
        
        $data['header_menu'] = $this->header_menu;
        $data['footer_menu'] = $this->footer_menu;
        $data['menu_id'] = $menus['web_menu_id'];
        $this->load->view("pc_web/home",$data);
    }
    /**
     * 首页数据获取。
    */
    public function get_home()
    {
        $output =array();
        //根据菜单获取数据
        foreach ($this->header_menu as $key => $header_menu){
            if($header_menu['web_menu_ename'] == 'home'){
                //是首页才取banner
                $banners = $this->banner_model->get_info(array('page_id'=>$header_menu['web_menu_id']));
            }else{           
                //判断菜单是否在后台设置显示数据在首页
                if($header_menu['show_in_home'] == 1){
                    //获取首页显示所选择样式
                    $style = $this->style_model->get_info(array('style_id'=>$header_menu['pc_in_home_style']));
                    $style = array_shift($style);
                    
                    /*$style_category = $this->style_category_mode->get_info(array('style_category_id'=>$header_menu['style_category_id']));
                    $style_category = array_shift($style_category);
                    
                    $style_sheet = '<link rel="stylesheet" href="'.base_url().'public/css/pc_web/style_home/'.$style_category['style_category_ename'].'/'.$style['style_templete'].'.css">';
                    $output[$header_menu['web_menu_ename']]['style_sheet'] = $style_sheet;
                    
                    $output[$header_menu['web_menu_ename']]['style_category_ename'] = $style_category['style_category_ename'];
                    $output[$header_menu['web_menu_ename']]['style_templete'] = $style['style_templete'];
                    */
                    $output[$header_menu['web_menu_ename']]['web_menu_type'] = $header_menu['web_menu_type'];
                    $output[$header_menu['web_menu_ename']]['style_templete'] = $style['style_templete'];
                    if(!empty($header_menu['home_title'])){
                        $output[$header_menu['web_menu_ename']]['title'] = $header_menu['home_title'];
                    }else{
                        $output[$header_menu['web_menu_ename']]['title'] = '';
                    }
                    if(!empty($header_menu['home_bg_color'])){
                        $output[$header_menu['web_menu_ename']]['bgcolor'] = $header_menu['home_bg_color'];
                    }else{
                        $output[$header_menu['web_menu_ename']]['bgcolor'] = '#ffffff';
                    }

                    
                    //获取首页显示数据 -- 目前限制3条 -- 
                    if($header_menu['web_menu_type'] ==  $this->news_type){
                        $news =  $this->get_news('all',$this->select_limit);
                        $output[$header_menu['web_menu_ename']]['data'] = $news;
                    }
                    if($header_menu['web_menu_type'] ==  $this->article_type){
                        $articles =  $this->article_model->get_home_articles($header_menu['web_menu_id'],$this->select_limit);
                        $output[$header_menu['web_menu_ename']]['data'] = $articles;
                    }
                    if($header_menu['web_menu_type'] ==  $this->product_type){
                        $products =  $this->product_model->get_home_products($header_menu['web_menu_id'],$this->select_limit);
                        $output[$header_menu['web_menu_ename']]['data'] = $products;
                    }
                }
            }
        }
        $data= array();
        $data['banners'] = $banners;
        $data['return_data'] = $output;

        output_json($data);
    }
    
    
     /**
     * 列表页面。
     */
    public function lists($menu_id=null)
    {
        //获取所选择样式
        $menu = $this->web_menu_model->get_info(array('web_menu_id'=>$menu_id));
        $menu = array_shift($menu);

        $style_category = $this->style_category_mode->get_info(array('style_category_id'=>$menu['style_category_id']));
        $style = $this->style_model->get_info(array('style_id'=>$menu['pc_style_id']));
        $style = array_shift($style);
        $style_category = array_shift($style_category);
        $style['cat_ename'] = $style_category['style_category_ename'];
        
        $data= array();
        $data['header_menu'] = $this->header_menu;
        $data['footer_menu'] = $this->footer_menu;
        $data['menu_id'] = $menu_id;
        $data['web_menu_type'] = $menu['web_menu_type'];
        $data['web_menu_name'] = $menu['web_menu_name'];
        $data['style'] = $style;
       
        $this->load->view("pc_web/".$menu['web_menu_ename']."_list",$data);
    }
    /**
     * 列表数据获取。
     */
    public function get_list()
    {
        $menu_id = $this->input->post("menu_id");
        $web_menu_type = $this->input->post("web_menu_type");

        //banner 
        $banners = $this->banner_model->get_info(array('page_id'=>$menu_id));
        
        //获取列表数据
        $contents = $this->get_content($web_menu_type,'all',$menu_id);

        /*由于新闻和文本样式属于同种类型 -- 所以对文本数据按照新闻数据格式编辑。以便前段处理*/
        $news_articles = array();
        foreach ($contents as $key=>$content){
            if($web_menu_type == $this->article_type){
                $news_articles[$key]['title'] = $content['article_title'];
                $news_articles[$key]['brief'] = $content['article_abstract'];
                $news_articles[$key]['stime'] = date("Y-m-d H:i:s",$content['article_time']);
                $news_articles[$key]['pic']   = $content['article_thumb'];
                $news_articles[$key]['LID']   = $content['article_id'];
                $contents = array();
                $contents = $news_articles;
            }
            if($web_menu_type == $this->product_type){
                $contents[$key]['start_time'] = date("Y-m-d",$content['start_time']);
            }
        }

        $data= array();
        $data['banners'] = $banners;
        $data['contents'] = $contents;
        
        output_json($data);
    }
    
    

    /**
     * 详情页。
     * $type 从列表页传过来web_menu_type 用来判定是从哪个表中取数据 1 news，2 article 还是3 product
     * $id  
     * $is_preview 是否为预览
    */
    public function detail($type,$id,$is_preview=0)
    {
        //获取详情页样式 -- 目前都是一样（为之后准备）
        if($type == $this->news_type){
            $menu = $this->web_menu_model->get_info(array('web_menu_ename'=>'news')); 
        }else{
            $info = $this->get_content($type,$id,'',$is_preview);
            $info = array_shift($info);
            if($type == $this->article_type){
              $menu_id = $info['article_type'];
            }
            if($type == $this->product_type){
              $menu_id = $info['belong_menu'];
            }
            $menu = $this->web_menu_model->get_info(array('web_menu_id'=>$menu_id));
        }
        $menu = array_shift($menu);
        $style_category = $this->style_category_mode->get_info(array('style_category_id'=>$menu['style_category_id']));
        $style = $this->style_model->get_info(array('style_id'=>$menu['pc_style_id']));
        $style = array_shift($style);
        $style_category = array_shift($style_category);
        $style['cat_ename'] = $style_category['style_category_ename'];
        
        
        $data= array();
        $data['header_menu'] = $this->header_menu;
        $data['footer_menu'] = $this->footer_menu;
        $data['detail_type'] = $type;
        $data['detail_id'] = $id;
        $data['is_preview'] = $is_preview;
        $data['style'] = $style;

        $this->load->view("pc_web/".$menu['web_menu_ename']."_detail",$data);
    }
    
    /**
     * 详情页数据。
     * 
    */
    public function get_detail()
    {
        $type = $this->input->post("detail_type");
        $id = $this->input->post("detail_id");
        $is_preview = $this->input->post("is_preview");
        //获取数据
        $contents = $this->get_content($type,$id,'',$is_preview);
        $contents = array_shift($contents);
        /*由于新闻和文本样式属于同种类型 -- 所以对文本数据按照新闻数据格式编辑。以便前段处理*/
        if($type == $this->article_type){
            $news_articles['title'] = $contents['article_title'];
            $news_articles['brief'] = $contents['article_abstract'];
            $news_articles['stime'] = date("Y-m-d H:i:s",$contents['article_time']);
            $news_articles['pic']   = $contents['article_thumb'];
            $news_articles['LID']   = $contents['article_id'];
            $news_articles['desc']   = $contents['article_content'];
            $news_articles['main_img']   = $contents['article_image'];
            $contents = array();
            $contents = $news_articles;
        } 

        $data= array();
        $data['content'] = $contents;
        
        output_json($data);
    }

    /**
     * 获取列表或详情信息。
     * 公用方法
     */
    public function get_content($type=null, $content_id=null,$menu_id=null, $preview=null)
    {
       $data = array();
       if($type == $this->news_type){
        /*-----------------------------------------------------------
        news
        -----------------------------------------------------------*/
            $data =  $this->get_news($content_id);
        }elseif($type == $this->article_type){
        /*-----------------------------------------------------------
        article
        -----------------------------------------------------------*/    
           $data =  $this->get_articles($content_id,$menu_id,$preview);
        }elseif($type == $this->product_type){
        /*-----------------------------------------------------------
        product
        -----------------------------------------------------------*/    
            $data =  $this->get_products($content_id,$menu_id,$preview);
        }
        
        return $data;
    }
    
    
    
    /**
     * 获取新闻。
     * $news_id=null  获取列表，获取详情传入$news_id
     */
    public function get_news($news_id=null,$limit=null)
    {
        //all 属于列表或者首页数据
        if($news_id == 'all'){
            if(!empty($limit)){
                $news = $this->news_model->get_info(array(),$limit);
            }else{
                $news = $this->news_model->get_info();
            }
        }else{
            $news = $this->news_model->get_info(array('LID'=>$news_id));
            $new_info = $this->news_model->get_detail_info(array('LID'=>$news_id));
            $news[0]['main_img']   = $news[0]['pic'];
            $news[0]['desc'] = stripslashes($new_info[0]['detail']);
            $news[0]['desc'] = substr($news[0]['desc'],1);
        }

        return $news;
    }
    
    /**
     * 获取文章。
     * $article_id=null  获取列表，获取详情传入$article_id
     * $menu_id 菜单id
     * $preview 是否为预览
     */
    public function get_articles($article_id=null, $menu_id=null, $preview=null,$limit=null)
    {
        //all 属于列表或者首页数据
        if($article_id == 'all'){
            if($menu_id == 'all'){
               $where = array('is_publish'=>1);
            }else{
               $where = array('article_type'=>$menu_id,'is_publish'=>1); 
            }
        }else{
            if(!empty($preview)){
                $where = array('article_id'=>$article_id);
            }else{
                $where = array('article_id'=>$article_id,'is_publish'=>1);
            }
        }
        $articles = $this->article_model->get_info($where,$limit);
        
        return $articles;
    }
    
    /**
     * 获取商品、项目。
     * $product_id=null  获取列表，获取详情传入$product_id
     * $menu_id 菜单id
     * $preview 是否为预览
     */
    public function get_products($product_id=null, $menu_id=null, $preview=null,$limit=null)
    {
        //all 属于列表或者首页数据
        if($product_id == 'all'){
            if($menu_id == 'all'){
               $where = array('is_publish'=>1);
            }else{
               $where = array('belong_menu'=>$menu_id,'is_publish'=>1); 
            }
        }else{
            if(!empty($preview)){
                $where = array('product_id'=>$product_id);
            }else{
                $where = array('product_id'=>$product_id,'is_publish'=>1);
            }
        }
        $products = $this->product_model->get_info($where,$limit);
        
        return $products;
    }
    
}
?>