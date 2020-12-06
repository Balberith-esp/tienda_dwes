<?php 


	require_once '../../Conf/conexionDB.php';
	
	$conexion = getConexionMYSQLI();


	try {

		if ($_GET['action']=='list') {
			
			//sacar la cantidad total de registros en la tabla
			$consulta="SELECT count(*) as RecordCount from discos";
			$result=mysqli_query($conexion,$consulta);
			$row=mysqli_fetch_array($result);
			$recordCount=$row['RecordCount'];

			//obtenemos datos d paginacion y hacemos el query

			$campo_orden=$_GET['jtSorting'];
			$inicioReg=$_GET['jtStartIndex'];
			$finReg=$_GET['jtPageSize'];

			$consulta="SELECT * from discos 
					order by '$campo_orden'
					limit $inicioReg,$finReg";
			$result=mysqli_query($conexion,$consulta);

			//agregar datos a un arraglo y mandar por json
			$rows=array();
			while ($row=mysqli_fetch_array($result)) {
				$rows[]=$row;
			}

			$jTableResult=array();
			$jTableResult['Result']="OK";
			$jTableResult['TotalRecordCount']=$recordCount;
			$jTableResult['Records']=$rows;

			echo json_encode($jTableResult);
		}
		
	} catch (Exception $e) {
		$jTableResult=array();
		$jTableResult['Result']="ERROR";
		$jTableResult['Message']=$e->getMessage();
		echo json_encode($jTableResult);
	}

 ?>