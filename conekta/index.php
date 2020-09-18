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
  
  </head>
<body>


<section id="detalles">
<div class="container">
  <div class="row">

    <h2>ORDEN DE PAGO</h2>

    <h3>DETALLES DEL PEDIDO</h3>

    <div class="col-xs-12 col-sm-4">
      
      <img src="img/producto-prueba.jpg" class="img-responsive" alt="">
      
        
    </div>
    <div class="col-xs-12 col-sm-8">
        <p><b>Producto de prueba</b></p>
        <p><b>Cantidad:</b>3</p>
        <p><b>Precio Unitario:</b> $30,000</p>
        <p><b>Precio Total:</b> $90,000</p>
    </div>


  </div>
</div>
</section>


<hr>


<section>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
    <h3>METODOS DE PAGO</h3>


    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        PAGO CON TARJETA</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      <br>
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
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        OXXO</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      <form action="oxxo.php" method="POST">

          <button class="btn btn-danger">GENERAR REFERENCIA</button>
      </form>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        SPEI</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
        <form action="spei.php" method="POST">

          <button class="btn btn-danger">GENERAR REFERENCIA</button>
        </form>
      </div>
    </div>
  </div>
</div> 
</section>


  




    </div>
  </div>
</div>

<script type="text/javascript" >
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
