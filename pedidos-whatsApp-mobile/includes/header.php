<?php
  ob_start();
  session_start();

  if (!isset($_COOKIE['categoria'])) {
    setcookie("categoria", 1);
    header("Location: https://localhost/aplicacion-wb-mobile/");
  }

  include "includes/db.php";
  include "admin/functions.php";

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Tienda</title>

    <script src="https://localhost/aplicacion-wb-mobile/admin/js/functions.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://localhost/aplicacion-wb-mobile/includes/css/style.css" rel="stylesheet">
  </head>

  <body>
