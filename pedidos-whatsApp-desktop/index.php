<?php	include "includes/header.php";?>

<!-- Nav bar -->
<nav class="navbar  navbar-light bg-light">
  <div class="container-fluid">
    <p class="navbar-brand" >Identidad</p>
		<a href="https://api.whatsapp.com/send?phone=525573269615&text=Hola, informes de la tienda "
    style="text-decoration: none;"><i class="fab fa-whatsapp"></i> 55 4512 2354</a>
  </div>
</nav>

<!-- row -->
<div class="container-fluid mt-3">
  <div class="row">

		<!-- categorias -->
		<div class="col-2" style="border-width: 1px;border-right-style:solid;">
			<h2>Categorias</h2>
			<ul style="text-decoration: none;">
				<?php	getCategories(); ?>
			</ul>
    </div>

		<!-- productos -->
    <div class="col-7">
			<?php
	      if (isset($_COOKIE['categoria'])) {
					getProducts($_COOKIE['categoria']);
				}else{
					getProducts(1);
				}
			?>
		</div>

		<!-- datos -->
    <div class="col-3">

				<!-- carrito -->
				<div class="p-3">
					<h4 class="row">
            <button class="btn btn-outline-primary position-relative" style="cursor: context-menu; border-radius: 15px;" disabled>
            <i class="fas fa-shopping-cart"></i>
            <?php
            getTotalNum();
            echo "<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary' style='color:white;'>".$GLOBALS["cartCount"]."</span>";
            ?>
            </button>
            <p class="ml-4">Carrito</p>
          </h4>

					<div style="overflow-y: scroll; height:270px;">

							<?php
              if (isset($_COOKIE['cartJS']) && $GLOBALS["cartCount"]!==0) {
                getCart();
                echo "</div>";
                echo "<b>$".round($GLOBALS["sumatoria"], 2)."</b> <a style='color:#397ABF;
                text-decoration: none;
                cursor: pointer;' onclick='cleanCart()'>Vaciar carrito</a>";
              }else{
                echo "</div>";
                echo "Vacio";
              }
              ?>
				</div>

				<!-- tipo de entrega -->
				<div class="p-3">
					<h4><i class="fas fa-motorcycle"></i> Tipo de entrega</h4>
					<div class="card text-center">
					  <div class="card-header">

					    <ul class="nav nav-tabs card-header-tabs">

					      <li class="nav-item">
					        <a class="nav-link active" aria-current="true" href="#">A domicilio</a>
					      </li>

					      <li class="nav-item">
					        <a class="nav-link disabled" href="#">Pickup</a>
					      </li>

								<li class="nav-item">
					        <a class="nav-link disabled" href="#">Agendar pedido</a>
					      </li>

					    </ul>

					  </div>

					  <div class="card-body">
					    <form class="" action="index.html" method="post" autocomplete="off">
								<div class="row g-3">

			            <div class="col-12 pb-1">
			              <input type="text" class="form-control" id="firstName" placeholder="Nombre" value="" required="" autocomplete="off">
			            </div>

			            <div class="col-12 pb-1">
			              <input type="text" class="form-control" id="telefono" placeholder="Telefono" autocomplete="off">
			           </div>

			            <div class="col-9">
			              <input type="text" class="form-control" id="address" placeholder="Direccion" required="" autocomplete="off">
			            </div>

			            <div class="col-3">
										 <!-- TODO:  3-verificar CP -->
			              <input type="text" class="form-control" id="zip" placeholder="CP" required="" autocomplete="off">
			            </div>

			          </div>
					    </form>
					  </div>

					</div>
				</div>

				<!-- instrucciones especiales -->
				<div class="p-3">
					<h4>Instrucciones adicionales  <span style="color:white; font-size:15px;"class="badge bg-secondary">opcional</span></h4>
					<textarea class="d-block" name="name" rows="2" cols="50"></textarea>
					<a href="#">Politica de privacidad</a>
				</div>

				<button name="ordenar"  class="btn btn-lg btn-primary btn-block" type="submit"><i class="fab fa-whatsapp"></i> Enviar pedido</button>
    </div>

  </div>
</div>

<!-- footer -->
<?php
	include "includes/footer.php";
	ob_end_flush();
?>
<!-- TODO: formato de mensaje a whatsapp -->
<!-- TODO: maquetacion para dispositivos moviles -->
<!-- TODO: maquetacion responsive otros aspec ratios -->
<!-- TODO: Botones de agregar mas centrar -->
<!-- TODO: Tipos de entregas desabilitados -->
<!-- TODO: verificacion de CP -->
<!-- TODO: cookie mensaje de uso -->
<!-- TODO: Pruebas en servidor -->
<!-- se puede crear una tabla con los productos que quiere el usuario asignando un valor a cada usuario dinamicamente -->
