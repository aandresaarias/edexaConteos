<?php
	$serverName = "23.99.199.55\MSSQLSERVER2017,1433";
	$connInfo = array ("Database" => "axaAntiguo", "UID" => "sa", "PWD" =>"Sa123456");
	$conn = sqlsrv_connect ($serverName, $connInfo);
?>