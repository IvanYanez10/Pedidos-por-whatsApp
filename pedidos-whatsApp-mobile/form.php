<?php
  include "includes/header.php";
  if (!isset($_COOKIE['cartJS'])) {
    header("Location: http://localhost/Pedidos-por-whatsApp/aplicacion-wb-mobile/");
    exit;
  }
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://shop.subetuweb.site/images/favicon.png" alt="" width="72" height="57">
      <h2>Datos cliente</h2>
      <p class="lead">Gracias</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Tu Carrito</span>
          <?php
            getTotalNum();
            echo "<span class='badge bg-primary rounded-pill'>".$GLOBALS["cartCount"]."</span>";
          ?>

        </h4>

        <ul class="list-group mb-3">
            <?php
              reviewCart();

              echo "<li class='list-group-item d-flex justify-content-between'>";
              echo "<span>Total</span>";
              echo "<strong>$".round($GLOBALS["sumatoria"], 2)."</strong>";
              echo "</li>";

            ?>
        </ul>

        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form> -->
      </div>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Direccion de entrega</h4>
        <form action="send_order.php" class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Su nombre es requerido.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Apellido</label>
              <input type="text" class="form-control" name="lastName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Su apellido es requerido.
              </div>
            </div>

            <!-- <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Opcional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div> -->

            <div class="col-12">
              <label for="address" class="form-label">Direccion</label>
              <input type="text" class="form-control" name="address" placeholder="calle #, colonia" required="">
              <div class="invalid-feedback">
                Por favor ingrese su direccion de entrega.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">C.P.</label>
              <input type="text" class="form-control" name="zip" placeholder="" required="">
              <div class="invalid-feedback">
                Su CP es requerido.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Tipo de pago</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="eff" name="paymentMethod" type="radio" class="form-check-input" required="" checked disabled>
              <label class="form-check-label" for="eff">Efectivo</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="" disabled>
              <label class="form-check-label" for="debit">Tarjeta</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="" disabled>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit"><i class="fab fa-whatsapp"></i> Envíar pedido</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-2 pt-5 text-muted text-center text-small">
    <p class="mb-1">©2021</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacidad</a></li>
      <li class="list-inline-item"><a href="#">Terminos</a></li>
      <li class="list-inline-item"><a href="#">Soporte</a></li>
    </ul>
  </footer>
</div>

<!-- <script src="form-validation.js"></script> -->

<?php
	include "includes/footer.php";
	ob_end_flush();
?>
