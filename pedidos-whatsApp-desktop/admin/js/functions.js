
function decreseAmount(id_num){
  var number = returnNum(id_num);
  if (number < 10) {
    number = (Number(number)-0.05).toFixed(2);
  }else {
    number = Number(number)-50;
  }

  var total;
  if (number < 1000 &&  number > 10) { // se mantiene entre 10 y 1000
    total = number + " g";
  }else if (number === 0) { // minimo regresa a 100g
    total = 100 + " g";
  }else if (number < 1) { // si baja de un kilo lo convierte a gramos
    total = 950 + " g";
  }else{
    total = number + " kg";
  }
  document.getElementById(id_num).textContent=total;
}

function indecreseAmount(id_num, id_cat){

  var number = returnNum(id_num);

  if (id_cat == 10) {

    number = Number(number)+1;
    var total;
    if (number < 2) { //
      total = number + " pz";
    } else if (number > 3) { //
      number = 1;
      total = number + " pz";
    } else{
      total = number + " pzs";
    }

  }else{
    if (number < 10) {
      number = (Number(number)+0.05).toFixed(2);
    }else {
      number = Number(number)+50;
    }
    var total;
    if (number < 1000 &&  number > 10) { // se mantiene entre 10 y 1000
      total = number + " g";
    } else if (number === 1000) { // si llega a un kilo lo convierte a 1
      total = number/1000 + " kg";
    }else if (number === 3.05) { // maximo regresa a 100g
      total = 100 + " g";
    }else{
      total = number + " kg";
    }
  }

  document.getElementById(id_num).textContent=total;
}

function returnNum(id_num){
  var w = document.getElementById(id_num).textContent;
  w = w.split(" ",1);
  w = (Number(w));
  return w;
}

function myFunction(number) {
  document.cookie = "categoria=" + number + ";";
  location.reload();
}

function addToCart(id_product) {
  checkIfExist(id_product);
  location.reload();
}

function checkIfExist(id_product){

  if (document.cookie.split('; ').find(row => row.startsWith('cartJS'))) { // CartJs exist?

    var x = JSON.parse(getCookie("cartJS"));

    var y = new Boolean(false);

    for (var i=0;i < x.length;i++){
      if (id_product == x[i].id) {

        var add = x[i].kg + returnNum(id_product);

        updateCookieProduct(id_product, add);

        y = true;

        break;
      }
    }
    if (y == false) {
      updateCookie(id_product, returnNum(id_product));
    }

  }else{
    createCookie(id_product, returnNum(id_product));
  }
}

function cleanCart(){
  document.cookie = "cartJS=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  location.reload();
}

function updateCookieProduct(id_product, weight) {
  // console.log("Updating product cart");
  var arr = JSON.parse(getCookie("cartJS"));

  var filtered = arr.filter(function(el) { return el.id != id_product; });
  var json_str = JSON.stringify(filtered);
  document.cookie = "cartJS" + "=" + json_str;

  arr = JSON.parse(getCookie("cartJS"));
  arr.push({"id":id_product, "kg":weight});
  json_str = JSON.stringify(arr);
  document.cookie = "cartJS" + "=" + json_str;
}

function updateCookie(id_product, weight) {
  console.log("Updating cart");
  var arr = JSON.parse(getCookie("cartJS"));
  arr.push({"id":id_product, "kg":weight});
  var json_str = JSON.stringify(arr);
  document.cookie = "cartJS" + "=" + json_str;
}

function createCookie(id_product, weight) {
  console.log("Creating");
  var arr = [{"id":id_product, "kg":weight}];
  var json_str = JSON.stringify(arr);
  document.cookie = "cartJS" + "=" + json_str;
}

function getCookie(name) {
  // console.log("Getting");
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  // console.log(document.cookie);
  for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) {
        return c.substring(nameEQ.length,c.length);
      }
  }
  return null;
}

function onDeleteFCart(id_product){
  console.log("Deleted");

  var arr = JSON.parse(getCookie("cartJS"));
  var filtered = arr.filter(function(el) { return el.id != id_product; });
  var json_str = JSON.stringify(filtered);
  document.cookie = "cartJS" + "=" + json_str;
  location.reload();
}
