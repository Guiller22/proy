<?php
include('config.php');
include('header.php');
?>

    <!doctype html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <meta name="description" content="Disfruta de los mejores juegos clásicos en esta página
  acompañada de un estilo retro para rememorar con nostalgia el pasado">
      <meta name="author" content="Guillermo">
      <title>Document</title>

      <title>Inicio</title>
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <link rel="preload" href="css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <noscript>

        <link rel="stylesheet" href="css/bootstrap.min.css">
      </noscript>

      <link rel="preload" href="css/output.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <noscript>
        <link rel="stylesheet" href="css/output.css">
      </noscript>
      <script src="js/script.js"></script>
    </head>


    <body class="text-center" id="fondo">
      <div class="puntuaciones">

        <table class="puntuacionTabla">
          <h2>Top puntuaciones del mes</h2>
          <tr>
            <th>Usuario</th>
            <th>Puntos</th>
          </tr>
          <?php
          $mes = date('m');
          $db = getDB();

          try {
            $consultilla1 = $db->prepare("SELECT usuario , puntos1 FROM puntos WHERE extract(month from fechaRecord) = '$mes'");
            $consultilla1->execute();
            $arrayConsulta = $consultilla1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arrayConsulta as $row) {

              echo "<tr><td>" . $row["usuario"] . "</td><td>" . $row["puntos1"] . "</td></tr>";
            }
          } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
          }


          ?>
        </table>
      </div>

      <div class="centered">
        <h1>Bienvenido
          <?php echo $nombre; ?>
        </h1>
        <h3 class="seleccion">Pulsa entrar para ver la selección de juego:</h3>
        <a href="seleccion.php" id="submit" class="animated flash boton">Entrar</a>
      </div>
    </body>

    </html>