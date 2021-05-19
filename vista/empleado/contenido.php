<?php

?>

<div class="container vista-principal">
    <div class="contenedorTitulo">
        <h2 class="titulo fredoka text-center">Bienvenido Veterinario</h2>
    </div>

    <h4 class="texto-bienvenida text-center ">Hola <span class="user"> <?php echo $_SESSION["nombreUsuario"]; ?> </span>
        te presentamos
        algunos modulos que puedes realizar como <span class="rol" >Empleado </span> </h4>
    <div class="row g-5 py-5">
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="citasAsignadas/">
                    <img src="../../componente/img/vistaGeneral/citasAsignadas.png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Ver citas asignadas</h2>
                <p>En este apartado encontrará las citas que el administrador le ha encargado para que puedan ser atendidas.</p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="verReporteGraficoCitasAtendidasPorMi/">
                <img src="../../componente/img/vistaGeneral/health-report.png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>ver reportes</h2>
                <p> En esta sección podrá observar los reportes referentes a las citas, que se 
                    generan a través de los diferentes datos obtenidos.</p>
            </div>
        </div>
        <div class="col-md-6 d-flex ">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="citasAsignadas/?page=frm_citasNoProgramadas">
                <img src="../../componente/img/vistaGeneral/citasNoprogramadas.png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Realizar citas no programadas</h2>
                <p> En este módulo será posible atender citas que no han sido programadas, 
                    debido a que no se le ha asignado ningún veterinario.</p>
            </div>
        </div>
        <div class="col-md-6 d-flex ">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="citasAsignadas/#verAsignadas">
                <img src="../../componente/img/vistaGeneral/dog.png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Atender citas</h2>
                <p>En este caso podrá realizar toda la gestión de atender una cita.</p>
            </div>
        </div>
    </div>
</div>