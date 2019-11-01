<?php
require_once 'conexion.php';

//variables de nuevos datos

/*if(isset($_POST['nombres']) && isset($_POST['apellidos']) ){
}*/ $message ='';
    $nom = $_POST['nombres'];
    $ape = $_POST['apellidos'];
    $corr = $_POST['correo'];
    $cla= $_POST['clave'];
    $sex = $_POST['sexo'] ;

 


$consulta = "INSERT INTO clientes(nombres,apellidos,correo , clave ,sexo) VALUES(?,?,?,?,?)";

//preparacion ejecucion

$sentencia = $oConex ->prepare($consulta);
$resultado = $sentencia -> execute ([$nom, $ape,$corr,$cla, $sex]);

if($resultado === true){
    header("Location: /login+crud_php");
}else{
    echo "Algo anda mal xd";
}
