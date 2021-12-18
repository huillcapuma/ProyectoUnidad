<?php

$id = $_GET['id'];

include_once 'conectar.php';
$sql = "UPDATE tareas SET categoria = 1 WHERE id = $id ;";
$rta = mysqli_query($conexion, $sql);
if(!$rta){
    echo "no se desarchivo!";
}
else{
    echo "se desarchivo a tareas pendientes <br>
                
    <p><a href='principal.php'>continuar</a></p>";
    
}
?>