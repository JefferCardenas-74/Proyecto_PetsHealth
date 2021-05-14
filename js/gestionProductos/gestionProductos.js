var primeraFila;
var idProducto;

$(function(){
    /**se obtiene toda la etiqueta del primer tr de la tabla */
    primeraFila = $('#primeraFila');
    /**funcion que lista todos los productos */
    listarProductos();

    /**evento que ejecuta unja funcion para agregar un producto */
    $('#btn_modalAgregar').click(function(){

        abrirModalAgregar();

    });

});

function listarProductos(){

    $('.otraFila').remove();
    $('#tbl_productos').append(primeraFila);

    var parametros = {
        accion: 'listarProductos'
    };

    $.ajax({
        url: '../../../controlador/productoControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function(resultado){

            console.log(resultado);

            $.each(resultado.datos, function(j, dato){
                
                $('#nombre').html(dato.proNombre);
                $('#precio').html(dato.proPrecio);
                $('#unidad').html(dato.proUnidadMedida);
                $('#btn_actualizar').attr('onclick', 'modalActualizar('+dato.idProducto+')');
                $('#btn_eliminar').attr('onclick', 'modalEliminar('+dato.idProducto+')');

                $('#tbl_productos tbody').append(primeraFila.clone(true).attr('class','otraFila'));

            }); 

            $('#tbl_productos tbody tr').first().remove();

            $('#tbl_productos').DataTable({

                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
                    // cambiar el texto del boton de copiar
                    buttons: {
                        copyTitle: "Datos copiados",
                        copySuccess: {
                            _: "%d Registros copiados al portapapeles",
                        },
                    },
                },
                responsive: true,
                // decir que botones mostrar en posicion el dom (Blfrtip)
                // fBrtlp       dom: 'Bfrtip', Se configura manualmente
                dom: '<"row"<"col-sm-12 col-md-4"l><"text-center col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                //  configurar la cantidad de filas que mostrara  la tabla
                lengthMenu: [[5, 25, 50, -1],
                ['5 Filas ', '25 Filas', '50 Filas ', ' Mostrar todo ']],
                // arreglo con los botones y su personalizacion
                buttons:
                    [
                        {
                            extend: "copy",
                            text: '<i class="fas fa-copy"></i>',
                            titleAttr: "copiar",
                            className: "btn btn-warning",
                        },
                        
                        {
                            extend: "excelHtml5",
                            text: '<i class="fas fa-file-excel"></i>',
                            titleAttr: "Exportar a excel",
                            className: "btn btn-success",
                        },
                        {
                            extend: "print",
                            text: '<i class="fas fa-print"></i>',
                            titleAttr: "Imprimir",
                            className: "btn btn-primary",
                        },
                        {
                            text: '<i class="fas fa-file-pdf"></i>',
                            extend: "pdfHtml5",
                            title: "Datos de los empleados",
                            titleAttr: "Exportar a pdf",
                            className: "btn btn-danger",
                        },
                        {
                            extend: "csvHtml5",
                            text: '<i class="fas fa-file-csv"></i>',
                            titleAttr: "Exportar a CSV",
                            className: "btn btn-info",
                        }
                    ]
            });
            
        },
        error: function(e){

        }
    });

}

function abrirModalAgregar(){

    $('#mdl_agregar').modal();
    
    $('#btn_agregar').click(function(){
        
        agregarProducto();
    });

}

function agregarProducto(){

    if($('#txt_nombre').val() == '' || $('#txt_precio').val() == '' || $('#cb_unidad').val() == 0){

        alertaCamposVacios();

    }else{

        var precio = $('#txt_precio').val();
        var precioParseado = precio.replace('.','');

        var parametros = {
            accion: 'agregarProducto',
    
            nombre: $('#txt_nombre').val(),
            precio: parseInt(precioParseado),
            unidad: $('#cb_unidad').val()
        };

        
    
        $.ajax({
    
            url: '../../../controlador/productoControl.php',
            data: parametros,
            dataType: 'json',
            type: 'post',
            cache: false,
    
            success: function(resultado){
    
                console.log(resultado.mensaje);

                Swal.fire({
                    icon: 'success',
                    title: 'Muy bien',
                    text: resultado.mensaje,
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        confirmButton: 'btnAceptar'
                      } 
                });

                limpiar();
                window.location.reload();
                
            },
            error: function(e){

                console.log(e);
            }
        });
    }
}

function limpiar(){

    $('#txt_nombre').val('');
    $('#txt_precio').val('');
    $('#cb_unidad').val(0);
}

function modalActualizar(id){

    idProducto = id;  
    listarDatosProducto();
    $('#mdl_actualizar').modal();
}

function listarDatosProducto(){

    var parametros = {
        accion: 'listarDatosProducto',
        idProducto: idProducto
    };

    $.ajax({
        url:'../../../controlador/productoControl.php',
        data:parametros,
        dataType:'json',
        type:'post',
        cache:'false',

        success:function(resultado){
            console.log(resultado);

            $.each(resultado.datos, function(j, dato){
                
                $('#txt_nombreA').val(dato.proNombre);
                $('#txt_precioA').val(dato.proPrecio);
                $('#cb_unidadA').val(dato.proUnidadMedida);
            });

            $('#btn_actualizarM').click(function(){
            
                actualizarDatosProducto(idProducto);

            });
        },
        error:function(e){
            console.log('ERROR');
        }
    });
}

function actualizarDatosProducto(id){

    var parametros = {

        nombre: $('#txt_nombreA').val(),
        precio: $('#txt_precioA').val(),
        unidad: $('#cb_unidadA').val(),
        accion: 'actualizarDatosProducto',
        idProducto: id
    };

    $.ajax({

        url: '../../../controlador/productoControl.php',
        data:parametros,
        dataType:'json',
        type: 'post',
        cache: false,

        success: function(resultado){

            console.log(resultado);

            Swal.fire({
                icon: 'success',
                title: 'Muy bien',
                text: 'Se actualizaron los datos correctamente',
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'btnAceptar'
                  } 
            });

            window.location.reload();

        },
        error:function(e){

            alertaError();
            console.log(e.responseText);
            
        }
    });
}

function modalEliminar(id){

    idProducto = id;   
    
    Swal.fire({
        title:'Deseas eliminar este producto?',
        icon:'question',
        showCancelButton: true,
        confirmButtonText:'Si',
        cancelButtonText:'No',
        customClass: {
            confirmButton: 'btnAceptar',
            cancelButton: 'btnCancelar',
        }

    }).then((result) => {

        if(result.isConfirmed){
            eliminarProducto();
            window.location.reload();
        }
    });

}

function eliminarProducto(){

    var parametros = {

        accion: 'eliminarProducto',
        idProducto: idProducto
    };

    $.ajax({

        url:'../../../controlador/productoControl.php',
        data:parametros,
        dataType: 'json',
        type:'post',
        cache:'false',

        success: function(resultado){

            console.log(resultado);
        },
        error:function(e){

            console.log(e.responseText);
        }
    });

}

