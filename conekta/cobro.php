<?php
require 'conexion.php';
$id_pedido =17;

require_once("conekta-php-master/lib/Conekta.php");

\Conekta\Conekta::setApiKey("key_aqAa4iQAsZauJFJhJtTCtQ");
\Conekta\Conekta::setApiVersion("2.0.0");

/**/
  $query = 'SELECT * FROM vac_pedido LEFT JOIN vacunas ON id_vacuna = id_vac WHERE id_pedido = '.$id_pedido;

  $muestra = mysql_query($query) or die('Consulta fallida:'. mysql_error()); 

  
  $cant = 0; $total = 0;
  while ($row = mysql_fetch_array($muestra, MYSQL_ASSOC)) :

    $cant += $row['cantidad'];
    $total += $row['precio_dist'];

  endwhile;

  $total = $total *100;

try{
  $order = \Conekta\Order::create(
    [
      "line_items" => [
        [
          "name" => "Producto de prueba",
          "unit_price" => $total,
          "quantity" => 1
        ]
      ],
      "shipping_lines" => [
        [
          "amount" => 0,
          "carrier" => "FEDEX"
        ]
      ], //optional - shipping_lines are only required for physical goods
      "currency" => "MXN",
      "customer_info" => [
        "name" => "nombre",
        "email" => "fulanito@conekta.com",
        "phone" => "5512345678"
      ],
      "shipping_contact" => [
        "address" => [
          "street1" => "Calle 123, int 2",
          "postal_code" => "06100",
          "country" => "MX"
        ]
      ], //optional - shipping_contact is only required for physical goods
      "metadata" => ["reference" => "12987324097", "more_info" => "lalalalala"],
      "charges" => [
        [
          "payment_method" => [
            "type" => "card",
            "token_id" => "tok_test_visa_4242"
          ] //payment_method - use customer's default - a card
            //to charge a card, different from the default,
            //you can indicate the card's source_id as shown in the Retry Card Section
        ]
      ]
    ]
  );
} catch (\Conekta\ProcessingError $error){
  echo $error->getMessage();
} catch (\Conekta\ParameterValidationError $error){
  echo $error->getMessage();
} catch (\Conekta\Handler $error){
  echo $error->getMessage();
}

// echo '<pre>';
// print_r($order);


echo "ID: ". $order->id;
echo "<br> Status: ". $order->payment_status;
echo "<br> $". $order->amount/100 . $order->currency;
echo "<br> Order";
echo $order->line_items[0]->quantity .
      "-". $order->line_items[0]->name .
      "- $". $order->line_items[0]->unit_price/100;
echo "<br> Payment info";
echo "<br> CODE:". $order->charges[0]->payment_method->auth_code;
echo "<br>Card info:".
      "- ". $order->charges[0]->payment_method->name .
      "- ". $order->charges[0]->payment_method->last4 .
      "- ". $order->charges[0]->payment_method->brand .
      "- ". $order->charges[0]->payment_method->type;

?>