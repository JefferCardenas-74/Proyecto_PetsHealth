<?php
    include '../modelo/datos/datosCita.php';
    include '../modelo/datos/conexion.php';
    include '../modelo/entidad/Cita.php';

    extract($_REQUEST);

    error_reporting(0);

    $dCita = new datosCita();

    switch($accion){

        case 'listarCitas':
            $resultado = $dCita->listarCitas();
            echo json_encode($resultado);
            break;
        
        case 'datosCita':
            $resultado = $dCita->mostrarDatosCita($dato);
            echo json_encode($resultado);
            break;

        case 'listarEmpleados':
            $resultado = $dCita->listarEmpleados();
            echo json_encode($resultado);
            break;

        case 'buscarCliente':
            $resultado = $dCita->buscarCliente($cedula);
            echo json_encode($resultado);
            break;

        case 'buscarMascotas':
            $resultado = $dCita->buscarMascota($idPersona);
            echo json_encode($resultado);
            break;
        
        case 'listarTipoCita':
            $resultado = $dCita->listarTipoCita();
            echo json_encode($resultado);
            break;
    }
?>