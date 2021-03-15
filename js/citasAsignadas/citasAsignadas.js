var primerCampo;
var primeraFila;

$(function(){

    primerCampo = $('#primerCampo');
    primeraFila = $('#primeraFila');

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
    //$('.otraFila').remove();
    $('#tbl_productos').append(primeraFila);

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

            /*algoritmo para mostrar los productos en un div dependiendo de la busqueda realizada */

            $.each(resultado.datos, function(j, dato){

                if($('#listaDatos').css('display', 'none')){

                    $('#listaDatos').css('display', 'block');
                    $('#dato1').html(dato.proNombre);
                    $('#idProducto').val(dato.idProducto);
                    $('#listaDatos').append(primerCampo.clone(true).attr('class', 'otroCampo'));
                }
            });
            
            $('.primerCampo').remove();

            /*arreglo de los producto seleccionados */
            var productos = new Array();

            /*algoritmo para agregar a una tabla los elementos seleccionados */
            $('.dato1').click(function(){

                var nombre = $(this).text();

                var producto = resultado.datos.find(producto => producto.proNombre == nombre);

                //console.log(producto);

                productos.push(producto);

                console.log(productos);

                console.log(productos.length);

                $.each(productos, function(j, dato){

                    $('#proNombre').html(dato.proNombre);
                    $('#proPrecio').html(dato.proPrecio);
                    $('#proUnidad').html(dato.proUnidadMedida);
                    $('#tbl_productos tbody').append(primeraFila.clone(true).attr('class', 'otraFila'));
                });

                //$('#tbl_productos tbody tr').first().remove();

            });

        },

        error: function(ex){

         
        }


    });
}