<?php

    extract($_REQUEST);

    /**modelo entidades */
    include '../modelo/entidad/Persona.php';
    include '../modelo/entidad/Empleado.php';
    include '../modelo/entidad/Rol.php';
    include '../modelo/entidad/Cargo.php';
    include '../modelo/entidad/Usuario.php';
    include '../modelo/entidad/Mascota.php';
    
  
    /**modelo datos */
    include '../modelo/datos/conexion.php';
    include '../modelo/datos/datosEmpleado.php';
    include '../modelo/datos/datosUsuario.php';
    include '../modelo/datos/datosCliente.php';
    include '../modelo/datos/datosMascota.php';
    
    /*archivos de configuracion */
    require_once("../configuracion/fechaHora.php");
    require_once("../modelo/datos/enviarCorreo.php");

    error_reporting(0);

    $dCliente = new datosCliente();
    $dUsuario = new datosUsuario();
    $dMascota = new datosMascota();
    $listaRol = [];


    switch($accion){

        case 'AgregarCliente':
            
            $persona = new Persona(null, $cedula, $nombre, $apellidos, $telefono, $correo);

            $idPersona = $dCliente->registrarPersonaCli($persona);

            echo json_encode($idPersona);
            break;

        case 'AgregarMascota':

            $mascota = new Mascota(null, $idPersona, $tipoMascota, $nombreMascota, $fechaNacimientoMascota, $edadMascota);
            $resultado = $dMascota->agregarMascota($mascota);

            echo json_encode($resultado);
            break;

        case 'AgregarUsuario':

            $contra = md5($cedula);

            $rol = new Rol(3, null);
            
            $listaRol[0] = $rol;
            
            $usuario = new Usuario(null, $idPersona, $correo, $contra, $listaRol);

            $resultado = $dUsuario->registrarUsuario($usuario);

            echo json_encode($resultado);

            break;
        

    }
?>

