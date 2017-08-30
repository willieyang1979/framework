<?php $this->load->view("pc_wap/layout/header"); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_wap/style_<?php echo $style['cat_ename'];?>/<?php echo $style['style_templete'];?>.css">
<script src="<?php echo base_url(); ?>public/js/pc_wap/<?php echo $style['cat_ename'];?>/lists.js"></script>
<input id="menu_id" type="text" value="<?php echo $menu_id;?>" />
<input id="web_menu_type" type="text" value="<?php echo $web_menu_type;?>" />
<div id="banner"></div>
<div id="content"></div>
<!--尾部-->
<?php $this->load->view("pc_wap/layout/footer"); ?>