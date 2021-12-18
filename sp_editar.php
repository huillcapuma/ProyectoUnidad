<?php
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecharegistro = $_POST['fecharegistro'];
$fechavencimiento = $_POST['fechavencimiento'];
include_once 'conectar.php';
$sql = "UPDATE tareas set titulo='$titulo', contenido='$contenido',fecharegistro='$fecharegistro', fechavencimiento='$fechavencimiento' WHERE id='$id'";
$rta = mysqli_query($conexion, $sql);
if(!$rta){
    echo "no se actualizó!";
}
else{
    header("Location: principal.php");
}
?>