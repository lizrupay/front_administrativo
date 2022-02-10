var icono = document.getElementById("menu-icon");
var cerrarMenu = document.getElementById("cerrar-menu");
var menu = document.getElementById("navegacion-sidebar");

icono.addEventListener("click", function () {
  menu.classList.add("activo");
});
cerrarMenu.addEventListener("click", function () {
  menu.classList.remove("activo");
});
