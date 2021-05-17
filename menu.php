<?php
require_once("configuracion/validaciones.php");
?>
<nav class="menu">

    <div class="logo home">
        <img src="https://i.imgur.com/yzjVfUS.png" alt="Logo de la empresa"
       >
    </div>

        <input type="checkbox" id="btn_menu">
        <label for="btn_menu" id="icono_menu"><i class="fas fa-bars"></i></label>

    <div class="menu-items uno">
        <ul>
            <li class="item">
                <a class="activePrueba" href=<?php echo $GLOBALS['casa']; ?> >Inicio</a>
            </li>
            <li class="item">
                <a href=<?php echo  $GLOBALS['preguntasFrecuentes']; ?> >Preguntas frecuentes</a>
            </li>
            <li class="item">
                <a href="vista/principal/ubicacionEmpresa/" >Encuentranos</a>
            </li>
			<li class="item" >
			<a id="login" href=<?php echo $GLOBALS['iniciarSesion']; ?> >Iniciar sesion</a>
			</li>
        </ul>
    </div>
</nav>



