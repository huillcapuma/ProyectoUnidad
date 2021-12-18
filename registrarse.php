
<?php 
    require_once 'conectar.php';
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['nombre'])&& isset($_POST['apellido']))
    {
        $nombre = mysql_entities_fix_string($conexion, $_POST['nombre']);
        $apellido = mysql_entities_fix_string($conexion, $_POST['apellido']);
        $username = mysql_entities_fix_string($conexion, $_POST['username']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);

        $password = password_hash($pw_temp, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios VALUES('$nombre','$apellido','$username', '$password')";

        $result = $conexion->query($query);
        if (!$result) die ("Falló registro");

        echo <<< _END
       REGISTRADO DE MANERA SATISFACTORIA <br><br>
       <a href="index.php">continuar</a>
      _END;

    }
    else
    {
echo <<<_END
      <h1>Regístrate</h1>
      <form action="registrarse.php" method="post"><pre>
        Nombre:<input type="text" name="nombre">
        Apellido:<input type="text" name="apellido">
        Usuario:<input type="text" name="username">
        Password:<input type="password" name="password">
                 <input type="hidden" name="reg" value="yes">
                 <input type="submit" value="REGISTRAR">
      </form>
      <a href="index.php">cancelar</a>
      _END;
    }
    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        return $conexion->real_escape_string($string);
      }  
?>
