function comentable() {
    return true;
}
let isClicked = false
$('.comentar').click(function(){
    if(comentable())
        if(isClicked)
            $(this).closest('.bar-wrapper').next().css('display', 'none');
        else
            $(this).closest('.bar-wrapper').next().css('display', 'flex');
        isClicked = !isClicked;
});
