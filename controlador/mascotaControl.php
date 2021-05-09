<?php
    session_start();
    include "../modelo/datos/conexion.php";
    include "../modelo/entidad/Mascota.php";
    include "../modelo/datos/datosMascota.php";

    require_once("../configuracion/fechaHora.php");
    
    extract($_REQUEST);

    error_reporting(0);

    $dMascota= new datosMascota();

    switch($accion){

        case "listarMascotas":

            $resultado= $dMascota->listarMascotasSinCita($idMascota);
            echo json_encode($resultado);
            break;
        
        case 'listarDatosMascota':

            $resultado = $dMascota->listarDatosMascota($idMascota);
            echo json_encode($resultado);
            break;

        case 'actualizarDatosMascota':

            $edad = $year - $año;

            $mascota = new Mascota($idMascota,null, $tipoMascota, $nombre, $fechaNacimiento, $edad); 

            $resultado = $dMascota->actualizarDatosMascota($mascota);
            echo json_encode($resultado);
            break;

        case 'eliminarMascota':

            $resultado = $dMascota->eliminarMascota($idMascota);
            echo json_encode($resultado);
            break;
    }