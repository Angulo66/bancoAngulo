<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banco del Angulo</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>

</head>

<body>
    <div class="content">

        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Banco del Angulo</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">Menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../formularios/addDomicilio.html">Agregar Cliente</a></li>
                    <li><a href="#">Cancelar Cuenta</a></li>
                    <li><a href="../conexiones/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div id="tabs">
            <nav>
                <ul>
                    <li><a href="#clientes">Clientes</a></li>
                    <li><a href="#desc_clientes">Descripcion Clientes</a></li>
                    <li><a href="#ref_estado_de_cuenta">Estado de Cuentas</a></li>
                    <li><a href="#buscar_cliente">Buscar Cliente</a></li>
                </ul>
            </nav>
            <div id="tabs">

                <div id="clientes" class="col s12">

                    <?php

                    $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to bancoAngulo: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con, "SELECT * FROM Clientes");

                    echo " <table class='responsive-table centered highlight'>
                        <h4 class='center'>Lista de Clientes</h4>
                        <thead>
                        <tr>
                        <th scope='col'></th>
                        <th scope='col'>#Id</th>
                        <th scope='col'>First Name</th>
                        <th scope='col'>Last Name</th>
                        <th scope='col'>Edad</th>
                        <th scope='col'>Genero</th>
                        </tr>
                        </thead> ";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<th scope='row'>";
                        echo "<td>" . $row['cliente_id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['edad'] . "</td>";
                        echo "<td>" . $row['genero'] . "</td>";
                        echo "</th>";
                        echo "</tr>";
                        echo "</tbody>";

                    }
                    echo "</table>";

                    mysqli_close($con);

                    echo "</table> ";

                    ?>

                </div>

                <div id="desc_clientes">
                    <?php

                    $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to bancoAngulo: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con, "SELECT * FROM desc_cliente");

                    echo " <table class='responsive-table centered highlight'>
                    <h4 class='center'>Lista de Clientes</h4>
                  <thead>
                    <tr>
                        <th scope='col'></th>
                        <th scope='col'>First Name</th>
                        <th scope='col'>Last Name</th>
                        <th scope='col'>Cuenta Tipo</th>
                        <th scope='col'>Numero de Cuenta</th>
                        <th scope='col'>Provincia</th>
                        <th scope='col'>Activo</th>
                    </tr>
                  </thead> ";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<th scope='row'>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['cuenta_tipo'] . "</td>";
                        echo "<td>" . $row['numero_de_cuenta'] . "</td>";
                        echo "<td>" . $row['estado_provincia_pais'] . "</td>";
                        echo "<td>" . $row['activo'] . "</td>";
                        echo "</th>";
                        echo "</tr>";
                        echo "</tbody>";

                    }
                    echo "</table>";

                    mysqli_close($con);

                    echo "</table> ";

                    ?>
                </div>

                <div id="buscar_cliente" class="col s12">

                    <form method="GET" class="center col s3">
                        <div class="input-field">
                            <input name="id" id="search" placeholder="Buscar cliente por id"type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>

                    <?php

                    $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                    $id = $_GET['id'];
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to bancoAngulo: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con, "SELECT * FROM `Clientes` WHERE cliente_id='" . $id . "'");

                    echo "<table class='responsive-table centered highlight'>
                        <h4 class='center'>Lista de Clientes</h4>
                        <thead>
                        <tr>
                        <th scope='col'></th>
                        <th scope='col'>#Id</th>
                        <th scope='col'>First Name</th>
                        <th scope='col'>Last Name</th>
                        <th scope='col'>Edad</th>
                        <th scope='col'>Genero</th>
                        </tr>
                        </thead> ";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<th scope='row'>";
                        echo "<td>" . $row['cliente_id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['edad'] . "</td>";
                        echo "<td>" . $row['genero'] . "</td>";
                        echo "</th>";
                        echo "</tr>";
                        echo "</tbody>";

                    }
                    echo "</table>";

                    mysqli_close($con);

                    ?>

                </div>

            </div>
        </div>

</body>

</html>