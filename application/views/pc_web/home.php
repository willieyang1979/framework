<?php $this->load->view("pc_web/layout/header"); ?>
<!-- 文本样式-->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_web/style_home/banner.css">
<?php foreach($style_sheets as $style_sheet){?>
    <link rel="stylesheet" href="<?php echo $style_sheet['style_name'];?>">
<?php } ?>
<!-- js -->
<script src="<?php echo base_url(); ?>public/js/pc_web/home/news/style_data.js"></script>
<script src="<?php echo base_url(); ?>public/js/pc_web/home/product/style_data.js"></script>
<script src="<?php echo base_url(); ?>public/js/pc_web/home/home.js"></script>
<?php foreach($js_files as $js_file){?>
    <script src="<?php echo $js_file['js_file'];?>"></script>
<?php } ?>


<input id="menu_id" type="hidden" value="<?php echo $menu_id;?>" />
<div class="banner">
    <div class="flexslider">
        <ul class="slides" id="home_banner"></ul>
    </div>
</div>


<div class="main-wrap">
<!-- 容器 -->

<!-- 主题内容区   -->
<div class="main clearfix" id="content" ></div>
</div>


<!--尾部-->
<?php $this->load->view("pc_web/layout/footer"); ?>