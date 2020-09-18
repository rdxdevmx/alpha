<?php
$body = @file_get_contents('php://input');
$data = json_decode($body);
http_response_code(200); // Return 200 OK 

if ($data->type == 'charge.paid'){

	//se guarda la respuesta en un archivo 
	$objData = serialize( $data);
	$filePath = getcwd()."/responce/pg_last_notice(connection).txt";
	if (is_writable($filePath)) {
	    $fp = fopen($filePath, "w"); 
	    fwrite($fp, $objData); 
	    fclose($fp);
	}

}

?>