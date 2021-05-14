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

                responsive: true,

                language: {
                    processing:     "Traitement en cours...",
                    search:         "Buscar",
                    lengthMenu:    "Mostrar _MENU_ Elementos",
                    info:           "Mostrando de _START_ a _END_ de _TOTAL_ elementos",
                    infoEmpty:      "Mostrando de 0 a 0 de 0 elementos",
                    infoFiltered:   "(filtro de _MAX_ elementos en total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "No existe registro con ese nombre",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Premier",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Ultimo"
                    },
                    aria: {
                        sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
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

    if($('#txt_tipo').val() == '' || $('#txt_descripcion').val() == '' || $('#txt_precio').val() == ''){

        alertaCamposVacios();

    }else{

        var parametros = {
            accion: 'agregarServicio',

            tipo: $('#txt_tipo').val(),
            descripcion: $('#txt_descripcion').val(),
            precio: $('#txt_precio').val()
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
            
                actualizarDatosServicio(idServicio);

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
