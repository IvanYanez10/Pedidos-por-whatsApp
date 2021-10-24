<?php	include "includes/header.php";?>

<!-- Nav bar -->
<nav class="navbar  navbar-light bg-light">
  <div class="container-fluid">
    <!-- Categories -->
    <div class="dropdown text-end">
      <a class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bars" style="font-size: 1.5em;"></i>
      </a>
      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
        <?php	getCategories(); ?>
        <!-- <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li> -->
      </ul>
    </div>
    <img class="d-block" src="https://shop.subetuweb.site/images/favicon.png" alt="" width="55" height="50">
		<a href="https://api.whatsapp.com/send?phone=525573269615&text=Hola, informes de la tienda "
    style="text-decoration: none;"><i class="fab fa-whatsapp"></i> 55 4512 2354</a>
  </div>
</nav>

<!-- row -->
<div class="container-fluid">
  <div class="row">

		<!-- productos -->
    <div class="px-3">
			<?php getProducts($_COOKIE['categoria']); ?>
		</div> <!--  -->
  </div> <!-- row -->
</div> <!-- container -->

<!-- buttons cart and send order -->
  <?php
    getTotalNum();
    if ($GLOBALS["cartCount"] > 0) {  //bg-warning
      echo "<div class='btn-group float top-95 start-50 translate-middle'
      role='group' aria-label='Default button group'>";
      echo "<button type='button'
        class='btn  my-float position-relative'
        data-bs-toggle='offcanvas'
        data-bs-target='#offcanvasExample'
        aria-controls='offcanvasExample'>";

      echo "<i class='fas fa-shopping-cart'></i>";
      echo "<span class='position-absolute top-40 start-80 badge rounded-pill'>".$GLOBALS["cartCount"]."</span>";
      echo "</button>";
      echo "<a href='https://shop.subetuweb.site/form.php'
      type='button'
      class='btn  my-float ms-1'>
      <i class='fas fa-arrow-circle-right'></i></a>";
      echo "</div>";
    }
    else{
        echo "<a href='https://api.whatsapp.com/send?phone=525573269615&text=Hola'
        class='btn btn-lg my-float-message start-50 translate-middle'
        type='button'><div class='pulse'></div><i class='fab fa-whatsapp'></i></a>";
    }
  ?>
<!-- <p id="uno">some</p> -->
<!-- offcanvas shows cart products -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" data-bs-keyboard="false" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
  <h5 class="offcanvas-title" id="offcanvasExampleLabel">Carrito</h5>
  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
  <div class="dropdown mt-3">
    <?php
    	if (isset($_COOKIE['cartJS']) && $GLOBALS["cartCount"]!==0) {
    	  getCart();
    	  echo "</div>";
        echo "<div class='col-12'>";
    	  echo "<b>$".round($GLOBALS["sumatoria"], 2)."</b> <a style='color:#397ABF;
    	  text-decoration: none;
    	  cursor: pointer;' onclick='cleanCart()'>Vaciar carrito</a>";
        echo "</div>";
    	}else{
    	  echo "</div>";
    	  echo "Vacio";
    	}
      echo "<div class='col-12'>";
        echo "<a href='https://shop.subetuweb.site/form.php'
        type='button'
        class='btn my-float-1 m-1'>
        <i class='fas fa-arrow-circle-right'></i></a>";
      echo "</div>";
	  ?>
  </div>
</div>
</div>

<script type="text/javascript">
		const screen = window.matchMedia("(max-width: 640px)");
		// Sliders
		// const uno = document.getElementById('uno');
		function width(screen) {
			if (screen.matches) { // If media query matches
				// uno.innerHTML     = screen;
        console.log(screen)
			} else {
        console.log(screen)
				// uno.innerHTML     = "/slider/back-slide1.jpg";
			}
		}
		width(screen) // Call listener function at run time
		screen.addListener(width) // Attach listener function on state changes
	</script>

<!-- footer -->
<?php
	include "includes/footer.php";
	ob_end_flush();
?>

<!-- TODO: centrar logo ~ -->
<!-- TODO: formato de mensaje a whatsapp terminar -->
<!-- TODO: maquetacion para dispositivos moviles -->
<!-- TODO: cookie mensaje de uso -->
