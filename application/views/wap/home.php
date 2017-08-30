<?php $this->load->view("pc_wap/layout/header"); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_wap/style_home/<?php echo $style['style_templete'];?>.css">
<script src="<?php echo base_url(); ?>public/js/pc_wap/home.js"></script>

<h1>banner</h1>
<div id="banners"></div>
<h1>新闻</h1>
<div id="news"></div>
<h1>文章</h1>
<div id="articles"></div>
<h1>商品</h1>
<div id="products"></div>
<h1>内容</h1>

<!--尾部-->
<?php $this->load->view("pc_wap/layout/footer"); ?>