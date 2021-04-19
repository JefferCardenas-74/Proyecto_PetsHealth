<?php 

include 'conexion.php';

$con = conexion::singleton();

foreach($con->query('select * from persona') as $date){
    
    print_r($date);
} 




?>