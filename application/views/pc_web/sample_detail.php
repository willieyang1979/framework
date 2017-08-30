<!-- 头部-->
<?php $this->load->view("pc_web/layout/header"); ?>
<!-- 加载所选菜单样式 和 前段菜单js-->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pc_web/style_<?php echo $style['cat_ename'];?>/<?php echo $style['style_templete']."_detail";?>.css">
<script src="<?php echo base_url(); ?>public/js/pc_web/<?php echo $style['cat_ename'];?>/detail.js"></script>
<input id="detail_type" type="hidden" value="<?php echo $detail_type;?>" />
<input id="detail_id" type="hidden" value="<?php echo $detail_id;?>" />
<input id="is_preview" type="hidden" value="<?php echo $is_preview;?>" />
<!-- 主题部分 -->
<div class="main-wrap">
    <!-- 容器 -->
    <div class="container">  
        <div class="detail">
            <h3 class="detail-tit" id="title"></h3>
            <p class="detail-brief" id="brief"></p>
            <div class="detail-content">
                <img id="main_img" src="" alt="">
                <div class="detail-describe" id="des">
                </div>
            </div>
        </div>
    </div>
</div>
<!--尾部-->
<?php $this->load->view("pc_web/layout/footer"); ?>