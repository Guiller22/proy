//Hacer que el logo lleve al index al clickarlo.
window.onload = function () {
    document.getElementById("monoton").onclick = function () {
        location.href = "index.php";
    }
};
//Menu responsive para la versión movil
function menuDesplegable() {
    var x = document.getElementById("menu");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}