<?php

?>

<div class="container vista-principal">

    <div class="contenedorTitulo">
        <h2 class="titulo fredoka text-center">Bienvenido Cliente</h2>
    </div>

    <h4 class="texto-bienvenida text-center ">Hola <span class="user"> <?php echo $_SESSION["nombreUsuario"]; ?> </span>
        te presentamos
        algunos modulos que puedes realizar como cliente</h4>
    <div class="row g-5 py-5">
        <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <img src="../../componente/img/vistaGeneral/calendar.png" width="50px" alt="">
            </div>
            <div class="titulos-modulos ">
                <h2>Agendar cita</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                    .</p>
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <img src="../../componente/img/vistaGeneral/veterinarian (1).png" width="50px" alt="">
            </div>
            <div class="titulos-modulos ">
                <h2>Registrar mascota</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                    .</p>
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <img src="../../componente/img/vistaGeneral/veterinary.png" width="50px" alt="">
            </div>
            <div class="titulos-modulos ">
                <h2>Desde casa</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                </p>
            </div>
        </div>
        <!-- PARTE DOS -->
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <img src="../../componente/img/vistaGeneral/health.png" width="50px" alt="">
            </div>
            <div class="titulos-modulos ">
                <h2>Conocer estado de tu mascota</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                </p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <img src="../../componente/img/vistaGeneral/medical-history.png" width="50px" alt="">
            </div>
            <div class="titulos-modulos ">
                <h2>Revisar historial de tu mascota</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                    .</p>
            </div>
        </div>

    </div>
</div>