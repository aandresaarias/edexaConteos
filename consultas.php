ErP!test181nt
ErP!test181nt
<?php
include('conn.php');
	
	$idCuadernillo = ($_GET['idCuadernillo']);
	//echo $idCuadernillo;
		
	$consultaCuadernillos = sqlsrv_query($conn, "
	SELECT
	  DISTINCT	
      f412_id_ubicacion_aux
	  FROM [t412_cm_control_fisico_movto]
	  INNER JOIN [t410_cm_control_fisico] ON [dbo].[t410_cm_control_fisico].[f410_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_cntrl_fisico]
	  INNER JOIN [t120_mc_items] ON [t120_mc_items].[f120_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_item_ext]
	  where f410_rowid = '18'");
	
	$consultaListaCuadernillos = "SELECT
       f412_id_ubicacion_aux
	   ,f410_consecutivo
	   ,f412_numero_etiqueta
	   ,f120_descripcion
	  FROM [t412_cm_control_fisico_movto]
	  INNER JOIN [t410_cm_control_fisico] ON [dbo].[t410_cm_control_fisico].[f410_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_cntrl_fisico]
	  INNER JOIN [t120_mc_items] ON [t120_mc_items].[f120_rowid] = [t412_cm_control_fisico_movto].[f412_rowid_item_ext]
	  where f410_rowid = 28
		and f412_id_ubicacion_aux = '".$idCuadernillo."';";	
	  
//and f412_id_ubicacion_aux = 'S33M08N1'";
	
	$consultaListaPorCuadernilloTabla = sqlsrv_query($conn, $consultaListaCuadernillos);

	//echo $consultaCuadernillos;
	echo $consultaListaCuadernillos;
	echo $consultaListaPorCuadernilloTabla;
  	
?>