<?php
?>
<nav class="menu">

    <div class="logo">
        <img src="https://i.imgur.com/yzjVfUS.png" alt="Logo de la empresa">
       
    </div>

        <input type="checkbox" id="btn_menu">
        <label for="btn_menu" id="icono_menu"><i class="fas fa-bars"></i></label>

    <div class="menu-items uno">
        <ul>
        <li class="sub_menu item">
                <a href="#">Empleados<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item " href=<?php echo $GLOBALS['verEmpleadosA'];?> >Ver Empleados</a></li>
                        <li><a class="dropdown-item" href=<?php echo $GLOBALS['regitrarEmpleadosA']; ?> >Registrar empleado</a></li>
                </ul>
            </li>

            <li class="sub_menu item">
                <a href="#">Productos<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a  class="dropdown-item" href=<?php echo $GLOBALS['gestionProductosA'];  ?> > Gestionar</a></li>
                </ul>
            </li>
            <li class="sub_menu item">
                <a href="#">Servicios<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a  class="dropdown-item" href=<?php echo $GLOBALS['gestionProductosA'];  ?> > Gestionar</a></li>
                </ul>
            </li>
            <li class="sub_menu item">
                <a href="#">Cita<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a  class="dropdown-item" href=<?php echo $GLOBALS['asingarVeterinarioA'];  ?> >Asignar cita</a></li>
                        <li><a  class="dropdown-item" href=<?php echo $GLOBALS['historialMascotaA'];  ?> >Ver historial mascota</a></li>
                </ul>
            </li>

            <li class="sub_menu item">
                <a href="#">Estadisticas<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item" href= <?php echo $GLOBALS['verReporteCitasA']; ?> >Reporte grafico citas</a></li>
                        <li><a class="dropdown-item" href=<?php echo $GLOBALS['verReporteEmpleadosA']; ?> >Reporte grafico empleado</a></li>
                        <li><a class="dropdown-item" href=<?php echo $GLOBALS['verReporteServiciosA']; ?> > Reporte grafico servicios</a></li>
                </ul>
            </li>

            <li class="sub_menu item " >
                <a href="#">Configuraciones<i class="fa fa-caret-down"></i></a>
                <ul class="posRight">
                <li>
                <a class="dropdown-item " href="#">
                        Admin <span class="active"><?php echo $_SESSION["nombreUsuario"]; ?> </span> </a>
                        </li>
                        <li><a class="dropdown-item " href=<?php echo $GLOBALS['actualizarDatosA']; ?> > actualizar datos</a></li>
                        <li><a class="dropdown-item" id="cerrarSesion" href="#">cerrar sesion</a></li>
                </ul>
            </li>

        </ul>
    </div>
</nav>