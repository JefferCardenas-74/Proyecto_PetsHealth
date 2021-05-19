<?php

?>

<div class="container vista-principal">

    <div class="contenedorTitulo">
        <h2 class="titulo fredoka text-center">Bienvenido Cliente</h2>
    </div>

    <h4 class="texto-bienvenida text-center ">Hola <span class="user"> <?php echo $_SESSION["nombreUsuario"]; ?> </span>
        te presentamos
        algunos modulos que puedes realizar como <span class="rol"> cliente </span></h4>
    <div class="row g-5 py-5">
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="http://localhost/repositorio_desarrollo/vista/cliente/agendarCita/#agendarCita">
                <img src="../../componente/img/vistaGeneral/calendar.png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Agendar cita</h2>
                <p>En este apartado podrá realizar todo el proceso para poder agendar su cita de manera satisfactoria.</p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="gestionMascota/">
                <img src="../../componente/img/vistaGeneral/veterinarian (1).png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Gestionar mascota</h2>
                <p> En este marco podrá evidenciar todo lo relacionado con sus mascotas, 
                    teniendo la posibilidad de listar, agregar, actualizar y/o eliminar. </p>
            </div>
        </div>
        <!-- PARTE DOS -->
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="verCita/">
                <img src="../../componente/img/vistaGeneral/health.png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Conocer estado de tu mascota</h2>
                <p> En esta sección podrá observar su proceso luego de haber agendado una cita, 
                    será capaz de evidenciar cuando esta siendo solicitada, atendida o por otra parte cancelarla.
                </p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <a href="historialMascota/">
                <img src="../../componente/img/vistaGeneral/medical-history.png" width="50px" alt="">
                </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Revisar historial de tu mascota</h2>
                <p> En este módulo será posible seguir todo el proceso de las intervenciones que 
                    se le realicen a su mascota, teniendo a la mano una lista con todos los procedimientos.</p>
            </div>
        </div>

    </div>
</div>