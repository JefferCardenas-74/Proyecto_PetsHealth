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
                <a href="#">Empleados<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item " href="#">Ver Empleados</a></li>
                        <li><a class="dropdown-item" href="registrarEmpleado/">Registrar empleado</a></li>
                        <li><a class="dropdown-item" href="#">Opciones</a></li>
                </ul>
            </li>

            <li class="sub_menu item">
                <a href="#">Productos<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item" href="gestionProductos/">Gestionar</a></li>
                        <li><a class="dropdown-item" href="">Opciones</a></li>
                </ul>
            </li>

            <li class="sub_menu item">
                <a href="#">Estadisticas<i class="fa fa-caret-down"></i></a>
                <ul>
                        <li><a class="dropdown-item" href="#">Reporte grafico</a></li>
                        <li><a class="dropdown-item" href="../verCita/">Reporte pdf citas</a></li>
                        <li><a class="dropdown-item" href="#">Mas</a></li>
                </ul>
            </li>

            <li class="sub_menu item " >
                <a href="#">Configuraciones<i class="fa fa-caret-down"></i></a>
                <ul class="posRight">
                <li>
                        <a class="dropdown-item " href="#">
                        <img src="../../componente/img/user/avatar.svg" width="32px" class="img-circle elevation-2" alt="User Image"> 
                         nombre usuario</a>
                        </li>
                        <li><a class="dropdown-item " href="actualizarDatos/">actualizar datos</a></li>
                        <li><a class="dropdown-item" href="#">actualizar mascotas</a></li>
                        <li><a class="dropdown-item" id="cerrarSesion" href="#">cerrar sesion</a></li>
                </ul>
            </li>

        </ul>
    </div> 
</nav>