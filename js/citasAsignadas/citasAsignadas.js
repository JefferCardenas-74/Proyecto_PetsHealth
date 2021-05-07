var primerCampo;
var productoAgregado;
var primeraFila;
var idCita;
var idPersona;
var idEmpleado;
var idMascota;
var idServicio;
var precioServicio;

$(function () {
  primerCampo = $("#primerCampo");
  productoAgregado  = document.querySelector('.factura-items-container');
  primeraFila = $('#primeraFila');

  /**funcion para listar los tipos de citas */
  listarTipoCita();

  /**se obtiene el idPersona de la variable de sesion almacenada en un input type hidden*/
  idPersona = $('#idPersona').val();

  /**funcion para traerse el empleado que esta en la sesion usando la variable de sesion idPersona */
  obtenerEmpleado(idPersona);

  /** dinamismo del formulario atender citas*/

  /**al ejecutarse todos los campos de tipo encargado
   * estaran deshablilitados
   */
  $('.dueño').css('display', 'block');
  $('.empleado').css('display', 'none');
  $('.otro').css('display', 'none');

  /**se valida que opcion se selecciono para mostrar su respectivo campo */

  $("#chk_dueño").focus(function () {
    // $(".empleado").css("display", "none");
    $(".encargado").css("display", "none");
    // $(".domicilio").css("display", "none");
    $('.dueño').css('display', 'block');
  });

  $("#chk_empleado").focus(function () {
    $('.dueño').css('display', 'none');
    $(".encargado").css("display", "none");
    $(".domicilio").css("display", "block");
    $(".empleado").css("display", "block");
  });

  $("#chk_otro").focus(function () {
    $('.dueño').css('display', 'none');
    $(".empleado").css("display", "none");
    $(".domicilio").css("display", "none");
    $(".encargado").css("display", "block");
  });

  /**------------------------------------------ */
  /**cada vez que se digita una letra se hace una consulta a la base de datos */
    $("#txt_buscadorProductos").keyup(function () {
      let x = $("#txt_buscadorProductos").val();
      buscarProducto();
    });

  /**------------------------------------------- */

  /**se valida un click en cualquier parte de cuerpo para esconder la lista de datos */
  $('#atenderCita').click(function(){
    $('#listaDatos').css('display', 'none');
  });

  $('body').click(function(){
    $('#listaDatos').css('display', 'none');
  });

  /**al click se ejecuta una funcion que busca si existe un cliente*/
    $('#btn_buscar').click(function(){

      const cedula = $('#txt_cedula').val();
      buscarCliente(cedula);
      
    });

    /**boton que crear un arreglo de los productos usados y ejecuta una funcion para atender la cita */
    $('#btn_registrar').click(function(){

      /**se valida el formulario */
      if($('#txt_mascota').val() == '' || $('#txt_dueño').val() == '' || 
          $('#txt_tipoCita').val() == '' || $('#txt_observacion').val() == ''){

            Swal.fire({
              icon:'error',
              title:'Oops...!',
              text:'Debe validar todos los campos',
              textButtonText:'Ok',
            });

        }else{

          // alert(' se atiende');
          atenderCita();
        }
      
    });
    /***********************************************************************************************************/

}); 

function listarCitas(id){

  $('.otraFila').remove();
  $('#tbl_citas').append(primeraFila);

  var parametros = {

    accion:'listarCitas',
    idEmpleado: id
  };

  $.ajax({
    url:'../../../controlador/citaControl.php',
    data: parametros,
    dataType: 'json',
    type: 'get',
    cache: false,

    success: function(resultado){

      console.log(resultado.datos);

      $.each(resultado.datos, function(j, dato){
        $('#idCita').html(dato.idCita);
        $('#tipoCita').html(dato.serTipo);
        $('#solicitante').html(dato.perNombre);
        $('#fechaHora').html(dato.ciFecha);
        $('#btn_atender').attr('onclick', 'abrirModal('+dato.idCita+')');

        $('#tbl_citas tbody').append(primeraFila.clone(true).attr('class', 'otraFila'));

      });

      $('#tbl_citas tbody tr').first().remove();
    },
    error: function(e){

      console.log(e);
    }
  });
}

function abrirModal(id){

  idCita = id;
  console.log(idCita);
  mostrarDatosCita();
  $('#atenderCita').modal();
}

