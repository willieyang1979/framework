$(document).ready(function () {

    $( "div.main" ).on( "mousemove", ".listround .news", function() {
        $(this).children('a').children('.news_content').css("visibility","visible");
    });
    $( "div.main" ).on( "mouseleave", ".listround .news", function() {
        $(this).children('a').children('.news_content').css("visibility","hidden");
    });

});