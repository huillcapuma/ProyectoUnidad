<?php
$id = $_GET['id'];

    include_once 'conectar.php';
    $sql = "DELETE FROM tareas WHERE id like $id";
    $rta = mysqli_query($conexion, $sql);
    if(!$rta){
        echo "no se eliminó!";
    }
    else{
        header("Location: principal.php");
    }
    

?>