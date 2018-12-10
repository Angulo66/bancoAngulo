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
    <!-- Compiled jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>
</head>
<!-- Content -->
<body>
    <div class="content">
        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Banco del Angulo</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">Menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="formularios/addDomicilio.html">Agregar Cliente</a></li>
                    <li><a href="formularios/addCuenta.php">Agregar Cuenta</a></li>
                    <li><a href="formularios/hacerRetiro.html">Retiro</a></li>
                    <li><a href="formularios/hacerTransferencia.html">Transferencia</a></li>
                    <li><a href="formularios/deleteCuenta.html">Cancelar Cuenta</a></li>
                    <li><a href="conexiones/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div id="tabs">
            <nav>
                <ul>
                    <li><a href="#clientes">Clientes</a></li>
                    <li><a href="#cuentas">Cuentas</a></li>
                    <li><a href="#buscar_cliente">Buscar Cliente</a></li>
                    <li><a href="#buscar_transacion">Buscar Transacion</a></li>
                    <li><a href="#ver_saldo">Consultar Saldo</a></li>
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

                <div id="cuentas">
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to bancoAngulo: "; // . mysqli_connect_error();
                    }
                    $result = mysqli_query($con, "SELECT * FROM `Cuentas`");
                    echo " <table class='responsive-table centered highlight'>
                    <h4 class='center'>Lista de Cuentas</h4>
                  <thead>
                    <tr>
                        <th scope='col'></th>
                        <th scope='col'>Numero de Cuenta</th>
                        <th scope='col'>Estado de Cuenta</th>
                        <th scope='col'>Tipo de Cuenta</th>
                        <th scope='col'>ID de Cliente</th>
                        <th scope='col'>Saldo Actual</th>
                    </tr>
                  </thead> ";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<th scope='row'>";
                        echo "<td>" . $row['numero_de_cuenta'] . "</td>";
                        if($row['cuenta_codigo_estado'] == 1){
                            echo "<td> Activo </td>";
                        } 
                        elseif($row['cuenta_codigo_estado' == 2]){
                            echo "<td> Cerrado </td>";
                        } else { echo "<td> Pendiente </td>"; }

                        if($row['cuenta_tipo'] == 1){
                            echo "<td> Cheques </td>";
                        } 
                        elseif($row['cuenta_tipo' == 2]){
                            echo "<td> Ahorros </td>";
                        }

                        echo "<td>" . $row['cliente_id'] . "</td>";
                        echo "<td>" . $row['saldo_actual'] . "</td>";
                        echo "</th>";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                    echo "</table>";
                    mysqli_close($con);
                    echo "</table> ";
                    ?>
                </div>

                <div id="buscar_cliente" class="container col s3">
                    <form action="" method="GET" class="center col s3">
                        <div class="input-field">
                            <input name="id" id="search" placeholder="Buscar Cliente por ID" type="search" required>
                            <label class="label-icon" for="search"></label>
                            <i class="material-icons prefix">search</i>
                        </div>
                    </form>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to bancoAngulo: " . mysqli_connect_error();
                    }
                    if(isset($_GET['id'])){
                    $result = mysqli_query($con, "SELECT * FROM `Clientes` WHERE cliente_id='" . $_GET['id'] . "'");
                    echo "<table class='responsive-table centered highlight'>
                        <h4 class='center'>Resultados</h4>
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
                } else {
                    //
                }
                    mysqli_close($con);
                    ?>
                </div>

                <div id="buscar_transacion" class="container col s3">
                    <form method="GET" class="center col s3">
                        <div class="input-field">
                            <input name="id" id="search" placeholder="Buscar por Numero de Transacion" type="search" required>
                            <label class="label-icon" for="search">
                            </label> <i class="material-icons prefix">search</i>
                        </div>
                    </form>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to bancoAngulo: "; //. mysqli_connect_error(); 
                    }
                    if(isset($_GET['id'])){
                    $result = mysqli_query($con, "SELECT * FROM `transaciones` WHERE id='" . $_GET['id'] . "'");

                    echo "<table class='responsive-table centered highlight'>
                         <h4 class='center'>Resultados</h4>
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
                        echo "<td>" . $row['numero_de_cuenta'] . "</td>";
                        echo "<td>" . $row['cuenta_receptora'] . "</td>";
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
                    } else {
                        //
                    }
                        mysqli_close($con);
                        ?>
                </div>

                 <div id="ver_saldo" class="container col s3">
                    <form action="" method="GET" class="center col s3">
                        <div class="input-field">
                            <input name="getsaldo" id="search" placeholder="Ingrese Numero de Cuenta" type="search" required>
                            <label class="label-icon" for="search"></label>
                            <i class="material-icons prefix">search</i>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row valign-wrapper">
                            <div class="col s6 offset-s3 valign">
                                <div class="card blue-grey darken-1">
                                    <div class="card-content white-text">
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                                        if (mysqli_connect_errno()) {
                                            echo "Failed to connect to bancoAngulo: " ;//. mysqli_connect_error(); 
                                        }
                                        if(isset($_GET['getsaldo'])){
                                        $result = mysqli_query($con, "SELECT `saldo_actual` FROM `Cuentas` WHERE `numero_de_cuenta`='" . $_GET['getsaldo'] . "'");
                                        while ($row = mysqli_fetch_array($result)) {
                                            if ($row == null){
                                                echo "<span class='card-title'>Saldo Actual: </span>";
                                            } else {
                                            echo "<span class='card-title'>Saldo Actual: ". $row['saldo_actual'] ." </span>";
                                            }
                                        }
                                    } else {
                                        //
                                    }
                                        ?>
                                        <p></p>
                                    </div>
                                    <div class="card-action">
                                        <a href="formularios/hacerRetiro.php">Retiro</a>
                                        <a href="formularios/hacerTransferencia.php">Transferencia</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>