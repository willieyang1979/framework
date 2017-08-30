<?php $this->load->view("pc_wap/layout/header"); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_wap/style_<?php echo $style['cat_ename'];?>/<?php echo $style['style_templete']."_detail";?>.css">
<script src="<?php echo base_url(); ?>public/js/pc_wap/<?php echo $style['cat_ename'];?>/detail.js"></script>
<input id="detail_type" type="text" value="<?php echo $detail_type;?>" />
<input id="detail_id" type="text" value="<?php echo $detail_id;?>" />
<input id="is_preview" type="text" value="<?php echo $is_preview;?>" />
<h1>hhh</h1>
<div id="detail_info"></div>
<!--尾部-->
<?php $this->load->view("pc_wap/layout/footer"); ?>