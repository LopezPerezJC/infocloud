$(document).ready(function(){

    $('#boton').on('click', function(){
        //$(this).addClass('naranja');
        //$(this).removeClass('boton');  //elimina el estilo

        $(this).toggleClass('naranja'); //si no tiene la clase naranja se la agrega y si no se la quita

       /* $(this).css({
            'height': '100px',
            'width': '100px'
        });  //el boton se hace mas pequeño*/  //este codigo no es correcto es css
    });
});