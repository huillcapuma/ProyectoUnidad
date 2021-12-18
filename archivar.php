<?php
echo "estas en archivos . php ";

$id = $_GET['id'];

include_once 'conectar.php';
$sql = "UPDATE tareas SET categoria = 2 WHERE id = $id ;";
$rta = mysqli_query($conexion, $sql);
if(!$rta){
    echo "no se archivo!";
}
else{
    header("Location: principal.php");
}
?>