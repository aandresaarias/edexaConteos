<?php
include('conn.php');

$idCuadernillo = $_POST['idCuadernillo'];
if ($conn)
		{
			$consultaListaCuadernillos = "
			SELECT
			   f412_id_ubicacion_aux
			   ,f410_consecutivo
			   ,f412_numero_etiqueta
			   ,f120_descripcion
			  FROM [t412_cm_control_fisico_movto]
			  INNER JOIN [t410_cm_control_fisico] ON [dbo].[t410_cm_control_fisico].[f410_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_cntrl_fisico]
			  INNER JOIN [t120_mc_items] ON [t120_mc_items].[f120_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_item_ext]
			  where f410_rowid = 18
			  and f412_id_ubicacion_aux = '$idCuadernillo'";

	$consultaListaPorCuadernilloTabla = sqlsrv_query($conn, $consultaListaCuadernillos);
		
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
		}
		else
		{
			echo("no se conectó a la bd" + $connInfo["Database"]);
			die (print_r(sqlsrv_errors(), true));
		}
	
	/*
	$consultaCuadernillos = sqlsrv_query($conn, "
	SELECT
	  DISTINCT	
      f412_id_ubicacion_aux
	  FROM [t412_cm_control_fisico_movto]
	  INNER JOIN [t410_cm_control_fisico] ON [dbo].[t410_cm_control_fisico].[f410_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_cntrl_fisico]
	  INNER JOIN [t120_mc_items] ON [t120_mc_items].[f120_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_item_ext]
	  where f410_rowid = '18'");
	  */
		
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