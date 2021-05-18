var idPersona;
var primeraFila;
var idMascota;

$(function(){

    primeraFila = $('#primeraFila');
    /**obtenemos la variable idPersona que se asgino a un input type(hidden) obtenida de la variable de session idPersona */
    idPersona = $('#idPersona').val();

    listarMascotas(idPersona);

    /**///////////////////////////////////////////////////////////////////// */
    $('#btn_abrirModalAgregar').click(function(){

        abrirModalAgregarMascota();
    }); 
    /**///////////////////////////////////////////////////////////////////// */

    $('#btn_agregar').click(function(){

        agregarMascota();
    });

    /**////////////////////////////////////////////////////////////////////// */

    $('#btn_cancelar').click(function(){

        limpiar();
    });

    /**////////////////////////////////////////////////////////////////////// */
    $('#btn_actualizarA').click(()=>{

        if($('#txt_nombreMascotaA').val() == '' || $('#cb_tipoMascotaA').val() == '0' || $('#txt_fechaNacimientoA').val() == ''){
            
            alertaCamposVacios();

        }else{
            
            actualizarDatosMascota();
        }
    });

});

function listarMascotas(idPersona){

    var parametros = {
        accion:'listarMascotas',
        idPersona: idPersona
    };

    $.ajax({
        url:'../../../controlador/clienteControl.php',
        data: parametros,
        dataType:'json',
        type:'post',
        cache: 'false',

        success: function(resultado){

            $.each(resultado.datos, function(j, dato){

                $('#txt_id').html(dato.idMascota);
                $('#txt_nombre').html(dato.masNombre);
                $('#txt_raza').html(dato.tipoCategoria);
                $('#txt_edad').html(dato.masEdad);
                $('#btn_actualizar').attr('onclick', 'abrirModalActualizar('+dato.idMascota+')');
                $('#btn_eliminar').attr('onclick', 'abrirModalEliminar('+dato.idMascota+')');

                $('#tbl_mascotas tbody').append(primeraFila.clone(true).attr('class', 'otraFila'));

            });

            $('#tbl_mascotas tbody tr').first().remove();
        },
        error:function(e){

        }
    });

}

function abrirModalActualizar(id){
    idMascota = id;
    listarTipoMascotaA();
    listarDatosMascota(idMascota);
    $('#modalActualizarMascota').modal();
}

function listarDatosMascota(idMascota){

    var parametros = {
        accion:'listarDatosMascota',
        idMascota: idMascota
    };

    $.ajax({
        url:'../../../controlador/mascotaControl.php',
        data: parametros,
        dataType:'json',
        type:'POST',
        cache:'false',

        success: function(resultado){

            console.log(resultado);

            $.each(resultado.datos, (j, dato)=>{

                $('#txt_nombreMascotaA').val(dato.masNombre);
                $('#cb_tipoMascotaA').val(dato.idTipoMascota);
                $('#txt_fechaNacimientoA').val(dato.masFechaNacimiento);
            });

        },
        error: function(e){

            console.log(e.responseText);
        }   
    });
}

function actualizarDatosMascota(){

    /**se saca solo el ano de la fecha ingresada */
    var fecha = document.getElementById('txt_fechaNacimientoA').value;
    var year = fecha.toString().substr(0,4);
    
    var parametros = {
        accion:'actualizarDatosMascota',
        idMascota: idMascota,
        nombre: $('#txt_nombreMascotaA').val(),
        tipoMascota: $('#cb_tipoMascotaA').val(),
        fechaNacimiento: fecha,
        año: year
    };

    $.ajax({
        url:'../../../controlador/mascotaControl.php',
        data: parametros,
        dataType:'json',
        type:'post',
        cache:'false',

        success: function(resultado){

            console.log(resultado);
            Swal.fire({
                icon:'success',
                title:'Bien hecho!',
                text:'Se actualizaron los datos correctamente.!',
                confirmButtonText: "Aceptar",
    customClass: {
      confirmButton: 'btnAceptar'
    },
            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.reload();
                };
            });
        },
        error:function(e){

            console.log(e.responseText);
        }
    });
}

