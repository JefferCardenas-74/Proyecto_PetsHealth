var primerCampo;
var productoAgregado;
var primeraFila;
var idCita;

$(function () {
  primerCampo = $("#primerCampo");
  productoAgregado  = document.querySelector('.factura-items-container');
  primeraFila = $('#primeraFila');

  listarCitas();


  /** dinamismo del formulario atender citas*/
  $("#chk_dueño").focus(function () {
    $(".empleado").css("display", "none");
    $(".encargado").css("display", "none");
    $(".domicilio").css("display", "none");
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


}); 

function listarCitas(){

  $('.otraFila').remove();
  $('#tbl_citas').append(primeraFila);

  var parametros = {
    accion:'listarCitas'
  };

  $.ajax({
    url:'../../controlador/citaControl.php',
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
  listarEmpleados();
  $('#atenderCita').modal();
}

function mostrarDatosCita(){

  var parametros = {
    accion: 'datosCita',
    dato: idCita
  };

  $.ajax({
    url:'../../controlador/citaControl.php',
    data: parametros,
    dataType: 'json',
    type: 'post',
    cache: false,

    success: function(resultado){

      console.log(resultado.datos);

      $.each(resultado.datos, function(j, dato){

        $('#txt_Mascota').val(dato.masNombre);
        $('#txt_dueño').val(dato.perNombre);
        $('#txt_tipoCita').val(dato.serTipo);
      });



    },
    error: function(e){

      console.log(resultado.mensaje);

    }

  });


}
function buscarCliente(cedula){

  let parametros = {
    accion:'buscarCliente',
    cedula: cedula
  };

  $.ajax({
    url:'../../controlador/citaControl.php',
    data: parametros,
    type: 'post',
    dataType:'json',
    cache: false,

    success:function(resultado){

      if(resultado.datos.length > 0){

        $.each(resultado.datos, function(j, dato){

            var idPersona = dato.idPersona;
            $('#txt_encargado').val(dato.perNombre +' '+ dato.perApellido);
            buscarMascotasPersona(idPersona);

        }); 
      }else{
        
        $('#registrarCliente').modal();
      }


    },
    error:function(e){

    }
  });

}

function buscarMascotasPersona(idPersona){

  var parametros = {
    accion:'buscarMascotas',
    idPersona: idPersona
  };

  $.ajax({
    url: '../../controlador/citaControl.php',
    data: parametros,
    dataType: 'json',
    type: 'post',
    cache: false,

    success: function(resultado){

      console.log(resultado);

      $.each(resultado.datos, function(j, dato){
        var option = document.createElement('option');
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
    url:'../../controlador/citaControl.php',
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

function buscarProducto() {
  $(".otroCampo").remove();
  $("#listaDatos").append(primerCampo);


  var parametros = {
    accion: "buscarProducto",
    busqueda: $("#txt_buscadorProductos").val(),
  };

  $.ajax({
    url: "../../controlador/productoControl.php",
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

        var nombre = $(this).text();
        var arreglo = resultado.datos;

        var producto = arreglo.find(dato => dato.proNombre == nombre);
        
        console.log(producto);

        const nombreProduto = productoAgregado.getElementsByClassName('producto');
        
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

