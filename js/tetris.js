var tablero = [];
var puntos = 0;
var pausado = false;
var columnas = 10, filas = 20;
var lose;
var interval;
var intervalRender;
var current; // Pieza moviendose actual
var currentX, currentY; // Posicion de la forma
var freezed; // pieza en el tablero
var formas = [
    [1, 1, 1, 1],
    [1, 1, 1, 0,
        1],
    [1, 1, 1, 0,
        0, 0, 1],
    [1, 1, 0, 0,
        1, 1],
    [1, 1, 0, 0,
        0, 1, 1],
    [0, 1, 1, 0,
        1, 1],
    [0, 1, 0, 0,
        1, 1, 1]
];
//Colores de las figuras
var colors = [
    'cyan', 'orange', 'blue', 'yellow', 'red', 'green', 'purple'
];

function pausarReanudar() {
    if (!pausado) {
        pausado = true;
        pausar();
    } else if (pausado) {
        pausado = false;
        interval = setInterval(tick, 400);
        intervalRender = setInterval(render, 30);
        var div = document.getElementById('menuPausado');
        div.classList.add("deshabilitar");
        document.getElementById("canvasTetris").style.opacity = "1";

    }

}
//Funcion que pausa y muestra menu pausa
function pausar() {
    clearInterval(interval);
    var div = document.getElementById('menuPausado');
    div.classList.remove("deshabilitar");
    document.getElementById("canvasTetris").style.opacity = "0.1";
}


// Crea una pieza
function crearForma() {
    var id = Math.floor(Math.random() * formas.length);
    var forma = formas[id]; // maintain id for color filling

    current = [];
    for (var y = 0; y < 4; ++y) {
        current[y] = [];
        for (var x = 0; x < 4; ++x) {
            var i = 4 * y + x;
            if (typeof forma[i] != 'undefined' && forma[i]) {
                current[y][x] = id + 1;
            }
            else {
                current[y][x] = 0;
            }
        }
    }

    // La pieza nueva se mueve
    freezed = false;
    // Posicion de la pieza
    currentX = 5;
    currentY = 0;
}

function playButtonClicked() {
    newGame();
    var boton = document.getElementById("playbutton");
    boton.disabled = true;
    boton.classList.add("deshabilitar");

}

canvas = document.getElementById('canvasTetris');
ctx = canvas.getContext('2d');
var ancho = 300, altura = 600;
var BLOCK_W = ancho / columnas, BLOCK_H = altura / filas;

// dibuja un solo bloque en posicion x e y
function drawBlock(x, y) {
    ctx.fillRect(BLOCK_W * x, BLOCK_H * y, BLOCK_W - 1, BLOCK_H - 1);
    ctx.strokeRect(BLOCK_W * x, BLOCK_H * y, BLOCK_W - 1, BLOCK_H - 1);
}

// Dibuja el tablero y la forma
function render() {
    ctx.clearRect(0, 0, ancho, altura);

    ctx.strokeStyle = 'black';
    for (var x = 0; x < columnas; ++x) {
        for (var y = 0; y < filas; ++y) {
            if (tablero[y][x]) {
                ctx.fillStyle = colors[tablero[y][x] - 1];
                drawBlock(x, y);
            }
        }
    }

    ctx.fillStyle = 'red';
    ctx.strokeStyle = 'black';
    for (var y = 0; y < 4; ++y) {
        for (var x = 0; x < 4; ++x) {
            if (current[y][x]) {
                ctx.fillStyle = colors[current[y][x] - 1];
                drawBlock(currentX + x, currentY + y);
            }
        }
    }

}