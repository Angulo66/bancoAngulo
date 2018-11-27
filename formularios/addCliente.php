<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <script>
            $(document).ready(function(){
                $('select').formSelect();
              });
    </script>

</head>

<body>

    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a href="../vistas/bancoAngulo.php" class="brand-logo">Banco del Angulo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">Menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="active" href="../formularios/addDomicilio.html">Agregar Cliente</a></li>
                <li><a href="#">Cancelar Cuenta</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </nav>

    <br />

    <div class="row">
        <form action="../conexiones/addCliente02.php" method="POST" class="col s12">
            
            <form action="../conexiones/addCliente02.php" method="POST" class="col s12">
                <div class="input-field col s3">
                    <select name="domicilio" required>
                      <option>Selecionar</option>
                      <?php
                      $con = mysqli_connect("localhost", "root", "", "bancoAngulo");
                      if (mysqli_connect_errno()) {
                        echo "Failed to connect to bancoAngulo: " . mysqli_connect_error();
                      }
                      $result = mysqli_query($con, "SELECT ciudad FROM Domicilios WHERE 1");
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option for='domicilio' value='" . $row['domicilio_id'] . "'>" . $row['ciudad'] . "</option>";
                      }
                      mysqli_close($con);
                      ?>
                    </select>
                    <label>Ciudad</label>
                </div>

            <div class="row">
                <div class="input-field col s12">
                    <input name="nombre" placeholder="" type="text" class="validate" required>
                    <label for="nombre">Nombre/s</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="apellido" placeholder="" type="text" class="validate" required>
                    <label for="apellido">Apellidos</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="edad" placeholder="" type="text" class="validate" required>
                    <label for="edad">Edad</label>
                </div>
            </div>
            <div class="input-field col s3">
                <select name="genero" required>
                    <option value="" disabled selected>Selecionar</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
                <label>Genero</label>
            </div>
            <br />
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>

