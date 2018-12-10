<?php
// Create connection

$conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$dom_id = $_GET['domicilio'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
$genero = $_GET['genero'];
 
$sql = "INSERT INTO `Clientes`(`domicilio_id`, `first_name`, `last_name`, `edad`, `genero`) 
        VALUES ('$dom_id','$nombre','$apellido','$edad','$genero')";
if (mysqli_query($conn, $sql)) {
      echo "<br>New record created successfully";
      header("refresh:3; ../formularios/addCuenta.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("refresh:3; ../formularios/addCliente.html");
}
mysqli_close($conn);


?>