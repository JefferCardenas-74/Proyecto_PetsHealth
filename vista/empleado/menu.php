<nav class="menu">

    <div class="logo">
        <img src="https://i.imgur.com/yzjVfUS.png" alt="Logo de la empresa"
       >
    </div>

        <input type="checkbox" id="btn_menu">
        <label for="btn_menu" id="icono_menu"><i class="fas fa-bars"></i></label>

    <div class="menu-items uno">
        <ul>
        <li class="sub_menu item">
                <a href="#">Cita<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item " href=<?php echo $GLOBALS['verCitasAsignadasE']; ?> >Ver Asignadas</a></li>
                        <li><a href=<?php echo $GLOBALS['citasNoProgramadasE']; ?> >Citas No Programadas</a></li>                    
                </ul>
            </li>
            <li class="sub_menu item">
                <a href="#">Estadisticas<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item" href= <?php echo $GLOBALS['verReporteGraficoCitasAtendidasPorMiE']; ?> >Reporte grafico citas</a></li>
                </ul>
            </li>

            <li class="sub_menu item " >
                <a href="#">Configuraciones<i class="fa fa-caret-down"></i></a>
                <ul class="posRight">
                <li>
                <a class="dropdown-item "  id="usuario"  href="javascript:void(0);">
                        Empleado <span class="active"><?php echo $_SESSION["nombreUsuario"]; ?> </span> </a>
                        <li><a class="dropdown-item " href=<?php echo $GLOBALS['actualizarDatosE']; ?> >actualizar datos</a></li>
                        <li><a class="dropdown-item" id="cerrarSesion" href="#">cerrar sesion</a></li>
                </ul>
            </li>

        </ul>
    </div> 
</nav>