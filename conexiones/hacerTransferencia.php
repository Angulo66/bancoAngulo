<?php
// Create connection

$conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$cuenta1 = $_GET['cuenta1'];
$cantidad = $_GET['cantidad'];
$cuenta2 = $_GET['cuenta2'];

$sql1 = "UPDATE `Cuentas` SET `saldo_actual`= `saldo_actual`- $cantidad WHERE numero_de_cuenta = $cuenta1";
$sql2 = "UPDATE `Cuentas` SET `saldo_actual`= `saldo_actual`+ $cantidad WHERE numero_de_cuenta = $cuenta2";
$sql3 = "INSERT INTO `transaciones`(`numero_de_cuenta`, `cuenta_receptora`, `cantidad`, `is_summary`) 
            VALUES ($cuenta1,$cuenta2,$cantidad,1)";
            
if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
      if (mysqli_query($conn, $sql3)) {
            echo "Tranferencia Exitosa!";
            header("refresh:3; bancoAngulo.php");
      }
} else {
      echo "Error al hacer Transferencia!";
      //echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
      //echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      header("refresh:3; ../formularios/addDomicilio.html");
}
mysqli_close($conn);

?>  