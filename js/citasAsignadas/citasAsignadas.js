var primerCampo;
var productoAgregado;

$(function () {
  primerCampo = $("#primerCampo");
  productoAgregado  = document.querySelector('.factura-items-container');

  /*evento escucha para activarl el modal */
  $(".btn_atender").click(function () {
    $("#atenderCita").modal();
  });

  /** dinamismo del formulario atender citas*/
  $("#chk_dueño").click(function () {
    $(".encargado").css("display", "none");
    $(".domicilio").css("display", "none");
  });

  $("#chk_empleado").focus(function () {
    $(".domicilio").css("display", "block");
    $(".encargado").css("display", "block");
  });

  $("#chk_otro").focus(function () {
    $(".encargado").css("display", "block");
    $(".domicilio").css("display", "none");
  });

  /**------------------------------------------ */

    $("#txt_buscadorProductos").keyup(function () {
      let x = $("#txt_buscadorProductos").val();
      buscarProducto();
    });

  /**------------------------------------------- */

  $('#atenderCita').click(function(){
    $('#listaDatos').css('display', 'none');
  });
    

}); 

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

