<?php
require 'conexion.php';
$id_pedido = $_GET['id'];

/**/
  $query = 'SELECT * FROM vac_pedido LEFT JOIN vacunas ON id_vacuna = id_vac WHERE id_pedido = '.$id_pedido;

  $muestra = mysql_query($query) or die('Consulta fallida:'. mysql_error()); 

  
  $cant = 0; $total = 0;
  while ($row = mysql_fetch_array($muestra, MYSQL_ASSOC)) :

    $cant += $row['cantidad'];
    $total += $row['precio_dist'];

  endwhile;

  $total = $total ;

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>  

    <link href="css/oxxo-style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  
  </head>
<body>

  
    <div class="opps">
      <div class="opps-header">
        <div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
        <div class="opps-info">
<!--           <div class="opps-brand"><img src="img/oxxopay_brand.png" alt="OXXOPay"></div> -->
          <div class="opps-ammount">
            <h3>Monto a pagar</h3>
            <h2><?="$". $total?><sup>MXN</sup></h2>
            
          </div>
        </div>
        <div class="opps-reference">
<!--           <h3>Referencia</h3>
          <h1><?=$order->charges[0]->payment_method->reference;?></h1>
          <div>
            <h3>
              <?=$order->line_items[0]->quantity .
      "-". $order->line_items[0]->name .
      "- $". $order->line_items[0]->unit_price/100;?>
            </h3>
          </div> -->
        </div>
      </div>
      <div class="opps-instructions">
        <h3>Pago con tarjeta</h3>
          <form action="cobro.php" method="POST" id="card-form">
            <span class="card-errors"></span>
            <div>
              <label>
                <span>Nombre del tarjetahabiente</span>
                <input type="text" size="20" data-conekta="card[name]">
              </label>
            </div>
            <div>
              <label>
                <span>Número de tarjeta de crédito</span>
                <input type="text" size="20" data-conekta="card[number]">
              </label>
            </div>
            <div>
              <label>
                <span>CVC</span>
                <input type="text" size="4" data-conekta="card[cvc]">
              </label>
            </div>
            <div>
              <label>
                <span>Fecha de expiración (MM/AAAA)</span>
                <input type="text" size="2" data-conekta="card[exp_month]">
              </label>
              <span>/</span>
              <input type="text" size="4" data-conekta="card[exp_year]">
            </div>
            <button class="btn btn-danger" type="submit">PAGAR</button>
          </form>
        <div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>EQUILIBRIO VISUAL</strong> confirmando tu pago.</div>
      </div>
    </div>  


  <script type="text/javascript">
  Conekta.setPublicKey('key_NqffTXjee7NqbkbkBmQxvxg');


  var conektaSuccessResponseHandler = function(token) {
    var $form = $("#card-form");
    //Inserta el token_id en la forma para que se envíe al servidor
    $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token.id));
    $form.get(0).submit(); //Hace submit
  };
  var conektaErrorResponseHandler = function(response) {
    var $form = $("#card-form");
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);
  };


  //jQuery para que genere el token después de dar click en submit
  $(function () {
    $("#card-form").submit(function(event) {
      event.preventDefault();
      var $form = $(this);
      // Previene hacer submit más de una vez
      $form.find("button").prop("disabled", true);
      Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
      return false;
    });
  });
</script>

</body>
</html>
