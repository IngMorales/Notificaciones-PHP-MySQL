<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema de Notificación en PHP">
  <meta name="author" content="Ing. Aldair Morales Cuéllar">
  <link rel="icon" href="http://collectivecloudperu.com/blogdevs/wp-content/uploads/2017/09/cropped-favicon-1-32x32.png">

  <title>Notificaciones con PHP</title>

  <!-- Estilos CSS de Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/starter-template.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Notificaciones PHP+MySQL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index">Inicio <span class="sr-only">(current)</span></a>
        </li>          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://collectivecloudperu.com/blogdevs/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contacto</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="http://ingmorales.com/" target="_blank">Mi Sitio Web</a>
            <a class="dropdown-item" href="#">Facebook</a>
            <a class="dropdown-item" href="https://github.com/IngMorales" target="_blank">GitHub</a>              
          </div>
        </li>
      </ul>

      <?php
      # Hacemos la Conexión a la base de datos.
      include("php/conexion.php");
      ?>                        

      <div class="demo-content">
        <div id="notification-header">
          <div style="position:relative">
            <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="img/icono.png" /></button>
            <div id="notification-latest"></div>
          </div>          
        </div>
      </div>

      <?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>
      <?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Buscar" required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>

  <div class="container">
    <div class="starter-template">
      <h1>Notificaciones con PHP + MySQL</h1>
      <p class="lead">
        <form name="frmNotification" id="frmNotification" action="php/agregarnotificacion.php" method="post" >
          <div class="form-group">
            <label for="autor">Autor </label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingresa Autor" required>
          </div>
          <div class="form-group">
            <label for="mensaje">Mensaje </label>
            <textarea class="form-control" name="mensaje" id="mensaje" rows="3" placeholder="Mensaje" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="add" id="btn-send" value="Enviar">
          </div>
        </form>            
      </p>
    </div>
  </div>

    <!-- Scripts -->
      <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/ie10-viewport-bug-workaround.js"></script>
      <!-- Metodo Ajax para la consulta en Tiempo Real de las Notificaciones -->
      <script type="text/javascript">
        function myFunction() {
          $.ajax({
            url: "php/notificaciones.php",
            type: "POST",
            processData:false,
            success: function(data){
              $("#notification-count").remove();                  
              $("#notification-latest").show();$("#notification-latest").html(data);
            },
            error: function(){}           
          });
        }

        $(document).ready(function() {
          $('body').click(function(e){
            if ( e.target.id != 'notification-icon'){
              $("#notification-latest").hide();
            }
          });
        });                                     
      </script>

    </body>
    </html>
