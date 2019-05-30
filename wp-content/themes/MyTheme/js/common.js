$(document).ready(function() {

    $(".section_content ul li").each(function(i) {
        $(this).find("a").attr("href", "#news_" + i);
        $(this).find(".news_block").attr("id", "news_" + i);
    });
    
    // $(".popup").magnificPopup({type:"image"});
    $(".popup_content").magnificPopup({type:"inline", midClick: true});


    
});
