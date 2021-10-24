<?php

if ($_COOKIE['categoria'] == 1) {

  echo "<div class='col-md-6 col-sm-12'>";
  echo "<div class='card my-2'>";

  echo "<div class='card-header d-flex align-items-center justify-content-center h-100'>";
  echo "<h4>{$db_products_name}</h4>";
  echo "</div>";

  echo "<img src='$db_products_image' alt='' class='mt-1' style='width:150px; height:150px;margin-left: auto;  margin-right: auto;'>";

  // description row
  echo "<div class='card-body'>";
  echo "<div class='container-fluid'>";
  echo "<div class='row'>";
  echo "<div class='col-12'>";
  echo "<p class='card-text'>{$db_products_description}</p>";
  echo "</div>"; // col-12
  echo "</div>"; // row

  // price
  echo "<div class='row my-2'>";
    echo "<p class='card-text col-md-5 col-sm-6'>$ <b>{$db_products_price}</b>/{$type1}</p>";
    // buttons +-
    echo "<div class='btn-group col-md-7 col-sm-6' role='group'>";
      echo "<button type='button' class='btn btn-outline-primary'
      style='box-shadow: 0px 1px 3px 2px rgba(0, 31, 230, .2);'
      onclick='decreseAmount({$db_products_id})'>-</button>";
      echo "<p id='{$db_products_id}' class='col-7 text-center'>{$initialValue} {$type}</p>";
      echo "<button type='button' class='btn btn-outline-primary'
      style='box-shadow:  0px 1px 3px 2px rgba(0, 31, 230, .2);'
      onclick='indecreseAmount({$db_products_id}, $db_products_cat)'>+</button>";
    echo "</div>"; // btn-group
  echo "</div>"; // col-2

  // button add to cart
  echo "<div class='row'>";
    echo "<button type='button'
    class='btn btn-primary btn-block p-1 my-2 add-product'
    style='box-shadow:  0px 1px 3px 2px rgba(0, 31, 230, .5);'
    onclick='addToCart({$db_products_id})' name='button'>
    <i class='fas fa-cart-plus'></i> Añadir
    </button>";

  echo "</div>"; // col-2

  echo "</div>"; // container
  echo "</div>"; // card-body
  echo "</div>"; //card
  echo "</div>"; //col


}else{

  echo "<div class='card w-auto my-2 card'>";

      echo "<div class='card-header'>";
        echo "<h3>{$db_products_name}</h3>";
      echo "</div>";

      echo "<div class='card-body'>";
        echo "<div class='container-fluid'>";
          echo " <div class='row'>";

            echo "<div class='col-md-3 col-sm-12'>";
              echo "<img src='$db_products_image' class='product_image' alt='' >";
            echo "</div>";

            echo "<div class='col-md-6 col-sm-12'>";
              // echo "<h5 class='card-title'>Descripcion</h5>";
              echo "<h5 class='card-title'>$ {$db_products_price} <span class='text-muted'>/{$type1}</span></h5>";
              echo "<p class='card-text'>{$db_products_description}</p>";
              // echo "<p class='card-text'>$ {$db_products_price}/{$type1}</p>";
            echo "</div>";

            echo "<div class='col-md-3 col-sm-12'>";
              echo "<div class='btn-group mb-3' role='group'>";
                echo "<button type='button' class='btn btn-outline-primary'  onclick='decreseAmount({$db_products_id})'>-</button>";
                echo "<p id='{$db_products_id}' class='px-3'>{$initialValue} {$type}</p>";
                echo "<button type='button' class='btn btn-outline-primary' onclick='indecreseAmount({$db_products_id}, $db_products_cat)'>+</button>";
              echo "</div>";
              echo "<button type='button' class='btn btn-lg btn-primary btn-block p-2 w-100' onclick='addToCart({$db_products_id})' name='button'><i class='fas fa-cart-plus'></i> Añadir</button>";
            echo "</div>";


          echo "</div>"; // row
        echo "</div>"; // container
      echo "</div>"; // card-body

  echo "</div>"; //card
  }

 ?>
