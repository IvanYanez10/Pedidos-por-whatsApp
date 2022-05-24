<?php
  ob_start();
  if (!isset($_COOKIE['categoria'])) {
    setcookie("categoria", 1);
  }
  include "includes/db.php";
  include "admin/functions.php";
  // session_start();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Tienda</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"> -->
    <script src="https://localhost/Pedidos-por-whatsApp/pedidos-whatsApp-desktop/admin/js/functions.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="includes/css/style.css" rel="stylesheet">
  </head>

  <body>
