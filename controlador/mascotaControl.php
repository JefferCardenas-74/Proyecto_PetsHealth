<?php
    session_start();
    include "../modelo/datos/conexion.php";
    include "../modelo/datos/datosMascota.php";
    include "../modelo/entidad/Mascota.php";
    
    extract($_REQUEST);

    error_reporting(0);

    $daMascota= new datosMascota();
     
 

    switch($accion){

        case "listarMascotas":
            $resultado= $daMascota->listarMascotasSinCita($idMascota);
            echo json_encode($resultado);
            break;


    }