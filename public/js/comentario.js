$('.comentar svg').click(function(){
    $(this).closest(".bar-wrapper").next().slideToggle(400);
});
$(".reaction").css('max-height', $(".reaction").css('height'));

$(".reaction svg").click(function() {
    $(this).children().toggleClass("svg-clicked");
});
