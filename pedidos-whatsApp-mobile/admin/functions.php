<?php

$sumatoria=0;
$cartCount=0;

function getCategories(){

  global $connection;

  $query_category = "SELECT * FROM categories";
  $select_categories_query = mysqli_query($connection, $query_category);

  if (!$select_categories_query) die("QUERY FAILED! " . mysqli_error($connection));

  while ($row = mysqli_fetch_array($select_categories_query)) {
    $db_categories_name = $row['name'];
    $db_categories_id = $row['id_cat'];
    $id_name = str_replace (' ' , '_' , strtolower($db_categories_name));
    if ($db_categories_id == $_COOKIE['categoria']) {
      echo "<li><a onclick='myFunction({$db_categories_id})'
      class='info'
      id='id_{$id_name}'
      style='text-decoration: none;cursor: pointer;border-bottom: 2px solid currentColor;'>
      {$db_categories_name}</a></li>";
    }else{
      echo "<li><a
      onclick='myFunction({$db_categories_id})'
      class='secondary'
      id='id_{$id_name}'
      style='color:#397ABF;
        text-decoration: none;
        cursor: pointer;'>
      {$db_categories_name}</a></li>";
    }//if-else
  }// while
}//function

function getProducts($number){

  global $connection;

  $category = $number;

  if ($_COOKIE['categoria'] == 1) {
    echo "<h3 class='my-2' style='text-align: center;'s>Mejores del mes</h3>";
    echo "<div class='row'>";
    $query_products = "SELECT * FROM products WHERE recomendation = 1";
  }else{
    $query_products = "SELECT * FROM products WHERE id_cat = $category";
  }

  $select_products_query = mysqli_query($connection, $query_products);

  if (!$select_products_query)
      die("QUERY FAILED" . mysqli_error($connection));

  while ($row = mysqli_fetch_array($select_products_query)) {
      $db_products_name = $row['name'];
      $db_products_id = $row['id_product'];
      $db_products_description = $row['description'];
      $db_products_price = $row['price'];
      $db_products_image = $row['image'];
      $db_products_cat = $row['id_cat'];

      if ($db_products_cat == 10) {
        $type="pz";
        $type1="pz";
        $initialValue = 1;
      }else {
        $type="g";
        $type1="kg";
        $initialValue = 100;
      }


      include "admin/mobile.php";

  }
  if ($_COOKIE['categoria'] == 1) {
    echo "</div>"; //row
  }
}

function getTotalNum(){
  global $connection;

  if (isset($_COOKIE['cartJS'])) {
    $jsonobj = $_COOKIE['cartJS'];
    $a = json_decode($jsonobj);

    foreach ($a as $as) {

      $b = print_r( $as->id, true);
      $c = print_r( $as->kg, true);

      $query_cart_products = "SELECT * FROM products WHERE id_product = {$b}";
      $select_cart_products_query = mysqli_query($connection, $query_cart_products);
      if (!$select_cart_products_query)
          die("QUERY FAILED" . mysqli_error($connection));

      while ($row = mysqli_fetch_array($select_cart_products_query)) {
        $db_cart_products_price = $row['price'];
        $db_cart_products_idCat = $row['id_cat'];
        $GLOBALS["cartCount"]++;
        if ($db_cart_products_idCat==10) {
          $GLOBALS["sumatoria"] += $db_cart_products_price * $c;
        }else{
          $GLOBALS["sumatoria"] += round($db_cart_products_price * ($c/1000), 2);
        }
      }
    }
  }
}

