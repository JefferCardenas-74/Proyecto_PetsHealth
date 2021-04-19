$(function() {
    let modalMotivo = new bootstrap.Modal(document.getElementById("modalMotivo"), {
        keyboard: false,
        backdrop: "static",
    });


    
    

//dar click en cualquier boton de la tabla
    $(".datos").on("click","#btnCancelar",function(){
        modalMotivo.show();
      })

});
