<?php

function conecta(){
    //Servidor, usuario, contraseña y BD
    $con=mysqli_connect("127.0.0.1","root","","pw218112");
    return $con;
}
?>