function mostrarDatosCita(){

  var parametros = {
    accion: 'datosCita',
    dato: idCita
  };

  $.ajax({
    url:'../../../controlador/citaControl.php',
    data: parametros,
    dataType: 'json',
    type: 'post',
    cache: false,

    success: function(resultado){

      console.log(resultado.datos);

      $.each(resultado.datos, function(j, dato){

        $('#txt_mascota').val(dato.masNombre);
        $('#txt_dueño').val(dato.perNombre);
        $('#txt_tipoCita').val(dato.serTipo);
        /**se obtien el id de las mascota para usarse a la hora de atender la cita */
        idMascota = dato.idMascota;
        idServicio = dato.idServicio;
        precioServicio = dato.serPrecio;
        idCita = dato.idCita;
      });

    },
    error: function(e){

      console.log(resultado.mensaje);

    }

  });


}
function buscarCliente(cedula){

  var cedulaNueva;

  let parametros = {
    accion:'buscarCliente',
    cedula: cedula
  };

  $.ajax({
    url:'../../../controlador/citaControl.php',
    data: parametros,
    type: 'post',
    dataType:'json',
    cache: false,

    success:function(resultado){

      console.log(resultado.datos);
      if(resultado.datos.length > 0){

        $.each(resultado.datos, function(j, dato){

          cedulaNueva = dato.perIdentificacion;
          $('#txt_encargado').val(dato.perNombre +' '+ dato.perApellido);

        }); 

        buscarMascotasPersona(cedulaNueva);

      }else{
          $('#registrarCliente').modal();
      }



    },
    error:function(e){

    }
  });

}

function buscarMascotasPersona(cedula){

  $('.opcion').remove();
  var parametros = {
    accion:'buscarMascotas',
    cedula: cedula
  };

  $.ajax({
    url: '../../../controlador/citaControl.php',
    data: parametros,
    dataType: 'json',
    type: 'post',
    cache: false,

    success: function(resultado){

      console.log(resultado);

      var mascotas = resultado.datos;

      $.each(mascotas, function(j, dato){

        const option = document.createElement('option');
        option.setAttribute('class', 'opcion');
        option.value = dato.idMascota;
        option.text = dato.masNombre;
        $('#cb_mascota').append(option);

      });
    },
    error: function(e){

    }
  });

}

function listarEmpleados(){

  $('.opcion').remove();

  var parametros = {
    accion: 'listarEmpleados'
  }

  $.ajax({
    url:'../../../controlador/citaControl.php',
    data: parametros,
    type:'post',
    dataType: 'json',
    cache: false,

    success: function(resultado){

      console.log(resultado.datos);

      $.each(resultado.datos, function(j, dato){
        const option = document.createElement('option');
        option.setAttribute('class', 'opcion');
        option.value = dato.idEmpleado;
        option.text = dato.perNombre +' '+ dato.perApellido;
        $('#cb_empleado').append(option);
      });
    },
    error:function(e){

    }
  });
}

function listarTipoCita(){

  var parametros = {
    accion: 'listarTipoCita'
  };

  $.ajax({
    url: '../../../controlador/citaControl.php',
    data: parametros,
    dataType: 'json',
    type: 'post',
    cache: false,

    success: function(resultado){

      console.log(resultado);

      $.each(resultado.datos, function(j, dato){
        const opcion = document.createElement('option');
        opcion.value = dato.idServicio;
        opcion.text = dato.serTipo;
        opcion.setAttribute('class', 'opcionCita');
        $('#cb_tipoCita').append(opcion);
      });

    },
    error: function(e){

    }
  });
}

function buscarProducto() {
  $(".otroCampo").remove();
  $("#listaDatos").append(primerCampo);


  var parametros = {
    accion: "buscarProducto",
    busqueda: $("#txt_buscadorProductos").val(),
  };

  $.ajax({
    url: "../../../controlador/productoControl.php",
    data: parametros,
    dataType: "json",
    type: "post",
    cache: false,

    success: function (resultado) {
      console.log(resultado.datos);

      /*algoritmo para mostrar los productos en un div dependiendo de la busqueda realizada */

      $.each(resultado.datos, function (j, dato) {
        if ($("#listaDatos").css("display", "none")) {
          $("#listaDatos").css("display", "block");
          $("#dato1").html(dato.proNombre);
          $("#idProducto").val(dato.idProducto);
          $("#listaDatos").append(
            primerCampo.clone(true).attr("class", "otroCampo")
          );
        }
      });

      $(".primerCampo").remove();

      $('.dato1').click(function(){

        /**se obtiene el nombre del producto al que dimos click */
        var nombre = $(this).text();
        /**guardamos el objeto de productos en una variable */
        var arreglo = resultado.datos;
        /**buscamos en el arreglo el producto con el mismo nombre que acabamos de obtener y lo guardamos en una variable */
        var producto = arreglo.find(dato => dato.proNombre == nombre);

        /**obtenemos el nombre del producto que ya se encuentre en pantalla */
        const nombreProduto = productoAgregado.getElementsByClassName('producto');

        /**recorremos el arreglo nombreProducto y si ya existe el producto que estamos agregando
         * entonces aumentamos el valor de cantidad actualizamos precio y terminamos con la ejecucion de la funcion
         */
        for(let j = 0; j < nombreProduto.length; j++){
          if(nombreProduto[j].innerText === producto.proNombre){

            var cantidad = nombreProduto[j].parentElement.parentElement.parentElement.querySelector('.cantidad');
             cantidad.value++;
             actualizarPrecio();
            
            return;
          }
        }

        /**se crea un nuevo elemnto div para almacenar los datos que se van a mostrar */
        const nuevoItem = document.createElement('div');
        const contenido = `
        <div class="factura-items pompiere">
          <div class="row">
              <div class="col-4">
                  <input type="hidden" id="txt_idProducto" value="${producto.idProducto}">
                  <div class="item">
                      <p id="txt_nombre" class="producto">${producto.proNombre}</p>
                  </div>
              </div>
              <div class="col-2">
                  <div class="item">
                      <p id="txt_precio" class="precio">${producto.proPrecio}</p>
                  </div>
              </div>
              <div class="col-2">
                  <div class="item">
                      <input type="number" class="cantidad cajaTexto" value="1" id="txt_cantidad">
                  </div>
              </div>
              <div class="col-4">
                  <div class="item unidadMedida">
                      <p>${producto.proUnidadMedida}</p>
                      <button id="btnEliminar" type="button" class="btnNaranja">X</button>
                  </div>
              </div>
          </div>
        </div>`;

        nuevoItem.innerHTML = contenido;
        productoAgregado.append(nuevoItem);

        nuevoItem.querySelector('#btnEliminar').addEventListener('click', eliminarProducto);

        actualizarPrecio();
        
        $('.cantidad').change(cambioCantidad);


        }); 
    },

      error: function (ex) {

      }
    });
}

