<?php
// Create connection

$conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$estado = $_GET['estado'];
$tipo = $_GET['tipo'];
$cliente = $_GET['cliente'];
$saldo = $_GET['saldo'];
 
$sql = "INSERT INTO `Cuentas`(`cuenta_codigo_estado`, `cuenta_tipo`, `cliente_id`, `saldo_actual`) 
VALUES ($estado, $tipo, $cliente, $saldo)";
if (mysqli_query($conn, $sql)) {
      header("refresh:3; ../formularios/addCliente.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("refresh:3; ../formularios/addDomicilio.html");
}
mysqli_close($conn);

?>