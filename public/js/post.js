$(function(){
    $('.contenido').html(function(){
        const regex = /(\{\{img:.+}})/g;
        let contenidoPost = $(this).html().split(regex);
        console.log(contenidoPost);
        let htmlFinal = "";
        contenidoPost.forEach(function(str){
            console.log('[ '+str+' ],');
            if(regex.test(str)){
                htmlFinal = htmlFinal + '<img src="'+ /{{img:(.*)}}/g.exec(str)[1] +'" alt=""/>'
            }
            else{
                htmlFinal = htmlFinal + str;
            }
        })

        return htmlFinal;
        });
});
