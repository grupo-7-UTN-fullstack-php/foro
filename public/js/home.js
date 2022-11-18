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

$(".titulo").hover(function(){
    cambiarColor($(this),"royalblue");
},
function(){
    devolverColor($(this));
});

$(".autor span").hover(function(){
        cambiarColor($(this),colorAlpha($(this).css("color"), 0.8));
        $(this).css("text-decoration","underline");
    },
    function(){
        devolverColor($(this));
        $(this).css("text-decoration","none");
    });

