var primerCampo;

$(function(){

    primerCampo = $('#primerCampo');

    /*evento escucha para activarl el modal */
    $('.btn_atender').click(function(){
        $('#atenderCita').modal();
    });

    /** dinamismo del formulario atender citas*/
    $("#chk_dueño").click(function(){

        $('.encargado').css("display", "none");
        $('.domicilio').css("display", "none");
    });

    $('#chk_empleado').focus(function(){

        $('.domicilio').css("display", "block");
        $('.encargado').css("display", "block");
    });

    $('#chk_otro').focus(function(){

        $('.encargado').css("display", "block");
        $('.domicilio').css("display", "none");
    });

    /**------------------------------------------ */

    /*buscar productos*/

    $('#txt_buscadorProductos').keyup(function(){

       let x = $('#txt_buscadorProductos').val();
       buscarProducto();
    });
});

function buscarProducto(){

    $('.otroCampo').remove();
    $('#listaDatos').append(primerCampo);

    var parametros = {
        accion: 'buscarProducto',
        busqueda: $('#txt_buscadorProductos').val(),
    }

    $.ajax({

        url:'../../controlador/productoControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function(resultado){

            console.log(resultado.datos);

            $.each(resultado.datos, function(j, dato){

                if($('#listaDatos').css('display', 'none')){

                    $('#listaDatos').css('display', 'block');
                    $('#dato1').html(dato.proNombre);
                    $('#listaDatos').append(primerCampo.clone(true).attr('class', 'otroCampo'));
                }
            });
            
            $('.primerCampo').remove();

        },

        error: function(ex){

         
        }


    });
}