$(document).ready(function () 
{
    //菜单点击后
    var menu_id = $('#menu_id').val();
    var current_url = base_url+"main/lists/"+menu_id;
    
    $(".header_menu").each(function(){
		var menu_url = $(this).children('a').attr('href');
        if(menu_url == current_url){
            $(".header_menu").removeClass("active");
            $(this).addClass("active");
        }
	})
});