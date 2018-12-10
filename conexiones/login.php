<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="container col s6">
          <img class="responsive-img" id="logo" src="../img/logo.png" style="height: 420px; 
                                                                              width: 420;"/>
          <h3><span>Banco del Angulo</span></h3>
          <h6>Inicio de sesion para empleados dados de alta</h6>
        <div class="row">
    <form method="GET" class="col s10">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input name="user" id="user" type="text" class="validate">
          <label for="user">User</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input name="password" id="password" type="password" class="validate">
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bancoAngulo');
          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            echo "<i class='material-icons prefix'>signal_wifi_off</i>";
          } else {
            echo "<i class='material-icons prefix'>signal_wifi_4_bar</i>";
          }
          ?>
          <label for="password"></label>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Submit</button>
    </form>
  </div>
        </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>