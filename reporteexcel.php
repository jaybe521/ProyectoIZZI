<?php
    $conexion = new mysqli('localhost','root','','proyecto',3306);// aqui se selecciona el tipo de documento que se realizara con los datos que se obtengan de la base de datos, igual manera se especifica el formato del archivo que contendra, dando el nombre del archivo con el cual se generara y el formato que se le desea dar a los datos que se almacenaran en dicho archivo
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}
	$nombre=$_POST["reporte"];
	/*if(condiciones para el primer reporte){
	}else{
		if(condiciones para el segundo reporte){
		}else{
			if(condiciones para el tercer reporte){
			}
		}
	}*/
	//Lo que sigue ya son sentencias para los datos del reporte que se generara dentro de las distintas condiciones que se presenten
	$consulta = "SELECT * FROM productos";
	$resultado = $conexion->query($consulta);
	if($resultado->num_rows > 0 ){
		require_once 'lib/PHPExcel/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
		$tituloReporte = "Informe General";
		$titulosColumnas = array('nombre_prod', 'Precio');
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:D1');		
		// Se agregan los titulos de las columnas
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A3',  $titulosColumnas[0])
		            ->setCellValue('B3',  $titulosColumnas[1]);

		//Se agregan los datos
		$i = 4;
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['nombre_prod'])
		            ->setCellValue('B'.$i,  $fila['Precio']);
					$i++;
		}
		for($i = 'A'; $i <= 'D'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		// Inmovilizar paneles
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$nombre.'.csv"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>