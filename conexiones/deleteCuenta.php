<?php
// Create connection

$conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
 
$sql = "DELETE FROM `Cuentas` WHERE `numero_de_cuenta`=$id";
if (mysqli_query($conn, $sql)) {
    echo "<h6>Cuenta". $id ."Eliminada</h6>";
    header("location: ../bancoAngulo.php");
} else {
      echo "<h6>Error al Eliminar Cuenta</h6>";
      header("refresh:3;");
}
mysqli_close($conn);

?>