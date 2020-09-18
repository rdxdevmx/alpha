<?php 
	session_start();

	ob_start();

	require 'conexion.php';
	require_once("conekta-php-master/lib/Conekta.php");


	//test key_aqAa4iQAsZauJFJhJtTCtQ
	//real key_DjqdbnXYfVsZbwC3WPzfMA

	\Conekta\Conekta::setApiKey("key_aqAa4iQAsZauJFJhJtTCtQ");
	\Conekta\Conekta::setApiVersion("2.0.0");

	print_r($_POST);

	$total = $_POST['total'] * 100;

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
	      "currency" => "MXN",
	      "customer_info" => [
	        "name" => $_POST['name'],
	        "email" => $_POST['email'],
	        "phone" => $_POST['phone']
	      ],
	      "metadata" => ["reference" => "12987324097", "more_info" => "lalalalala"],
	      "charges" => [
	        [
	          "payment_method" => [
	            "type" => $_POST['type'],
	            "expires_at" => $thirty_days_from_now,
	            "token_id" => "tok_test_visa_4242"
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

	echo "<pre>";
	print_r($order->id);
	echo "</pre>";


	$query = 'UPDATE pedido SET id_pago = "'.$order->id.'", type="'.$_POST['type'].'" , name= "'.$_POST['name'].'", email="'.$_POST['email'].'", phone="'.$_POST['phone'].'"   where id_pedido= '.$_POST['id_pedido'];
	$muestra = mysql_query($query) or die('Consulta fallida:'. mysql_error()); 


	// if($_POST['type'] == 'card'):

	// 	if($order->payment_status=='paid'):
	// 		$_SESSION['m'] = '<p>El pago se realizó correctamente.</p>';
	// 	else:
	// 		$_SESSION['m'] = '<p>payment_status: '.$order->payment_status.'</p>';
	// 	endif;

	// 	header('Location:'$_SERVER['HTTP_REFERER']);

	// endif;

	// echo '<pre>';
	// print_r($order);

	// echo "ID: ". $order->id;
	// echo "Payment Method:". $order->charges[0]->payment_method->service_name;
	// echo "Reference: ". $order->charges[0]->payment_method->reference;
	// echo "$". $order->amount/100 . $order->currency;
	// echo "Order";
	// echo $order->line_items[0]->quantity .
	//       "-". $order->line_items[0]->name .
	//       "- $". $order->line_items[0]->unit_price/100;

	if($_POST['type'] == 'card'): 

		if($order->payment_status=='paid'):

			echo "ID: ". $order->id;
			echo "Payment Method:". $order->charges[0]->payment_method->service_name;
			echo "Reference: ". $order->charges[0]->payment_method->reference;
			echo "$". $order->amount/100 . $order->currency;
			echo "Order";
			echo $order->line_items[0]->quantity .
			      "-". $order->line_items[0]->name .
			      "- $". $order->line_items[0]->unit_price/100;

			//actualización de pedido
			$query = 'UPDATE pedido SET id_pago = "'.$order->id.'", status=1, tipo_pago=3 , name= "'.$_POST['name'].'", email="'.$_POST['email'].'", phone="'.$_POST['phone'].'"   where id_pedido= '.$_POST['id_pedido'];

			$muestra = mysql_query($query) or die('Consulta fallida:'. mysql_error()); 

			$_SESSION['m'] = '<div class="alert alert-success">El pago se realizó correctamente.</div>';

		else:

			$_SESSION['m'] = '<div class="alert alert-danger">payment_status: '.$order->payment_status.'</div>';

		endif;

		header('Location:'.$_SERVER['HTTP_REFERER']);

		die();

	endif;

	ob_end_flush();
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
					
					<?php if($_POST['type']=='spei'): ?>
					<div class="ps-brand"><img src="img/spei_brand.png" alt="Banorte"></div>
					<?php elseif($_POST['type']=='oxxo_cash'): ?>
					<div class="opps-brand"><img src="img/oxxopay_brand.png" alt="OXXOPay"></div>
					<?php endif; ?>

					<div class="ps-amount">
						<h3>Monto a pagar</h3>
						<h2><?=$order->amount/100?><sup><?=$order->currency?></sup></h2>
						<?php if($_POST['type']=='spei'): ?>
						<p>Utiliza exactamente esta cantidad al realizar el pago.</p>
						<?php elseif($_POST['type']=='oxxo_cash'): ?>
						<p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if($_POST['type']=='spei'): ?>
				<div class="ps-reference">
					<h3>CLABE</h3>
		          <h1><?=$order->charges[0]->payment_method->receiving_account_number;?></h1>
		          <br>
		          <h3>PRODUCTOS</h3>
		          <p><?=$order->line_items[0]->quantity .
			      "-". $order->line_items[0]->name .
			      "- $". $order->line_items[0]->unit_price/100;?></p>
				</div>
				
				<?php elseif($_POST['type']=='oxxo_cash'): ?>
				<div class="opps-reference">
					<h3>Referencia</h3>
		          <h1><?=$order->charges[0]->payment_method->reference;?></h1>
		          <div>
		            <h3>
		              <?=$order->line_items[0]->quantity .
				      "-". $order->line_items[0]->name .
				      "- $". $order->line_items[0]->unit_price/100;?>
		            </h3>
		          </div>
				</div>
				<?php endif; ?>

			</div>

			<div class="ps-instructions">
			
			<?php if($_POST['type']=='spei'): ?>

				<h3>Instrucciones</h3>
				<ol>
					<li>Accede a tu banca en línea.</li>
					<li>Da de alta la CLABE en esta ficha. <strong>El banco deberá de ser STP</strong>.</li>
					<li>Realiza la transferencia correspondiente por la cantidad exacta en esta ficha, <strong>de lo contrario se rechazará el cargo</strong>.</li>
					<li>Al confirmar tu pago, el portal de tu banco generará un comprobante digital. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<div class="ps-footnote">Al completar estos pasos recibirás un correo de <strong>Nombre del negocio</strong> confirmando tu pago.</div>

			<?php elseif($_POST['type']=='oxxo_cash'): ?>

				<h3>Instrucciones</h3>
				<ol>
					<li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
					<li>Indica en caja que quieres realizar un pago de <strong>OXXOPay</strong>.</li>
					<li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
					<li>Realiza el pago correspondiente con dinero en efectivo.</li>
					<li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>EQUILIBRIO VISUAL</strong> confirmando tu pago.</div>

			<?php endif; ?>
			</div>

		</div>	
	</body>
</html>