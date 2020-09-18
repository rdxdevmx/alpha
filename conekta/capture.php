<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("conekta-php-master/lib/Conekta.php");

\Conekta\Conekta::setApiKey("key_aqAa4iQAsZauJFJhJtTCtQ");
\Conekta\Conekta::setApiVersion("2.0.0");

$order = \Conekta\Order::find("ord_2oGwrYSMrm8pEZg97");

$order->capture());




