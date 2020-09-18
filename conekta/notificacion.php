<?php

require_once("conekta-php-master/lib/Conekta.php");

\Conekta\Conekta::setApiKey("key_aqAa4iQAsZauJFJhJtTCtQ");
\Conekta\Conekta::setApiVersion("2.0.0");

$body = @file_get_contents('php://input');
$data = json_decode($body);
http_response_code(200); // Return 200 OK 


if ($data->type == 'charge.paid'){
	$msg = "Tu pago ha sido comprobado.";
  	//mail("fulanito@conekta.com","Pago confirmado",$msg);

}

	file_put_contents('response.json', $body);
