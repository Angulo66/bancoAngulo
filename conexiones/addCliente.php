<?php
// Create connection

$conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";

//$domicilio_id = $_POST['domicilio_id'];
$codigo_postal = $_POST['codigo_postal'];
$ciudad = $_POST['ciudad'];
$provincia = $_POST['provincia'];
$pais = $_POST['pais'];
 
$sql = "INSERT INTO `Domicilios`(`ciudad`, `codigo_postal`, `estado_provincia_pais`, `pais`) 
        VALUES ('$ciudad','$codigo_postal','$provincia', '$pais')";
if (mysqli_query($conn, $sql)) {
      echo "<br>New record created successfully";
      header("refresh:3; ../formularios/addCliente.html");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("refresh:3; ../formularios/addDomicilio.html");
}
mysqli_close($conn);


?>