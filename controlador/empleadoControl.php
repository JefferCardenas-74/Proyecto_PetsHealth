<?php

    /**modelo entidades */
    include '../modelo/entidad/Persona.php';
    include '../modelo/entidad/Empleado.php';
    include '../modelo/entidad/Rol.php';
    include '../modelo/entidad/Usuario.php';

    /**modelo datos */
    include '../modelo/datos/conexion.php';
    include '../modelo/datos/datosEmpleado.php';
    include '../modelo/datos/datosUsuario.php';


    extract($_REQUEST);

    error_reporting(0);

    $dEmpleado = new datosEmpleado();
    $dUsuario = new datosUsuario();
    $listaRol = [];

    switch($accion){

        case 'registrarEmpleado':

            $email = $correo;

            $empleado = new Empleado(null, $fechaIngreso, null, $identificacion, $nombre, $apellido, $telefono, $email);

            //se registra el empleado a la base de datos y se obtiene el id de la persona para relacionarlo con el usuario
            $idPersona = $dEmpleado->registrarEmpleado($empleado);
            
            /**administrador - empleado 
             * empleado
             * cliente
            */
            /**se valida que rol se selecciono para saber la gerarquia que tendra  */
            if($rol == 1){

                $rolM = new Rol($rol, null);
                $listaRol[0] = $rolM;

                $rol2 = new Rol(2, null);
                $listaRol[1] = $rol2;

            }else if($rol == 2){

                $rolM = new Rol($rol, null);
                $listaRol[0] = $rolM;

            }
            /**se obtiene el idPersona del atributo datos del objeto retorno */
            $id = $idPersona->datos;
            /**se encripta la contrasenia con md5 */
            $contra = md5($identificacion);

            $usuario = new Usuario(null, $id, $email, $contra, $listaRol);

                
            $resultado = $dUsuario->registrarUsuario($usuario);

            echo json_encode($resultado);

            break;

        case 'listarCargo':

            $resultado = $dEmpleado->listarCargo();
            echo json_encode($resultado);
            break;

        case 'listarRol':
            $resultado = $dEmpleado->listarRol();
            echo json_encode($resultado);
            break;
    }
?>