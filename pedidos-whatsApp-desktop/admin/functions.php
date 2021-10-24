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
    echo "<h3 style='text-align: center;'s>Mejores del mes</h3>";
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

      if ($_COOKIE['categoria'] == 1) {

        echo "<div class='col-4'>";
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
        echo "<p class='card-text col-5'>$ <b>{$db_products_price}</b>/{$type1}</p>";
        // buttons +-
				echo "<div class='btn-group col-7' role='group'>";
        echo "<button type='button' class='btn btn-outline-dark' onclick='decreseAmount({$db_products_id})'>-</button>";
			  echo "<p id='{$db_products_id}' class='px-2 col-8 text-center'>{$initialValue} {$type}</p>";
			  echo "<button type='button' class='btn btn-outline-dark' onclick='indecreseAmount({$db_products_id}, $db_products_cat)'>+</button>";
				echo "</div>"; // btn-group
				echo "</div>"; // col-2

        // button add to cart
        echo "<div class='row'>";
        echo "<button type='button' class='btn btn-primary btn-block p-1' onclick='addToCart({$db_products_id})' name='button'>Añadir</button>";
        echo "</div>"; // col-2

				echo "</div>"; // container
				echo "</div>"; // card-body
    		echo "</div>"; //card
        echo "</div>"; //col


      }else{

        echo "<div class='card w-auto my-2'>";

					  echo "<div class='card-header'>";
					  	echo "<h3>{$db_products_name}</h3>";
					  echo "</div>";

				  	echo "<div class='card-body'>";
							echo "<div class='container-fluid'>";
						 		echo " <div class='row'>";

									echo "<div class='col-3'>";
										echo "<img src='$db_products_image' alt='' style='width:150px; height:150px;'>";
									echo "</div>";

									echo "<div class='col-7'>";
										echo "<h5 class='card-title'>Descripcion</h5>";
										echo "<p class='card-text'>{$db_products_description}</p>";
										echo "<p class='card-text'>$ {$db_products_price}/{$type1}</p>";
									echo "</div>";

									echo "<div class='col-2'>";
										echo "<div class='btn-group mb-1' role='group'>";
										  echo "<button type='button' class='btn btn-outline-dark'  onclick='decreseAmount({$db_products_id})'>-</button>";
										  echo "<p id='{$db_products_id}' class='px-3'>{$initialValue} {$type}</p>";
										  echo "<button type='button' class='btn btn-outline-dark' onclick='indecreseAmount({$db_products_id}, $db_products_cat)'>+</button>";
										echo "</div>";
										echo "<button type='button' class='btn btn-lg btn-primary btn-block p-2' onclick='addToCart({$db_products_id})' name='button'>Añadir</button>";
									echo "</div>";


					  		echo "</div>"; // row
							echo "</div>"; // container
						echo "</div>"; // card-body

    		echo "</div>"; //card
        }
  }
  if ($_COOKIE['categoria'] == 1) {
    echo "</div>"; //row
  }
}

function  getTotalNum(){
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

?>
