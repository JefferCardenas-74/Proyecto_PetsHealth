<?php
extract($_REQUEST);

include "../modelo/datos/conexion.php";
include "../modelo/datos/datosHistorialM.php";
include "../modelo/Entidad/Persona.php";
include "../modelo/Entidad/Mascota.php";
include "../modelo/Entidad/Detalle.php";
include "../modelo/Entidad/Usuario.php";
error_reporting(0);
$dHistorialM = new datos_HistorialM();

switch ($accion){
    case "ListarMascotasEn":
        $resultado =$dHistorialM->listarMascotas($identificacion);
        echo json_encode($resultado);
        //print_r($resultado);
        break; 

    case "ListarMascota":
        $resultado = $dHistorialM->listarMascota($idMascota);
        echo json_encode($resultado);
        //print_r($resultado);
        break;

    case "ListarConsulta":
        $resultado = $dHistorialM->listarConsultaM($idMascota);
        echo json_encode($resultado);
        //print_r($resultado);
        break;

    case "ActualizarDesc":
        $detalle = new detalle();
        $detalle->setDescripcion($descripcion);
        $resultado = $dHistorialM->ActualizarDescripcionM($idDetalle,$descripcion);
        //print_r($resultado);
        echo json_encode($resultado);
        break;

    case "ListarMascotasCli":
        $resultado=$dHistorialM->listarMascotasCli($idPersona);
        //print_r($resultado);
        echo json_encode($resultado);
        break;
}

