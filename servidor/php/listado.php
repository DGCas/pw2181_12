<?php
	include 'conexiones.php';
	function listado(){
		$respuesta = false;
		$usuario=$_POST["usuario"];
		
		//conectarnos al servidor de BD
		$con=conecta();
		$consulta = "select * from usuarios where order by nombre";

		$resConsulta=mysqli_query($con,$consulta);
		$tabla="";
		if(mysqli_num_rows($resConsulta)>0){//cantidad registros
			$respuesta = true;
			$tabla.="<thead>";
			$tabla.="<tr>";
			$tabla.="<th>No.</th><th>Usuario</th><th>Nombre</th>";
			$tabla.="</tr>";
			$tabla.="</thead>";
			$tabla.="<tbody>";
			//registros de la tabla
			while($registros=mysqli_fetch_array($resConsulta)){
				$cuenta=$cuenta + 1;
				$tabla.="<tr>";
				$tabla.="<td>".$cuenta."</td>";
				$tabla.="<td>".$registro["usuario"]."</td>";
				$tabla.="<td>".$registro["nombre"]."</td>";
				$tabla.="</tr>";				
			}
			$tabla.="</tbody>";

		}
		$salidaJSON = array('respuesta' => $respuesta,
							'tabla' => $tabla);
		//var_dump($salidaJSON);
		print json_encode($salidaJSON);
	}

	$opc=$_POST["opc"];
	switch ($opc) {
		case 'listado':
			listado();
			break;
		
		default:
			# code...
			break;
	}

?>