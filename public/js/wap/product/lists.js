$(document).ready(function (){
    var web_menu_type = $('#web_menu_type').val();
    $.ajax
    ({
        type:"post",
        datatype:"json",
        data:{"menu_id":$('#menu_id').val()},
        url:base_url+"main/get_list",
        success:function(result)// 请求成功时的回调函数。
        {
            var str="";
            var banner="";
            $.each(result.contents,function(i,n)
            {
                //alert("索引:"+i+"对应值为："+n.product_title);
                str = str + "<a href='"+base_url+"main/detail/"+web_menu_type+"/"+n.product_id+"'>"+n.product_title+"</a><br>";
            });
            
            $.each(result.banners,function(i,n)
            {
                //alert("索引:"+i+"对应值为："+n.product_title);
                banner = banner + '<img style="height:100px;width:100px" src="'+n.banner_image+'" ><br>'
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