function comentable() {
    return true;
}
$('.comentar svg').click(function(){
    if(comentable()){
        $(this).children().toggleClass("svg-clicked");
        $(this).closest(".bar-wrapper").next().slideToggle(400);
    }
});
$(".reaction").css('max-height', $(".reaction").css('height'));

$(".reaction:not(.comentar):not(.report-svg) svg").click(function() {
    $(this).toggleClass("svg-clicked");
    $(this).children().toggleClass("svg-clicked");
});


