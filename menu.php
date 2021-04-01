<link rel="stylesheet" href="componente/css/menu.css">
<nav class="menu">

    <div class="logo">
        <img src="https://i.imgur.com/yzjVfUS.png" alt="Logo de la empresa"
       >
    </div>

        <input type="checkbox" id="btn_menu">
        <label for="btn_menu" id="icono_menu"><i class="fas fa-bars"></i></label>

    <div class="menu-items uno">
        <ul>
            <li class="item">
                <a class="active" href="#">Inicio</a>
            </li>
            <li class="item">
                <a href="vista/principal/preguntasFrecuentes/index.php">Preguntas frecuentes</a>
                <li><a id="login" href="#">Iniciar sesion</a></li>
            </li>
            <li class="sub_menu item">
                <a href="#">Acerca de nosotros<i class="fa fa-caret-down"></i></a>

                <ul class="posRight">
                    <li><a href="#">¿Por que petshealth?</a></li>
                    <li><a href="#">quienes somos</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script src="js/menu.js"></script>














<!-- simulacion de login -->
<!-- Modal -->
<div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicia sesion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <input type="text" placeholder="Ingresa tu nombre">
        <input type="text" placeholder="Tngresa contraseña">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="btnIngresar" class="btn btn-primary">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<script>

$(function(){
var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
});
$("#login").click(function(){
myModal.show();
    });
});

$("#btnIngresar").click(function(){
location.href ="vista/cliente/agendarCita/";
});






</script>
