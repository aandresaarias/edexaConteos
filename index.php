<html>
	<?php
	include 'conn.php';
	
	if ($conn)
		{
			echo("conexion establecida a BD " . $connInfo["Database"] . ".<br />");
		}
		else
		{
			echo("no se conectó a la bd" + $connInfo["Database"]);
			die (print_r(sqlsrv_errors(), true));
		}
		asdasd
	?>
	
	<h1> CONTEO EDEXA</h1>
</html>



