<?php

?>

<div class="container vista-principal">

<div class="contenedorTitulo">
        <h1 class="titulo fredoka">Bienvenido Administrador</h1>
</div>
    
    <h4 class="texto-bienvenida text-center ">Hola <span class="user"> <?php echo $_SESSION["nombreUsuario"]; ?> </span>
        te presentamos algunos módulos que puedes realizar como <span class="rol">Administrador </span> </h4>
    <div class="row g-5 py-5">
        <div class="col-md-4 d-flex align-items-start">
            <div  class="icon-square bg-light text-dark flex-shrink-0 me-3">
            <a href="asignarVeterinario/">
            <img src="../../componente/img/vistaGeneral/veterinarian (3).png" width="50px" alt="">
            </a> 
            </div>
            <div class="titulos-modulos ">
                <h2>Asignar citas
                </h2>
                <p> En este apartado encontrará todo lo referente para poder asignarle una cita a 
                    un veterinario, de acuerdo con las que están en lista de espera.</p>
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
            <a href="verEmpleados/">
               <img src="../../componente/img/vistaGeneral/vet.png" width="50px" alt="">
            </a>
            </div>
            <div class="titulos-modulos ">
                <h2>
                Gestionar empledos
                </h2>
                <p> En este marco podrá evidenciar todo lo relacionado con el empleado, teniendo la 
                    posibilidad de listar, agregar, actualizar y habilitar o inhabilitar su estado. </p>
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
            <a href="gestionProductos/">
            <img src="../../componente/img/vistaGeneral/medicine.png" width="50px" alt="">
            
            </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Gestionar productos</h2>
                <p> En este caso se podrá realizar toda la gestión de agregar un producto, 
                    actualizarlo o por el contrario eliminarlo.</p>
            </div>
        </div>
        <!-- PARTE DOS -->
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
            <a href="verReporteGraficoCitas/">
            <img src="../../componente/img/vistaGeneral/health-report.png" width="50px" alt="">
            
            </a>
            </div>
            <div class="titulos-modulos ">
                <h2>ver reportes</h2>
                <p>En esta sección podrá observar los distintos reportes que se generan a través de los diferentes datos obtenidos.</p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
            <a href="gestionServicios/">
            <img src="../../componente/img/vistaGeneral/veterinarian (2).png" width="50px" alt="">
            
            </a>
            </div>
            <div class="titulos-modulos ">
                <h2>Gestionar servicios</h2>
                <p> En este aspecto podrá modificar todo aquello que tenga que ver con los servicios que 
                    ofrece la veterinaria, con posibilidad de listar, agregar, actualizar y/o eliminar.</p>
            </div>
        </div>

    </div>
</div>