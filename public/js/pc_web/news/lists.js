$(document).ready(function () {
   var web_menu_type = $('#web_menu_type').val();
   var menu_id = $('#menu_id').val();
   $.ajax
    ({
        type:"post",
        datatype:"json",
        data:{"menu_id":menu_id,"web_menu_type":web_menu_type},
        url:base_url+"main/get_list",
        success:function(result)// 请求成功时的回调函数。
        {
            var str="";
            var banner="";
            $.each(result.contents,function(i,n)
            {
                str = str + "<div class='list clearfix'>";
                str = str + "<a href='"+base_url+"main/detail/"+web_menu_type+"/"+n.LID+"'>";
                str = str + "<div class='list-pic'>";
                str = str + "<img style='width:260px;height:150px;' src='"+n.pic+"' alt='列表缩略图'>";
                str = str + "</div>";
                str = str + "<div class='list-content'>";
                str = str + "<h3 class='list-tit words-nowrap'>"+n.title+"</h3>";
                str = str + "<p class='list-brief word-nowrap'>"+n.brief+"</p>";
                str = str + "<span class='list-date'>"+n.stime+"</span>";
                str = str + "</div></a></div>";
            });
            $.each(result.banners,function(i,n)
            {
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
});