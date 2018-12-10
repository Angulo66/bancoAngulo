<?php

$con = mysqli_connect("localhost", "root", "", "bancoAngulo");
$id = $_GET['id'];
if (mysqli_connect_errno()) {
    echo "Failed to connect to bancoAngulo: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT * FROM `transaciones` WHERE id='" . $id . "'");

echo "<table class='responsive-table centered highlight'>
    <h4 class='center'>Lista de Clientes</h4>
    <thead>
    <tr>
    <th scope='col'></th>
    <th scope='col'>#Id</th>
    <th scope='col'>Cantidad</th>
    <th scope='col'>Numero de Cliente</th>
    <th scope='col'>Numero de Cuenta</th>
    <th scope='col'>Aprobado</th>
    </tr>
    </thead> ";

while ($row = mysqli_fetch_array($result)) {
    echo "<tbody>";
    echo "<tr>";
    echo "<th scope='row'>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['cantidad'] . "</td>";
    echo "<td>" . $row['cliente_id'] . "</td>";
    echo "<td>" . $row['numero_de_cuenta'] . "</td>";
    if($row['is_summary'] == 1){
        echo "<td> Aprobada </td>";
    } else {
        echo "<td> Pendiente </td>";
    }
    echo "</th>";
    echo "</tr>";
    echo "</tbody>";

}
echo "</table>";

mysqli_close($con);

?>