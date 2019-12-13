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
		
		if ($consultaListaPorCuadernilloTabla == FALSE)
			die(FormatErrors(sqlsrv_errors()));
		while
			($row = sqlsrv_fetch_array($consultaListaPorCuadernilloTabla, SQLSRV_FETCH_ASSOC))
		{
			echo ($row['f412_id_ubicacion_aux']
				  ." | ".
				   $row['f410_consecutivo']
				  ." | ".
				   $row['f412_numero_etiqueta']
				  ." | ".
	   			   $row['f120_descripcion']
				  ." | <br />");
		}
	
		sqlsrv_free_stmt ($consultaListaPorCuadernilloTabla);
		
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
			
	<form name = "consulta" action = consultas.php method="get">
		<input type = "text" name = "idCuadernillo" required ="no debe estar en blanco">
		<input type="submit" value = "cargar">
  	</form
		
	
	</body>

	
</html>