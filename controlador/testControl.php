<?php
    extract($_REQUEST);

    include '../modelo/datos/conexion.php';
    include '../modelo/entidad/Persona.php';
    include '../modelo/datos/datosCliente.php';
    
    $dPrueba = new datosCliente();

    $persona = new Persona(null, 1000, 'faiber', 'daniel', 2313, 'faiber@');

    if($x == 1){

        print_r($persona);

        $resultado = $dPrueba->registrarPersonaCli($persona);

        echo json_encode($resultado);
    }
  
?>