function cambioCantidad(e){

  const cantidad = e.target;
  if(cantidad.value <= 0){
    cantidad.value = 1;
  }
  actualizarPrecio();
}

function actualizarPrecio(){

  let total = 0;
  const precioTotal = document.querySelector('.txt_total');
  const items = document.querySelectorAll('.factura-items');

  items.forEach(item => {

    const producto = item.querySelector('.precio');
    const precio = Number(producto.textContent.replace('$', ''));
    const cantidad = Number(item.querySelector('.cantidad').value);

    total = total + precio * cantidad;
    precioTotal.innerHTML = `$${total}`;
    console.log(total);
  });

  if(items.length == 0){
    precioTotal.innerHTML = `$0`;
  };

 

}

function eliminarProducto(event){

  const boton = event.target;

  boton.closest('.factura-items').remove();

  actualizarPrecio();

}

function obtenerEmpleado(idPersona){

  var parametros = {

    accion: 'obtenerEmpleado',
    idPersona: idPersona
  };

  $.ajax({
    url:'../../../controlador/citaControl.php',
    data: parametros,
    dataType: 'json',
    type:'post',
    cache:'false',

    success: function(resultado){

      idEmpleado = resultado.datos[0][0];

      /**se ejecuta la funcion que lista las citas asignadas a este empleado */
      listarCitas(idEmpleado);
    },
    error: function(e){

      console.log(e.responseText);

    }
  });

}

function atenderCita(){

  var encargado;
  var total;

      /**obtenemos los elementos con el id txt_nombre para obtener el nombre
       * de los productos que se usaron
       */
       let datos = document.querySelectorAll('.factura-items #txt_idProducto');
       /**creamos un arreglo a partir de esos elementos que retorna el querySelectorAll */
       var arrayProductos = Array.from(datos);
       var productosFactura = [];
       /**obtenemos el texto plano de los elementos que tenemos en el arreglo arrayProductos
        * con el fin de tener un arreglo final mas limpio
       */
       for(let j in arrayProductos){
 
         productosFactura.push(arrayProductos[j].value);
 
       }
       console.log(productosFactura);

       /**validamos que tipo de encargado es */

       if($('#chk_dueño').is(':checked')){

          encargado = $('#txt_dueño').val();

       }else if($('#chk_empleado').is(':checked')){

          encargado = $('#cb_empleado').text();

       }else if($('#chk_otro').is(':checked')){

          encargado = $('#txt_encargado').val();
       }
       
       /**obtenemos el total en forma de string para quitarle el signo peso
        * y despues se convierte a entero
        */
       var totalA = $('.txt_total').text();
       total = parseInt(totalA.slice(1));
       console.log(total);

       var parametros = {
          accion: 'atenderCita',
          precioServicio: precioServicio,
          encargado: encargado,
          idServicio: idServicio,
          observacion: $('#txt_observacion').val(),
          productos: productosFactura,
          total: total,
          idCita: idCita,
          idEmpleado: idEmpleado
       };

       $.ajax({
          url:'../../../controlador/citaControl.php',
          data: parametros,
          dataType: 'json',
          type: 'post',
          cache: 'false',

          success: function(resultado){

            console.log(resultado);
            alert('se atendio la cita con exito..!');

          },
          error: function(e){

            console.log(e.responseText);
          }
       });

}
