<?php
include 'conexiones.php';
function buscarusuario(){
    $respuesta = false;
    $usuario=GetSQLValueString($_POST["usuario"],"text");
    $nombre=GetSQLValueString($_POST["nombre"],"text");
    $clave =GetSQLValueString(md5($_POST["clave"]),"text");
    //Conectarnos al servidor de la BD.
    $con=conecta();

    $consulta=sprintf("select usuario from usuario where usuario = %s",$usuario);
    $resConsulta=mysqli_query($con,$consulta);
    $consultaGuarda="";
    //si ya existe en la tabla el usuario
    if(mysqli_num_rows($resConsulta) > 0){
        //actualizamos
        $consultaGuarda=sprintf("update usuarios set nombre =%s, clave=%s where usuario = %s",$nombre, $clave, $usuario);
    }else{//No exste en la tabla
        $consultaGuarda=sprintf("intert into usuario values(default,%s,%s,%s)",$usuario, $nombre, $clave);
    }
    mysqli_query($consultaGuarda);//ejecuta la consulta
    if(mysqli_affected_rows()>0){//Cantidad de registros afectados
        $respuesta=true;
    }
    //Array asociativo
    $salidaJSON = array('respuesta' => $respuesta);
    //var_dump($salidaJSON);
    print json_encode($salidaJSON);

}
$opc=$_POST["opc"];
switch ($opc) {
    case 'guardarUsuario':
         guardarusuario();
        break;
        
    default:
         # code...
        break;
}
?>