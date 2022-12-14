$(".notificacion svg").click(function() {
    $(this).toggleClass("svg-clicked");
    $(this).children().toggleClass("svg-clicked");
});
$('.notificacion svg').attr('data-bs-toggle','dropdown').attr('data-bs-display','static').attr('aria-expanded','false');
