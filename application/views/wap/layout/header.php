<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name=”renderer” content=”webkit” />
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="<?php echo $this->config->item('seo_description'); ?>" />
    <meta name="keywords" content="<?php echo $this->config->item('seo_keywords'); ?>" />
    <title><?php echo $this->config->item('seo_title'); ?></title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_web/layout.css">
    <script>
        var base_url = "<?=base_url()?>";
        var current_url = "<?php echo uri_string(); ?>";
        var keyword     = "<?php if(!empty($keyword)) {echo $keyword;}else echo ""; ?>";
    </script>
    <script src="<?php echo base_url(); ?>public/js/public/jquery.js"></script>
    <script src="<?php echo base_url(); ?>public/js/public/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/Industrial/index.js"></script>
    <script src="<?php echo base_url(); ?>public/js/layout/layout.js"></script>
</head>
<body>
    <div class="internet_Wrap">
        <!--头部-->
        <div class="header-wrap">
            <div class="header clearfix">
                <div class="header-logo fl">
                
                <!--图片链接需要动态化 ------------------------------------------->
                <img src="<?php echo base_url(); ?>public/image/logo.png" alt="">
                <!--图片链接需要动态化 ------------------------------------------->
                
                </div>
                <ul class="header-nav fl clearfix">
                    <?php foreach($header_menu as $menu){
                        if($menu['web_menu_ename'] == 'home'){?>
                            <li class="nav_active"><a href="<?php echo base_url(); ?>main/home">首页</a></li>
                        <?php }else{ ?>
                           <li class="nav_active"><a href="<?php echo base_url(); ?>main/lists/<?php echo $menu['web_menu_id']; ?>"><?php echo $menu['web_menu_name'];?></a></li> 
                    <?php  }}?>
 
                </ul>
            </div>
        </div>