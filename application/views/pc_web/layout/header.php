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
    <!-- css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/public/jquery-ui-1.7.2.custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/public/public.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_web/layout.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_web/reset.css">
    
    
    <!-- js-->
    <script>
        var base_url = "<?=base_url()?>";
        var current_url = "<?php echo uri_string(); ?>";
        //var keyword     = "<?php if(!empty($keyword)) {echo $keyword;}else echo ""; ?>";
    </script>
    <script src="<?php echo base_url(); ?>public/js/public/jquery.js"></script>
    <script src="<?php echo base_url(); ?>public/js/public/jquery-ui-1.12.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/public/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/public/application.js"></script>
    <script src="<?php echo base_url(); ?>public/js/pc_web/layout.js"></script>  
</head>
<body>
	<div id="wrapper">

		<!-- header部分 -->
		<div class="header-wrap">
			<div class="container">
				<div class="header clearfix">

					<!-- 活的数据，分左右，logo,导航 -->
					<div class="logo fl">
						<i></i><img src="<?php echo $this->config->item('logo'); ?>" alt="网站logo">
					</div>
					
					<div class="nav fl">
						<ul class="nav-menu clearfix">
                            <?php foreach($header_menu as $menu){
                                if($menu['web_menu_ename'] == 'home'){?>
                                    <li class="active header_menu" ><a href="<?php echo base_url(); ?>main/home">首页</a></li>
                                <?php }else{ ?>
                                   <li class="header_menu"><a href="<?php echo base_url(); ?>main/lists/<?php echo $menu['web_menu_id']; ?>"><?php echo $menu['web_menu_name'];?></a></li> 
                            <?php  }}?>
						</ul>
					</div>
				</div>
			</div>
		</div>