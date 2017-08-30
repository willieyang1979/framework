$(document).ready(function () {

    $( "div.main" ).on( "mousemove", ".irregular .news", function() {
        $(this).children('a').children('.news_content').show();
    });
    $( "div.main" ).on( "mouseleave", ".irregular .news", function() {
        $(this).children('a').children('.news_content').hide();
    });

});