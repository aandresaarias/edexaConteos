<html>
	<body>
	<?php
	include 'conn.php';
	include 'consultas.php';
	
	if ($conn)
		{
			echo("conexion establecida a BD " . $connInfo["Database"] . ".<br />");
		}
		else
		{
			echo("no se conectó a la bd" + $connInfo["Database"]);
			die (print_r(sqlsrv_errors(), true));
		}
		
		echo ("Cargando" .PHP_EOL);
		if ($consultaCuadernillos == FALSE)
			die(FormatErrors(sqlsrv_errors()));
		while
			($row = sqlsrv_fetch_array($consultaCuadernillos, SQLSRV_FETCH_ASSOC))
		{
			echo ($row['f412_id_ubicacion_aux'].PHP_EOL);
		}
	
		sqlsrv_free_stmt ($consultaCuadernillos);
		
		function FormatErrors( $errors )
		{
			/* Display errors. */
			echo "Error information: ";

			foreach ( $errors as $error )
			{
				echo "SQLSTATE: ".$error['SQLSTATE']."";
				echo "Code: ".$error['code']."";
				echo "Message: ".$error['message']."";
			}
		}
	?>
			
	<form action = consultas.php method="get">
		<input type = "text" name = "idCuadernillo" required ="no debe estar en blanco">
		<input type="submit" value = "cargar">
  	</form
		
	
	</body>

	
</html>