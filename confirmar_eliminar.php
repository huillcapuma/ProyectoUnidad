<?php
$id = $_GET['id'];

echo "¿Estas seguro que quieres eliminar el registro? <br>";
?>
<a href="sp_eliminar.php?
id=<?php echo $id?>&
">si</a>
<a href="principal.php">no</a>