$(document).ready(function () {
   //数据获取
   var menu_id = $('#menu_id').val();
   $.ajax
    ({
        type:"post",
        datatype:"json",
        data:{"menu_id":menu_id},
        url:base_url+"main/get_home",
        success:function(result)// 请求成功时的回调函数。
        {
            var banner_str="";
            var content="";
            //banner
            $.each(result.banners,function(i,n)
            {
                banner_str = banner_str + '<li>';
                banner_str = banner_str + '<img style="width:100%;height:460px;" src="'+n.banner_image+'" alt="">';
                banner_str = banner_str + '<div class="banner-tit">';
                if(n.link_id > 0){
                    banner_str = banner_str + '<a href="'+base_url+'main/detail/'+n.banner_type+'/'+n.link_id+'"><p class="word-nowrap">'+n.banner_title+'</p></a>';
                }else{
                    banner_str = banner_str + '<p class="word-nowrap">'+n.banner_title+'</p>';
                }
                
                banner_str = banner_str + '</div></li>';
            });
            $("#home_banner").html(banner_str);
            
            $.each(result.return_data,function(i,n)
            {
                //获取所选择样式
                var temp = n.style_templete;
                content = content + '<div class="'+n.style_templete+'" style="background-color:'+n.bgcolor+'">';
                content = content + '<div class="container"> ';
                content = content + '<div class="news_top">';
                content = content + '<h3>'+n.title+'</h3>';
                //content = content + '<h4>模块小标题</h4>';
                content = content + '</div>';
                content = content + '<div class="news_main">';
                content = content + '<div class="news_list clearfix">';

                //获取数据
                if(n.web_menu_type == 1){
                    $.each(n.data,function(idx,val)
                    {
                       content = content + news_data(temp,val);
                    });
                }
                if(n.web_menu_type == 2){
                    $.each(n.data,function(idx,val)
                    {
                        content = content + article_data(temp,val);
                    });
                }
                if(n.web_menu_type == 3){
                    $.each(n.data,function(idx,val)
                    {
                        content = content + product_data(temp,val);

                    });
                }
                content = content + '</div></div></div></div>';   
            });
            
            
            $("#content").html(content);
            
            $('.flexslider').flexslider({
                directionNav: true,
                pauseOnAction: false,
                slideshowSpeed: 5000
            });
            
            

            

        },
        error:function(error)// 请求失败时的回调函数。
        {
            console.log(error);
            return;
        }
    });
});