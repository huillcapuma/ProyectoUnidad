<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="sp_insertar.php" method="post">
        <table border="1">
            <tr>
                <td>Ingresar Datos:</td>
            </tr>
            <tr>
                <td>TITULO:</td>
                <td><input type="text" name="titulo" id=""></td>
            </tr>
            <tr>
                <td>CONTENIDO:</td>
                <td>
                <textarea name="contenido" id="" cols="32" rows="4" wrap="off">
                </textarea></td>
                
            </tr>
            <tr>
                <td>FECHA DE REGISTRO:</td>
                <td><input type="datetime-local" name="fecharegistro" id=""></td>
            </tr>
            <tr>
                <td>FECHA DE VENCIMIENTO:</td>
                <td><input type="datetime-local" name="fechavencimiento" id=""></td>
            </tr>
            
            <input type="text" name="categoria" id="" style="visibility:hidden">
            <tr>

                <td><input type="submit" value="Guardar">
                <a href="principal.php">Cancelar</a>
            
            </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>