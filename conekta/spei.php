<?php
require 'conexion.php';
require_once("conekta-php-master/lib/Conekta.php");

\Conekta\Conekta::setApiKey("key_aqAa4iQAsZauJFJhJtTCtQ");
\Conekta\Conekta::setApiVersion("2.0.0");


$id_pedido = $_GET['id'];

/**/
  $query = 'SELECT * FROM vac_pedido LEFT JOIN vacunas ON id_vacuna = id_vac WHERE id_pedido = '.$id_pedido;

  $muestra = mysql_query($query) or die('Consulta fallida:'. mysql_error()); 

  
  $cant = 0; $total = 0;
  while ($row = mysql_fetch_array($muestra, MYSQL_ASSOC)) :

    $cant += $row['cantidad'];
    $total += $row['precio_dist'];

  endwhile;

  $total = $total * 100;


try{
  date_default_timezone_set('America/Los_Angeles');
  $thirty_days_from_now = (new DateTime())->add(new DateInterval('P30D'))->getTimestamp(); 

  $order = \Conekta\Order::create(
    [
      "line_items" => [
        [
          "name" => "Vacuna y aplicación",
          "unit_price" => $total,
          "quantity" => 1
        ]
      ],
      "shipping_lines" => [
        [
          "amount" => 0,
          "carrier" => "FEDEX"
        ]
      ], //shipping_lines - physical goods only
      "currency" => "MXN",
      "customer_info" => [
        "name" => "Fulanito Pérez",
        "email" => "fulanito@conekta.com",
        "phone" => "+5218181818181"
      ],
      "shipping_contact" => [
        "address" => [
          "street1" => "Calle 123, int 2",
          "postal_code" => "06100",
          "country" => "MX"
        ]
      ], //shipping_contact - required only for physical goods
      "charges" => [
        [
          "payment_method" => [
            "type" => "spei",
            "expires_at" => $thirty_days_from_now
          ]
        ]
      ]
    ]
  );
} catch (\Conekta\ParameterValidationError $error){
  echo $error->getMessage();
} catch (\Conekta\Handler $error){
  echo $error->getMessage();
}



?>


<html>
	<head>
		<link href="css/spei-style.css" media="all" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	</head>
	<body>
		<div class="ps">
			<div class="ps-header">
				<div class="ps-reminder">Ficha digital. No es necesario imprimir.</div>
				<div class="ps-info">
					<div class="ps-brand"><img src="img/spei_brand.png" alt="Banorte"></div>
					<div class="ps-amount">
						<h3>Monto a pagar</h3>
						<h2><?=$order->amount/100?><sup><?=$order->currency?></sup></h2>
						<p>Utiliza exactamente esta cantidad al realizar el pago.</p>
					</div>
				</div>
				<div class="ps-reference">
					<h3>CLABE</h3>
          <h1><?=$order->charges[0]->payment_method->receiving_account_number;?></h1>
          <br>
          <h3>PRODUCTOS</h3>
          <p><?=$order->line_items[0]->quantity .
      "-". $order->line_items[0]->name .
      "- $". $order->line_items[0]->unit_price/100;?></p>
				</div>
			</div>
			<div class="ps-instructions">
				<h3>Instrucciones</h3>
				<ol>
					<li>Accede a tu banca en línea.</li>
					<li>Da de alta la CLABE en esta ficha. <strong>El banco deberá de ser STP</strong>.</li>
					<li>Realiza la transferencia correspondiente por la cantidad exacta en esta ficha, <strong>de lo contrario se rechazará el cargo</strong>.</li>
					<li>Al confirmar tu pago, el portal de tu banco generará un comprobante digital. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<div class="ps-footnote">Al completar estos pasos recibirás un correo de <strong>Nombre del negocio</strong> confirmando tu pago.</div>
			</div>
		</div>	
	</body>
</html>