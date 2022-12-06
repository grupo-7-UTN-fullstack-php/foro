function cambiarColor(objeto, color){
    objeto.css("color",color);
}
function devolverColor(objeto){
    objeto.css("color",objeto.parent().css("color"));
}
function RGBtoArray(color){
    return color.match(/[0-9]/g);
}
function colorAlpha(color,alpha){
    let nuevoColor = color.slice(0,-1);
    return nuevoColor + "," + alpha + ")";
}

function irAPost(elemento){
    const id = elemento.closest('.post-wrapper').attr('id-publicacion');
    window.location = "post/"+id;
}
function comentable() {
    return false;
}

$('*').filter(function () {
    return $(this).css('cursor') == 'pointer';
}).click(function(){
   irAPost($(this));
});
$('.comentar').click(function(){
    irAPost($(this));
})
