

function urlValoracion(idValoracion, publicacion, idPublicacion){
    return urlValoracionBase()
        .replace("_idValoracion",idValoracion)
        .replace("_publicacion",publicacion)
        .replace("_idPublicacion",idPublicacion);
}

function actualizarValoracion(elementoJquery, cantidad){
    elementoJquery.find('.cantidad').html((cantidad==null || cantidad === undefined) ? 0 : cantidad);
}

function publicacionAsociada(elementoJquery){
    return elementoJquery.closest('.publicacion');
}

function incrementarValoracion(reactionJQuery){
    cantidadActual = parseInt(reactionJQuery.find('.cantidad').html(),10);
    reactionJQuery.find('.cantidad').html(cantidadActual+1);
}

function decrementarValoracion(reactionJQuery){
    cantidadActual = parseInt(reactionJQuery.find('.cantidad').html(),10);
    reactionJQuery.find('.cantidad').html(cantidadActual-1);
}
$(".like svg").click(function() {
    const id = parseInt($( publicacionAsociada($(this)) ).attr('id-publicacion'), 10);
    const publicacion = ($(this).parents('.comentario-wrapper').length == 0) ? 'post' : 'comentario';
    const parent = $($(this).parent());
    let method;


    if($(this).children('.svg-clicked').length != 0){
        method = 'DELETE';
        decrementarValoracion(parent);
    }
    else{
        method = 'POST';
        incrementarValoracion(parent)
    }

    const idValoracion = 1;
    const url = urlValoracion(idValoracion,publicacion,id);

    //const mensaje = method + " " + publicacion;

    $.ajax({
        type: method,
        url: url,
        data: {idValoracion:idValoracion, publicacion:publicacion, id:id },
        success: function (response) {
            //console.log("respuesta: "+response);
            //alert(mensaje+" cantidad: "+response.toString());

        }
    });

});

$(".report-svg > svg").attr('data-bs-toggle',"modal").attr('data-bs-target',"#reporte").click(function(){
    publicacion = publicacionAsociada($(this));
    tipoPublicacion = ($(publicacion).hasClass("post-wrapper")) ? "post" : "comentario";
    idPublicacion = $(publicacion).attr("id-publicacion");
    idAutor = $($(publicacion).find(".autor")).attr("idAutor");

    $("#reporte-tipo-publicacion").attr("value",tipoPublicacion);
    $("#reporte-id-publicacion").attr("value",idPublicacion);
    $("#reporte-usuario-autor").attr("value",idAutor);
});