function abrirModalEliminar(id){

    idMascota = id;

    Swal.fire({
        title:'Avertencia!',
        text:'Estas seguro de eliminar esta mascota?',
        icon:'question',
        showCancelButton: true,
        confirmButtonText:'Si',
        cancelButtonText: "No",
    customClass: {
      confirmButton: 'btnAceptar',
      cancelButton: 'btnCancelar'
    },
    }).then((result)=>{
        if(result.isConfirmed){
            eliminarMascota();
            Swal.fire('Se ha eliminado la mascota con exito', '', 'success');
            window.location.reload();
        }
    });
    
}

function eliminarMascota(){

    var parametros = {
        accion:'eliminarMascota',
        idMascota: idMascota
    };

    $.ajax({
        url:'../../../controlador/mascotaControl.php',
        data: parametros,
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

function abrirModalAgregarMascota(){

    listarTipoMascota();
    $("#modalAgregarMascota").modal();
}

function listarTipoMascota(){

    $('.otro').remove();
    
    var parametros = {
        accion: 'ListarTM'
    };

    $.ajax({
        url:'../../../controlador/tipoMascotaControl.php',
        data: parametros,
        dataType:'json',
        type:'post', 
        cache:'false',

        success: function(resultado){

            console.log(resultado);

            $.each(resultado.datos, function(j, dato){

                var opcion = document.createElement('option');
                opcion.value = dato.idTipoMascota;
                opcion.text = dato.tipoCategoria;
                opcion.setAttribute('class', 'otro');
                $('#cb_tipoMascota').append(opcion);
            });

        },
        error: function(e){

            console.log(e.responseText);
        }
    });
}
function listarTipoMascotaA(){

    $('.otro').remove();
    
    var parametros = {
        accion: 'ListarTM'
    };

    $.ajax({
        url:'../../../controlador/tipoMascotaControl.php',
        data: parametros,
        dataType:'json',
        type:'post', 
        cache:'false',

        success: function(resultado){

            console.log(resultado);

            $.each(resultado.datos, function(j, dato){

                var opcion = document.createElement('option');
                opcion.value = dato.idTipoMascota;
                opcion.text = dato.tipoCategoria;
                opcion.setAttribute('class', 'otro');
                $('#cb_tipoMascotaA').append(opcion);
            });

        },
        error: function(e){

            console.log(e.responseText);
        }
    });
}

function agregarMascota(){

    /**se saca solo el ano de la fecha ingresada */
    var fecha = document.getElementById('txt_fechaNacimiento').value;
    var year = fecha.toString().substr(0,4);

    var nombre = $('#txt_nombreMascota').val();
    var tipoMascota = $('#cb_tipoMascota').val();
    
    if(nombre == '' || tipoMascota == '0' || fecha == ''){
        
        alertaCamposVacios();

    }else if(buscarCe(nombre) == true){

        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Los nombres no pueden tener caracteres especiales.',
            confirmButtonText:'Aceptar',
            customClass:{
                confirmButton:'btnAceptar'
            }
          });
          
    }else{
        
        var parametros = {

            accion:'AgregarMascota',
            idPersona:idPersona,
            nombreMascota: nombre,
            tipoMascota: tipoMascota,
            año: year,
            fechaNacimientoMascota: fecha
        };
    
        $.ajax({
            url:'../../../controlador/clienteControl.php',
            data:parametros,
            dataType:'json',
            type:'post',
            cache:'false',
    
            success: function(resultado){
    
                console.log(resultado);
    
                Swal.fire({
                    icon:'success',
                    title:'Bien Hecho!',
                    text:'Se ha registrado tu mascota con exito.',
                    textButtonConfirm:'Ok'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                });
    
                limpiar();
                
            },
            error:function(e){
                console.log(e.responseText);
            }
        });
    }
}

function limpiar(){

    $('#txt_nombreMascota').val('');
    $('#cb_tipoMascota').val(0);
    $('#txt_fechaNacimiento').val('');
}