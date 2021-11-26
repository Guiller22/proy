<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Disfruta de los mejores juegos clásicos en esta página
  acompañada de un estilo retro para rememorar con nostalgia el pasado">

<title>Inicio</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/output.css" rel="stylesheet">
<!doctype html>
<html lang="en">
<style>
  .borde {
    margin-top: 10px;
    margin: auto;
    border: 2px solid tan;
    background-color: rgba(255, 255, 0, 0.5);

  }

  .record {
    display: flex;
    justify-content: center;
    flex-direction: column;
    margin-top: 10px;
  }

  .deshabilitar {
    display: none !important;
  }

  canvas {
    display: block;
    margin: auto;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .centrado {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 140px;
    height: 100px;
  }



  .controles {
    margin-top: 10px;
  }

  .jugar {
    margin-top: 10px;
  }
</style>



<body class="text-center" id="fondo">
  <div class="record">
    <p class="borde">Record:</p>
    <h3>Player:
  </div>



  <canvas id="canvasTetris" width="300" height="600"></canvas>
  <div class="centrado deshabilitar flash animated" id="menuPausado">
    P A U S A
    Pulsa "p" para reanudar.
  </div>

  <span id="puntos"></span>

  <div class="jugar">

    <button id="playbutton" class="animated flash boton" onclick="playButtonClicked()"><a>Empezar</a></button>
    <a href="seleccion.php" class="boton">Volver atrás</a>
    <button id="restart" class="animated flash boton deshabilitar">Restart</button>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='js/tetris.js'></script>


</body>