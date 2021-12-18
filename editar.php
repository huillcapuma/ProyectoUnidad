<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$id=$_GET['id'];
$titulo = $_GET['titulo'];
$contenido = $_GET['contenido'];
$fecharegistro = $_GET['fecharegistro'];
$fechavencimiento = $_GET['fechavencimiento'];

?>
    <div>
    <form action="sp_editar.php" method="post">
        <table>
            <tr>
                <td>Ingresar Datos:</td>
                <td><input type="text" name="id" id="" style="visibility:hidden" value="<?=$id?>"></td>
            </tr>
            <tr>
                <td>TITULO:</td>
                <td><input type="text" name="titulo" id="" value="<?=$titulo?>"></td>
            </tr>
            <tr>
                <td>CONTENIDO:</td>
                <td><input type="text" name="contenido" id="" value="<?=$contenido?>"></td>
            </tr>
            <tr>
                <td>FECHA DE REGISTRO:</td>
                <td><input type="datetime" name="fecharegistro" id="" value="<?=$fecharegistro?>"></td>
            </tr>
            <tr>
                <td>FECHA DE VENCIMIENTO:</td>
                <td><input type="datetime" name="fechavencimiento" id="" value="<?=$fechavencimiento?>"></td>
            </tr>
            
            <tr>
                <td><input type="submit" value="Actualizar"></td>
                <td><a href="principal.php">Cancelar</a></td>
            </tr>
        </table>

    </form>

    </div>
</body>
</html>