<?php
// Create connection

$conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";

//$cliente_id = $_POST['cliente_id'];
$domicilio = $_POST['domicilio'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
 
$sql = "INSERT INTO `Clientes`(`domicilio_id`, `first_name`, `last_name`, `edad`, `genero`) 
        VALUES ('$domicilio','$nombre','$apellido','$edad','$genero')";
if (mysqli_query($conn, $sql)) {
      echo "<br>New record created successfully";
      header("refresh:3; ../vistas/bancoAngulo.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("refresh:3; ../formularios/addCliente.html");
}
mysqli_close($conn);


?>