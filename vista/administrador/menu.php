<?php
//  VARIABLES
$empleado = "../verEmpleados/";
$registrarEmpleado = "../registrarEmpleado/";
$gestionarProductos="../gestionProductos/";
$actualizarDatos="../actualizarDatos/";
$verReporteCitas="../verReporteGraficoCitas";
$verReporteEmpleados="../verReporteGraficoEmpleados/";

$arreglo =[];
    $x = $_SERVER['REQUEST_URI'];
    $arreglo = explode('/', $x);

    if($arreglo[4]==""){
        $empleado="verEmpleados";
        $registrarEmpleado="registrarEmpleado/";
        $gestionarProductos="gestionProductos";
        $actualizarDatos="actualizarDatos/";
        $verReporteCitas="verReporteGraficoCitas";
        $verReporteEmpleados="verReporteGraficoEmpleados/";
    }
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
                        <li><a class="dropdown-item " href=<?php echo $empleado;?> >Ver Empleados</a></li>
                        <li><a class="dropdown-item" href=<?php echo $registrarEmpleado; ?> >Registrar empleado</a></li>
                </ul>
            </li>

            <li class="sub_menu item">
                <a href="#">Productos<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a  class="dropdown-item" href=<?php echo $gestionarProductos;  ?> > Gestionar</a></li>
                </ul>
            </li>

            <li class="sub_menu item">
                <a href="#">Estadisticas<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item" href= <?php echo $verReporteCitas; ?> >Reporte grafico empleados</a></li>
                        <li><a class="dropdown-item" href=<?php echo $verReporteEmpleados ; ?> >Reporte grafico citas</a></li>
                </ul>
            </li>

            <li class="sub_menu item " >
                <a href="#">Configuraciones<i class="fa fa-caret-down"></i></a>
                <ul class="posRight">
                <li>
                <a class="dropdown-item " href="#">
                        Admin <span class="active"><?php echo $_SESSION["nombreUsuario"]; ?> </span> </a>
                        </li>
                        <li><a class="dropdown-item " href=<?php echo $actualizarDatos; ?> > actualizar datos</a></li>
                        <li><a class="dropdown-item" id="cerrarSesion" href="#">cerrar sesion</a></li>
                </ul>
            </li>

        </ul>
    </div>
</nav>