function getCart(){

  global $connection;

  if (isset($_COOKIE['cartJS'])) {
    $jsonobj = $_COOKIE['cartJS'];
    $a = json_decode($jsonobj);

    foreach ($a as $as) {

      $b = print_r( $as->id, true);
      $c = print_r( $as->kg, true);

      $query_cart_products = "SELECT * FROM products WHERE id_product = {$b}";
      $select_cart_products_query = mysqli_query($connection, $query_cart_products);
      if (!$select_cart_products_query)
          die("QUERY FAILED" . mysqli_error($connection));

      while ($row1 = mysqli_fetch_array($select_cart_products_query)) {
          $db_cart_products_id_product = $row1['id_product'];
          $db_cart_products_name = $row1['name'];
          $db_cart_products_price = $row1['price'];
          $db_cart_products_image = $row1['image'];
          $db_cart_products_idCat = $row1['id_cat'];

          echo "<div class='card w-90 my-1 mr-1'>";
          echo "<div class='container-fluid'>";
          echo "<div class='row my-1'>";
          // TODO:  centrar
          echo "<div class='col-3'>";
          // TODO: bring little image  less resolution
          echo "<img src='{$db_cart_products_image}' alt='{$b}' style='width:75px; height:75px;'>";
          echo "</div>";

          echo "<div class='col-5'>";
          echo "<h6 class='card-title'>{$db_cart_products_name}</h6>";

          if ($db_cart_products_idCat==10) {
            echo "<p class='card-text'> {$c} pzs</p>";
          }else{
            echo "<p class='card-text'> {$c} g <span class='text-muted' style='font-size: 12px'>aprox</span></p>";
          }
          echo "</div>";

          echo "<div class='col-3'>";
          echo "<div class='d-flex'>";
          if ($db_cart_products_idCat==10) { // es de categoria de piezas
            echo "<p>$".$db_cart_products_price * $c."</p>";
          }else{ // sino precio entre 1000
            echo "<p>$".round($db_cart_products_price * ($c/1000), 2)."</p>";
          }
          echo "</div>";
          // TODO:  centrar
          echo "<button type='button' class='btn btn-outline-danger btn-block p-1' name='delete_product' onclick='onDeleteFCart({$db_cart_products_id_product})'><i class='far fa-trash-alt'></i></button>";
          echo "</div>";

          echo "</div>";
          echo "</div>";
          echo "</div>";
      } // while
    }//for-each
  }else{
    echo "Carrito vacio";
  }
} // getCart

function reviewCart(){
  global $connection;

  if (isset($_COOKIE['cartJS'])) {
    $jsonobj = $_COOKIE['cartJS'];
    $a = json_decode($jsonobj);

    foreach ($a as $as) {

      $b = print_r( $as->id, true);
      $c = print_r( $as->kg, true);

      $query_cart_products = "SELECT * FROM products WHERE id_product = {$b}";
      $select_cart_products_query = mysqli_query($connection, $query_cart_products);
      if (!$select_cart_products_query)
          die("QUERY FAILED" . mysqli_error($connection));

      while ($row1 = mysqli_fetch_array($select_cart_products_query)) {
          $db_cart_products_name = $row1['name'];
          $db_cart_products_price = $row1['price'];
          $db_cart_products_idCat = $row1['id_cat'];

          echo "<li class='list-group-item d-flex justify-content-between lh-sm'>";
          echo "<div>";
          echo "<h6 class='my-0'>".$db_cart_products_name."</h6>";
          echo "<small class='text-muted'>Brief description</small>";
          echo "</div>";
          if ($db_cart_products_idCat==10) { // es de categoria de piezas
            echo "<span class='text-muted'>$".$db_cart_products_price * $c."</span>";
          }else{ // sino precio entre 1000
            echo "<span class='text-muted'>$".round($db_cart_products_price * ($c/1000), 2)."</span>";
          }
          echo "</li>";
      } // while
    }//foreach
  }//isset
} // reviewCart

function sendToWB(){
  global $connection;
  $stringWB = "";

  if (isset($_COOKIE['cartJS'])) {
    $jsonobj = $_COOKIE['cartJS'];
    $a = json_decode($jsonobj);

    foreach ($a as $as) {

      $b = print_r( $as->id, true);
      $c = print_r( $as->kg, true);

      $query_cart_products = "SELECT * FROM products WHERE id_product = {$b}";
      $select_cart_products_query = mysqli_query($connection, $query_cart_products);
      if (!$select_cart_products_query)
          die("QUERY FAILED" . mysqli_error($connection));

      while ($row1 = mysqli_fetch_array($select_cart_products_query)) {
          $db_cart_products_name = $row1['name'];
          $db_cart_products_price = $row1['price'];
          $db_cart_products_idCat = $row1['id_cat'];


          if ($db_cart_products_idCat==10) { // es de categoria de piezas
            $db_cart_products_price = $db_cart_products_price * $c;
            if ($c == 1) {
              $tipo = pz;
            }else{
              $tipo = pzs;
            }

          }else{ // sino precio entre 1000
            $db_cart_products_price = round($db_cart_products_price * ($c/1000), 2);
            $tipo = kg;
          }

          $stringWB2 = "%0D%0A%2A+$db_cart_products_name+$c+$tipo+%09%24$db_cart_products_price";
          $stringWB = $stringWB . $stringWB2;
      } // while
    }//foreach
    return $stringWB;
  }//isset
} // reviewCart

?>
