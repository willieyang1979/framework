/*根据不同样式制作不同款型*/
function product_data(style,val){   
    var str = "";
    /*irregular style*/
    if(style=='irregular'){
        str = str + '<div class="news clearfix"><a href="'+base_url+'main/detail/3/'+val.product_id+'">';
        str = str + '<div class="news_pic">';
        str = str + '<img src="'+val.product_thumb+'" alt="">';
        str = str + '</div>';
        str = str + '<div class="news_content" name="news_content">';
        str = str + '<h3 class="news_tit">'+val.product_title+'</h3>';
        str = str + '<p class="news_brief word-nowrap">'+val.product_description+'</p>';
        str = str + '<span class="news_date">'+val.created_time+'</span>';
        str = str + '</div></a></div>';
    }
    /*list2 style*/
    if(style=='list2'){
        str = str + '<div class="news clearfix"><a href="'+base_url+'main/detail/3/'+val.product_id+'">';
        str = str + '<div class="news_pic">';
        str = str + '<img src="'+val.product_thumb+'" alt="">';
        str = str + '</div>';
        str = str + '<div class="news_content" name="news_content">';
        str = str + '<h3 class="news_tit">'+val.product_title+'</h3>';
        str = str + '<p class="news_brief word-nowrap">'+val.product_description+'</p>';
        str = str + '<span class="news_date">'+val.created_time+'</span>';
        str = str + '</div></a></div>';
    }
    /*list4 style*/
    if(style=='list4'){
        str = str + '<div class="news clearfix"><a href="'+base_url+'main/detail/3/'+val.product_id+'">';
        str = str + '<div class="news_pic">';
        str = str + '<img src="'+val.product_thumb+'" alt="">';
        str = str + '</div>';
        str = str + '<div class="news_content" name="news_content">';
        str = str + '<h3 class="news_tit">'+val.product_title+'</h3>';
        str = str + '<p class="news_brief word-nowrap">'+val.product_description+'</p>';
        str = str + '<span class="news_date">'+val.created_time+'</span>';
        str = str + '</div></a></div>';
    }
    /*listround style*/
    if(style=='listround'){
        str = str + '<div class="news clearfix"><a href="'+base_url+'main/detail/3/'+val.product_id+'">';
        str = str + '<div class="news_pic">';
        str = str + '<img src="'+val.product_thumb+'" alt="">';
        str = str + '</div>';
        str = str + '<div class="news_content" name="news_content">';
        str = str + '<h3 class="news_tit">'+val.product_title+'</h3>';
        str = str + '<p class="news_brief word-nowrap">'+val.product_description+'</p>';
        str = str + '<span class="news_date">'+val.created_time+'</span>';
        str = str + '</div></a></div>';
    }
    /*single style*/
    if(style=='single'){
        str = str + '<div class="news clearfix"><a href="'+base_url+'main/detail/3/'+val.product_id+'">';
        str = str + '<div class="news_pic">';
        str = str + '<img src="'+val.product_thumb+'" alt="">';
        str = str + '</div>';
        str = str + '<div class="news_content" name="news_content">';
        str = str + '<h3 class="news_tit">'+val.product_title+'</h3>';
        str = str + '<p class="news_brief word-nowrap">'+val.product_description+'</p>';
        str = str + '<span class="news_date">'+val.created_time+'</span>';
        str = str + '</div></a></div>';
    }
    return str;
}