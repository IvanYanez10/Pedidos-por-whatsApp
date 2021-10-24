<?php

if (!isset($_COOKIE['cartJS'])){
  header("Location: https://shop.subetuweb.site/");
  exit;
}

include "includes/db.php";
include "admin/functions.php";

$nombre = $_GET["firstName"];
$apellido = $_GET["lastName"];
$direccion = $_GET["address"];
$cp = $_GET["zip"];
$instrucciones = "no maltratadas";
// $_GET["aditionalIndications"];

$productsString = sendToWB();
$pedido = 1;
getTotalNum();
$noCarrito = $GLOBALS["cartCount"];
echo $GLOBALS["cartCount"];
$sumatoriaCarrito = $GLOBALS["sumatoria"];
$url = "https://api.whatsapp.com/send?phone=525573269615&text=Pedido+%23$pedido%0D%0ANombre:+$nombre+$apellido%0D%0ADireccion:+$direccion+-+cp:+$cp%0D%0AInstrucciones:%20$instrucciones%0D%0AProductos:+$noCarrito+%0D%0A$productsString%0D%0A+-----------------------+%0D%0ATotal:+%09%24$sumatoriaCarrito";


header("Location: $url");
ob_end_flush();
?>
