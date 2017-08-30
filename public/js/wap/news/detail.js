$(document).ready(function () {
   $.ajax
    ({
        type:"post",
        datatype:"json",
        data:{"detail_type":$('#detail_type').val(),"detail_id":$('#detail_id').val(),"is_preview":$('#is_preview').val()},
        url:base_url+"main/get_detail",
        success:function(result)// 请求成功时的回调函数。
        {
            var str="";
            str = str + result.content.title+"<br>";
            
           
            $("#detail_info").html(str);
        },
        error:function(error)// 请求失败时的回调函数。
        {
            console.log(error);
            return;
        }
    });
});