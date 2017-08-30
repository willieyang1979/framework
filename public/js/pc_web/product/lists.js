$(document).ready(function (){
    var web_menu_type = $('#web_menu_type').val();
    var menu_id = $('#menu_id').val();
    $.ajax
    ({
        type:"post",
        datatype:"json",
        data:{"menu_id":menu_id,"web_menu_type":$('#web_menu_type').val()},
        url:base_url+"main/get_list",
        success:function(result)// 请求成功时的回调函数。
        {
            var str="";
            var banner="";
            $.each(result.contents,function(i,n)
            {
                str = str + "<div class='list clearfix'>";
                str = str + "<a href='"+base_url+"main/detail/"+web_menu_type+"/"+n.product_id+"'>";
                str = str + "<div class='list-pic'>";
                str = str + "<img src='"+n.product_thumb+"' alt='列表缩略图'>";
                str = str + "</div>";
                str = str + "<div class='list-content'>";
                str = str + "<h3 class='list-tit word-nowrap'>"+n.product_title+"</h3>";
                str = str + "<p class='list-tips'><span class='list-red'>￥"+n.current_price+"</span><span class='list-date'>"+n.start_time+"</span></p>";
                str = str + "<p class='list-brief words-nowrap'>"+n.product_description+"</p>";
                str = str + "</div></a></div>";
            });
            
            $.each(result.banners,function(i,n)
            {
                //alert("索引:"+i+"对应值为："+n.product_title);
                if(n.link_id>0){
                    banner = banner + "<a href='"+base_url+"main/detail/"+n.banner_type+"/"+n.link_id+"'><img style='width:1201px;height:208px;' src='"+n.banner_image+"' ></a>"
                }else{
                    banner = banner + "<img style='width:1201px;height:208px;' src='"+n.banner_image+"' >"
                }
                
            });
            
            $("#content").html(str);
            $("#banner").html(banner);
        },
        error:function(error)// 请求失败时的回调函数。
        {
            console.log(error);
            return;
        }
    });
    $(document).on("mouseenter",'.list',function(){
        $(this).children().children("div.list-content").css("bottom","0");
    });
    $(document).on("mouseleave",'.list',function(){
        $(this).children().children("div.list-content").css("bottom","-60px");
    });
});