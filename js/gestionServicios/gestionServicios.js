var primeraFila;
var idServicio;

$(function(){
    /**se obtiene toda la etiqueta del primer tr de la tabla */
    primeraFila = $('#primeraFila');
    /**funcion que lista todos los productos */
    listarServicios();

    /**evento que ejecuta unja funcion para agregar un producto */
    $("#btn_modalAgregarServicio").click(function () {
        abrirModalAgregar();

    });

});

function listarServicios(){

    $('.otraFila').remove();
    $('#tbl_servicios').append(primeraFila);

    var parametros = {
        accion: 'listarServicios'
    };

    $.ajax({
        url: '../../../controlador/servicioControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function(resultado){

            console.log(resultado);

            $.each(resultado.datos, function(j, dato){
                
                $('#tipo').html(dato.serTipo);
                $('#descripcion').html(dato.serDescripcion);
                $('#precio').html(dato.serPrecio);  
                $('#btn_actualizar').attr('onclick', 'modalActualizar('+dato.idServicio+')');
                $('#btn_eliminar').attr('onclick', 'modalEliminar('+dato.idServicio+')');

                $('#tbl_servicios tbody').append(primeraFila.clone(true).attr('class','otraFila'));

            }); 

            $('#tbl_servicios tbody tr').first().remove();

            $('#tbl_servicios').DataTable({

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
        agregarServicio();
    });

}

function agregarServicio(){

    var tipo = $('#txt_tipo').val();
    var descripcion = $('#txt_descripcion').val();
    var precio = $('#txt_precio').val();

    if(tipo == '' || descripcion == '' || precio == ''){

        alertaCamposVacios();

    }else if(buscarCe(tipo) == true ||
            buscarCe(descripcion) == true ||
            buscarCe(precio) == true){
        
        Swal.fire({
            icon:'warning',
            title:'Advertencia',
            text:'El campo nombre no puede tene caracteres especiales.',
            confirmButtonText:'Aceptar',
            customClass:{
                confirmButton:'btnAceptar'
            }
        });

    }else{

        var precio = $('#txt_precio').val();
        var precioParseado = precio.replace('.','')

        var parametros = {
            accion: 'agregarServicio',

            tipo: $('#txt_tipo').val(),
            descripcion: $('#txt_descripcion').val(),
            precio: parseInt(precioParseado),
        };
    
        $.ajax({
    
            url: '../../../controlador/servicioControl.php',
            data: parametros,
            dataType: 'json',
            type: 'post',
            cache: false,
    
            success: function(resultado){
            
                if(resultado.estado){
                    Swal.fire({
                        icon: 'success',
                        title: 'Agregado',
                        text: resultado.mensaje,
                        confirmButtonText: 'Aceptar',
                        customClass: {
                            confirmButton: 'btnAceptar',
                            cancelButton: 'btnCancelar',
                        }
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location.reload();
                            limpiar(); 
                        }  
                    })

                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops..',
                        text: 'No se pudo agregar los datos.',
                        confirmButtonText: 'Aceptar',
                        customClass: {
                            confirmButton: 'btnAceptar',
                            cancelButton: 'btnCancelar',
                        }
                    }).then((result)=>{
                        if(result.isConfirmed){
                            limpiar(); 
                        }  
                    })
                }

            },

            error: function(e){


                console.log(e);
            }
        });
    }
}



function limpiar(){

    $('#txt_tipo').val('');
    $('#txt_descripcion').val('');
    $('#txt_precio').val('');
}

function modalActualizar(id){

    idServicio = id;  
    listarDatosServicio();
    $('#mdl_actualizar').modal();
}

function listarDatosServicio(){

    var parametros = {
        accion: 'listarDatosServicio',
        idServicio: idServicio
    };

    $.ajax({
        url:'../../../controlador/servicioControl.php',
        data:parametros,
        dataType:'json',
        type:'post',
        cache:'false',

        success:function(resultado){
            console.log(resultado);

            $.each(resultado.datos, function(j, dato){
                
                $('#txt_tipoA').val(dato.serTipo);
                $('#txt_descripcionA').val(dato.serDescripcion);
                $('#txt_precioA').val(dato.serPrecio);
            });

            $('#btn_actualizarM').click(function(){

                var tipo = $('#txt_tipo').val();
                var descripcion = $('#txt_descripcion').val();
                var precio = $('#txt_precio').val();
            
                if(tipo == '' || descripcion == '' || precio == ''){

                    alertaCamposVacios();

                }else if(buscarCe(tipo) == true ||
                         buscarCe(descripcion) == true ||
                         buscarCe(precio) == true){
                    
                    Swal.fire({
                        icon:'warning',
                        title:'Advertencia',
                        text:'El campo nombre no puede tene caracteres especiales.',
                        confirmButtonText:'Aceptar',
                        customClass:{
                            confirmButton:'btnAceptar'
                        }
                    });

                }else{
                actualizarDatosServicio(idServicio);
                }

            });
        },
        error:function(e){
            console.log('ERROR');
        }
    });
}

function actualizarDatosServicio(id){

    var parametros = {

        tipo: $('#txt_tipoA').val(),
        descripcion: $('#txt_descripcionA').val(),
        precio: $('#txt_precioA').val(),
        accion: 'actualizarDatosServicio',
        idServicio: id
    };

    $.ajax({

        url: '../../../controlador/servicioControl.php',
        data:parametros,
        dataType:'json',
        type: 'post',
        cache: false,

        success: function(resultado){

            console.log(resultado);

            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Se actualizaron los datos correctamente',
                confirmButtonText: 'ok' 

            }).then((result)=>{
            if(result.isConfirmed){
                window.location.reload();
                limpiar(); 
            }
               
        })

        },
        error:function(e){

            Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: 'No se pudo actualizar los datos.',
                confirmButtonText: 'ok' 
            });
            console.log(e.responseText);
            
        }
    });
}

function modalEliminar(id){

    idServicio = id;   
    
    Swal.fire({
        title:'Deseas eliminar este servicio?',
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
    
            eliminarServicio();


            Swal.fire({
                icon: 'success',
                title: 'Eliminado!',
                text: 'Acabas de eliminar un servicio de la base de datos',
                confirmButtonText: 'ok' ,
                customClass: {
                    confirmButton: 'btnAceptar',
                    cancelButton: 'btnCancelar',
                }

            }).then((result)=>{
            if(result.isConfirmed){
                window.location.reload();
            }
               
        })

        }
    });

}

function eliminarServicio(){

    var parametros = {

        accion: 'eliminarServicio',
        idServicio: idServicio
    };

    $.ajax({

        url:'../../../controlador/servicioControl.php',
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
