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
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                    .</p>
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
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                    .</p>
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
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                </p>
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
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Suscipit sit dignissimos nam pariatur ullam illum eum, enim neque accusamus illo non, asperiores
                    nihil at quidem expedita cumque debitis adipisci! Delectus?
                </p>
            </div>
        </div>
    </div>
</div>