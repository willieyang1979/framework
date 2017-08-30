<!-- 头部-->
<?php $this->load->view("pc_web/layout/header"); ?>
<!-- 加载所选菜单样式 和 前段菜单js-->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_web/style_<?php echo $style['cat_ename'];?>/<?php echo $style['style_templete'];?>.css">
<script src="<?php echo base_url(); ?>public/js/pc_web/<?php echo $style['cat_ename'];?>/lists.js"></script>
<input id="menu_id" type="hidden" value="<?php echo $menu_id;?>" />
<input id="web_menu_type" type="hidden" value="<?php echo $web_menu_type;?>" />
<!-- 内容-->
<div class="main-top">
    <div class="container">
        <!-- 二级标题 -->
        <div class="menu-tit"><?php echo $web_menu_name;?></div>
        <!-- 二级头图 -->
        <div class="main-banner" id="banner"></div>
    </div>
</div>
<!-- 主题部分 -->
<div class="main-wrap">
    <!-- 容器 -->
    <div class="container">
        <div class="main">  
            <!-- 具体内容区 -->
            <div class="list-wrap">
                <!-- 列表 -->
                <div class="main-list">
                    <div class="list-box clearfix" id="content"></div>	
                </div>
                <!-- <div class="click-more">
                    <button>点击加载更多</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!--尾部-->
<?php $this->load->view("pc_web/layout/footer"); ?>