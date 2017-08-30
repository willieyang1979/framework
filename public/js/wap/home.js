$(document).ready(function () {
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
            var news_str="";
            var article_str="";
            var product_str="";
            $.each(result.banners,function(i,n)
            {
                //alert("索引:"+i+"对应值为："+n.product_title);
                banner_str = banner_str + '<img style="height:100px;width:100px" src="'+n.banner_image+'" ><br>'
            });
            $.each(result.news,function(i,n)
            {
                //alert("索引:"+i+"对应值为："+n.product_title);
                news_str = news_str + "<a href='"+base_url+"main/detail/1/"+n.LID+"'>"+n.title+"</a><br>";
            });
            $.each(result.articles,function(i,n)
            {
                //alert("索引:"+i+"对应值为："+n.product_title);
                article_str = article_str + "<a href='"+base_url+"main/detail/2/"+n.article_id+"'>"+n.article_title+"</a><br>";
            });
            $.each(result.products,function(i,n)
            {
                //alert("索引:"+i+"对应值为："+n.product_title);
                product_str = product_str + "<a href='"+base_url+"main/detail/3/"+n.product_id+"'>"+n.product_title+"</a><br>";
            });
            $("#banners").html(banner_str);
            $("#news").html(news_str);
            $("#articles").html(article_str);
            $("#products").html(product_str);
        },
        error:function(error)// 请求失败时的回调函数。
        {
            console.log(error);
            return;
        }
    });
});