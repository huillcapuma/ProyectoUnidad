<?php
if(isset($_POST['titulo']) && isset($_POST['contenido'])&&
isset($_POST["fecharegistro"]) && isset($_POST['fechavencimiento']))
{
    session_start();
    if (isset($_SESSION['username']))
    {
        $idusuario= htmlspecialchars($_SESSION['username']);
        echo "$idusuario";
    }
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $fecharegistro = $_POST['fecharegistro'];
    $fechavencimiento = $_POST['fechavencimiento'];
    $categoria = $_POST['categoria'];
    
    include_once 'conectar.php';
    $idrand= rand(1,1000);
    echo "$titulo <br>";
    echo "$contenido<br>";
    echo "$fecharegistro<br>";
    echo "$fechavencimiento<br>";
    echo "$categoria<br>";
    echo "$idrand";
    $sql = "INSERT INTO tareas value('$idrand','$titulo', '$fecharegistro','$fechavencimiento','$idusuario','1','$contenido')";
    $rta = mysqli_query($conexion,$sql);
    
    if (!$rta){
        echo "no se inserto!";
    }
    else{
        header("Location: principal.php");
    }
}
else {
    echo "fallo  al insertar tarea <br>
    <a href='nuevo.php'>volver</a>
    ";
}

?>