<?php
    include 'conectar.php';
        if ($conexion->connect_error) die ("Fatal error");

        if(isset($_POST['nombreusuario']) && isset($_POST['contrasena'])&&isset($_POST["nombre"]))
        {
            $nombre = $_POST['nombre'];
            $apellidos =  $_POST['apellidos'];
            $nombreusuario = $_POST['nombreusuario'];
            $pw_temp =  $_POST['contrasena'];
            $pw_temp2 =  $_POST['confirmarcontraseña'];


            if ($pw_temp==$pw_temp2) {
                
                $password = password_hash($pw_temp, PASSWORD_DEFAULT);
                $query = "INSERT INTO usuarios VALUES('','$nombre','$apellidos','$nombreusuario', '$password')";
                
                $result = $conexion->query($query);
                if (!$result) die ("fallo al registrarse <br>

                <a href='registrarse.php'>volver</a>
                    
                ");
            
            }
            else {
                die ( "las contraseñas no coinciden intentelo de nuevo <br>
                <a href='registrarse.php'>reintentar</a>
                ");
            }
            echo "
        
                registrado de manera satisfactoriamente <br>
                <a href='index.php'>Ingresar</a>
            
            ";
        }
        else {
            echo "campos incompletos fallo al registrarse 
            <a href='registrarse.php'>Volver</a>
            ";
        }

    
    

?>