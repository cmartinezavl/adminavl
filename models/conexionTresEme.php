<?php 
	$serverName = "200.6.113.27\AVLMSSQL2022";
	//$serverName = "10.100.35.6\AVLMSSQL2022";
	$connectionInfo = array( "Database"=>"speedtreseme", "UID"=>"sa", "PWD"=>"Avlchile$2022", "CharacterSet" => "UTF-8", "ReturnDatesAsStrings" => true);
	$conexion = sqlsrv_connect( $serverName, $connectionInfo);

?>