<?php

$con = mysqli_connect("localhost", "root", "", "bancoAngulo");
$id = $_GET['getsaldo'];
if (mysqli_connect_errno()) {
    echo "Failed to connect to bancoAngulo: " . mysqli_connect_error();
}
$result = mysqli_query($con, "CALL get_saldo($id)");
while ($row = $result->fetch_assoc()) {
    echo "<h3>" . $result . "</h3>";
}

mysqli_close($con);

?>