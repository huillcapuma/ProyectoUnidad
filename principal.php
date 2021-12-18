<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php error_reporting(0);?>
    <div>
        <form  method="post">
            <?php 
            session_start();

            if (isset($_SESSION['username']))
            {
                $nombre = htmlspecialchars($_SESSION['nombre']);
                $apellido = htmlspecialchars($_SESSION['apellido']);
                $idusuario= htmlspecialchars($_SESSION['username']);
            }
            else echo "Por favor <a href=index.php>Click aqui</a>
                        para ingresar";
            ?>
            
            <a href="nuevo.php">Nuevo</a>

        <select name="veg" size="1"   >
        <option value="pendientes" checked="cheked" >pendientes</options>
        <option value="archivadas">archivadas</options>
        <option value="vencidas">vencidas</options>
        <option value="todas">todas</options>
        </select>
        <input type="submit" value="ver">
        <?php 
        
        $veg=$_POST["veg"];
        echo "$nombre $apellido";?>
        <a href="cerrar_sesion.php">Cerrar Sesion</a>
        </form>
        <?
            
        ?>
    </div>

    <div>
        
        <table border="1">
            <tr>
                <td>TITULO</td>
                <td>FECHA DE REGISTRO</td>
                <td>FECHA DE VENCIMIENTO</td>
                <td>CONTENIDO</td>
                
            </tr>
            
            <?php
            
                switch ($veg) {
                    case 'pendientes':
                        include_once 'conectar.php';
                        $sql = "SELECT * FROM tareas where categoria=1 and idusuario=$idusuario order by fechavencimiento asc";
                        $rta = mysqli_query($conexion, $sql);    
                        while ($mostrar = mysqli_fetch_row($rta)) {?>
                            <tr>
                                
                                <td><?php echo $mostrar[1] ?></td>
                                <td><?php echo $mostrar[2] ?></td>
                                <td><?php echo $mostrar[3] ?></td>
                                <td><?php echo $mostrar[6] ?></td>
                                
                                <td>
                                    <a href="editar.php?
                                    id=<?php echo $mostrar['0']?>&
                                    titulo=<?php echo $mostrar['1']?>&
                                    contenido=<?php echo $mostrar['6']?>&
                                    fecharegistro=<?php echo $mostrar['2']?>&
                                    fechavencimiento=<?php echo $mostrar['3']?>
                                    ">editar</a>
                                    <a href="confirmar_eliminar.php? id=<?php echo $mostrar['0']?> ">eliminar</a>
                                    <a href="archivar.php? id=<?php echo $mostrar['0']?> ">archivar</a>
                                </td>
                            </tr>
                            
                        <?php
                        $fechavenci=$mostrar['3'];
                        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                        $fecha_vencimiento = strtotime("$fechavenci");
                            
                        if($fecha_vencimiento < $fecha_actual  )
                            {
                               
                                $id=$mostrar['0'];
                                echo "$id";

                                include_once 'conectar.php';
                                $sql = "UPDATE tareas SET categoria = 3 WHERE id = $id ;";
                                $rta = mysqli_query($conexion, $sql);
                                if(!$rta){
                                    echo "no se archivo!";
                                }
                            }
                        }

                        break;?>
                    <?php   
                    case 'archivadas':
                        include_once 'conectar.php';
                        $sql = "SELECT * FROM tareas where categoria=2 and idusuario=$idusuario order by fechavencimiento asc";
                        $rta = mysqli_query($conexion, $sql); 
                        while ($mostrar = mysqli_fetch_row($rta)) {?>
                    
                            <tr>
                                
                                <td><?php echo $mostrar[1] ?></td>
                                <td><?php echo $mostrar[2] ?></td>
                                <td><?php echo $mostrar[3] ?></td>
                                <td><?php echo $mostrar[6] ?></td>
                                
                                <td>
                                    <a href="editar.php?
                                    id=<?php echo $mostrar['0']?>&
                                    titulo=<?php echo $mostrar['1']?>&
                                    contenido=<?php echo $mostrar['6']?>&
                                    fecharegistro=<?php echo $mostrar['2']?>&
                                    fechavencimiento=<?php echo $mostrar['3']?>
                                    ">editar</a>
                                    <a href="confirmar_eliminar.php? id=<?php echo $mostrar['0']?> ">eliminar</a>
                                    <a href="desarchivar.php? id=<?php echo $mostrar['0']?> ">desarchivar</a>
                                </td>
                            </tr>
                            
                        <?php
                        $fechavenci=$mostrar['3'];
                        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()-21600));
                        $fecha_vencimiento = strtotime("$fechavenci");
                            
                        if($fecha_vencimiento < $fecha_actual  )
                            {
                               
                                $id=$mostrar['0'];
                                echo "$id";
                                include_once 'conectar.php';
                                $sql = "UPDATE tareas SET categoria = 3 WHERE id = $id ;";
                                $rta = mysqli_query($conexion, $sql);
                                if(!$rta){
                                    echo "no se archivo!";
                                }
                            }

                            }
                        break;?>
                     <?php   
                    case 'vencidas':
                        include_once 'conectar.php';
                        $sql = "SELECT * FROM tareas where categoria=3 and idusuario=$idusuario order by fechavencimiento asc";
                        $rta = mysqli_query($conexion, $sql); 
                        while ($mostrar = mysqli_fetch_row($rta)) {?>
                    
                    <tr>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[6] ?></td>
                       
                        <td>
                            <a href="confirmar_eliminar.php? id=<?php echo $mostrar['0']?> ">eliminar</a>
                        
                        </td>
                    </tr>
                    
                <?php
                }
                
                break;?>
                   <?php     
                    case 'todas':
                        include_once 'conectar.php';
                        $sql = "SELECT * FROM tareas where idusuario=$idusuario order by fechavencimiento asc";
                        $rta = mysqli_query($conexion, $sql); 
                        while ($mostrar = mysqli_fetch_row($rta)) {?>
                    
                    <tr>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[6] ?></td>
                        
                        <td>

                            <a href="confirmar_eliminar.php? id=<?php echo $mostrar['0']?> ">eliminar</a>
                        
                        </td>
                    </tr>
                    
                <?php
                }
                
                break;?>
                <?php
                default:
                    include_once 'conectar.php';
                    $sql = "SELECT * FROM tareas where categoria=1 and idusuario=$idusuario order by fechavencimiento asc";
                    $rta = mysqli_query($conexion, $sql);    
                    while ($mostrar = mysqli_fetch_row($rta)) {?>
                        <tr>
                            
                            <td><?php echo $mostrar[1] ?></td>
                            <td><?php echo $mostrar[2] ?></td>
                            <td><?php echo $mostrar[3] ?></td>
                            <td><?php echo $mostrar[6] ?></td>
                            
                            <td>
                                <a href="editar.php?
                                id=<?php echo $mostrar['0']?>&
                                titulo=<?php echo $mostrar['1']?>&
                                contenido=<?php echo $mostrar['6']?>&
                                fecharegistro=<?php echo $mostrar['2']?>&
                                fechavencimiento=<?php echo $mostrar['3']?>
                                ">editar</a>
                                <a href="confirmar_eliminar.php? id=<?php echo $mostrar['0']?> ">eliminar</a>
                                <a href="archivar.php? id=<?php echo $mostrar['0']?> ">archivar</a>
                            </td>
                        </tr>
                        
                    <?php
                    $fechavenci=$mostrar['3'];
                    $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                    $fecha_vencimiento = strtotime("$fechavenci");
                        
                    if($fecha_vencimiento < $fecha_actual  )
                        {
                           
                            $id=$mostrar['0'];
                            echo "$id";
                            include_once 'conectar.php';
                            $sql = "UPDATE tareas SET categoria = 3 WHERE id = $id ;";
                            $rta = mysqli_query($conexion, $sql);
                            if(!$rta){
                                echo "no se archivo!";
                            }
                        }
                    }

                    break;
                    
                }
               
                ?>
                
        </table>
    </div>

</body>
</html>