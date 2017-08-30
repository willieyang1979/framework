$(document).ready(function () 
{
    $("#home_page").removeClass();
    $("#internet_dynamic").removeClass();
    $("#special_report").removeClass();
    $("#home_page").removeClass();
    switch(current_url)
    {
        case "":
        case "industrial/home_page":// 首页。
            $("#home_page").addClass("nav_active");
            break;
        case "industrial/internet_dynamic":
            $("#internet_dynamic").addClass("nav_active");
            break;
        case "industrial/special_report":
            $("#special_report").addClass("nav_active");
            break;
        case "industrial/frontier_technology":
            $("#frontier_technology").addClass("nav_active");
            break;
        default:
            break;
    }
});