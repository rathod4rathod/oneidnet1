<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Payworks</title>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<?php 
	require('http_client.php');
	$http = new httpClient();
	$http->Connect("eps.banorte.com", 443) or die("Connect problem");
	$params = array( 
		"Name" => "Mohammad ", // USUARIOS Y CONTRASEÑAS CREADOS PARA LAS TRANSACCIONES ONLINE
		"Password" => "0000", 
		"ClientId" => "79731111", // ID DE COMERCIO
		"Mode" => "R", //P = PRODUCCION, Y = APROBADA, N = RECHAZADA, R= RANDOM
		"TransType" => "Auth", // CONSULTAR DOCUMENTACION PARA VER TIPOS
		
		"Number" => "0000000000000000", // TARJETA VISA O MASTERCARD
		"Expires" => "12/75", // EXPIRA MM/YY
		"Cvv2Indicator" => "1", //SI NO TIENE CCV SE PONE EN 0
		"Cvv2Val" => "342" , // CCV DE LA TARJETA
		"Total" => ".10", // MONTO EN MXN
		
		//DATOS DEL PEDIDO
		'OrderId' => '87860', // INDICADOR UNICO, SI YA SE COBRO NO SE DEBE REPETIR, EL NO UNICO ES PoNumber
		'ChargeDesc1' => 'DANISH TEST PAYMENT',
		
	);
	$status = $http->Post("/recibo", $params);
	$raw = array(
		'ResponseCode' 	=> $status,
		'CcErrCode' 	=> $http->getHeader("CcErrCode"),
		'AuthCode' 		=> $http->getHeader("AuthCode"),
		'Text'			=> $http->getHeader("Text"),
		'CcReturnMsg'	=> $http->getHeader("CcReturnMsg"),
		'ProcReturnMsg'	=> $http->getHeader("ProcReturnMsg"),
		'Total'			=> $http->getHeader("Total")
	);
	$http->Disconnect();
	
	if($http->getHeader("CcErrCode") == 1){
		echo "<b>¡Aprobada! transacción: ".$http->getHeader('AuthCode')." </b>";
	}else{
		echo "<b>¡Declinada!, motivo: ".$http->getHeader('Text')." </b>";
	}
	
?>
<pre>
<?=print_r($raw);?>
</pre>
</body>
</html>
