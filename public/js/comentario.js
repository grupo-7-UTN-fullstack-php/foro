function comentable() {
    return true;
}
$('.comentar svg').click(function(){
    if(comentable())
        $(this).closest(".bar-wrapper").next().slideToggle(400);
});
$(".reaction").css('max-height', $(".reaction").css('height'));

$(".reaction:not(.comentar) svg").click(function() {
        $(this).children().toggleClass("svg-clicked");
});
$(".comentar svg").click(function() {
    if(comentable())
        $(this).children().toggleClass("svg-clicked");
});
