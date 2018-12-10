<?php
// Create connection

$conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$cuenta = $_GET['cuenta'];
$cantidad = $_GET['cantidad'];
 
$sql = "UPDATE `Cuentas` SET `saldo_actual`= `saldo_actual`- $cantidad WHERE numero_de_cuenta = $cuenta";
if (mysqli_query($conn, $sql)) {
      header("refresh:3; ../bancoAngulo.php");
} else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("refresh:3;");
}
mysqli_close($conn);

?>  