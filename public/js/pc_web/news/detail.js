$(document).ready(function () {
   $.ajax
    ({
        type:"post",
        datatype:"json",
        data:{"detail_type":$('#detail_type').val(),"detail_id":$('#detail_id').val(),"is_preview":$('#is_preview').val()},
        url:base_url+"main/get_detail",
        success:function(result)// 请求成功时的回调函数。
        {
            $('#title').html(result.content.title);
            $('#brief').html(result.content.brief);
            $('#main_img').attr('src',result.content.main_img);
            $('#des').html(result.content.desc);
        },
        error:function(error)// 请求失败时的回调函数。
        {
            console.log(error);
            return;
        }
    });
});