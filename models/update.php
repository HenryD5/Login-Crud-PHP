<?php

require_once 'conexion.php';


//datos actualizados de un registro exitente
$id= $_POST['id'];
$nom = $_POST['nombres'];
$ape = $_POST['apellidos'];
$corr = $_POST['correo'];
$sex = $_POST['sexo'] ;

$consulta="Update clientes Set nombres =? ,apellidos =? ,correo =? , sexo=?  Where id =? ";

//preparacion ejecucion

$sentencia = $oConex ->prepare($consulta);
$resultado = $sentencia -> execute ([$nom, $ape, $corr,$sex ,$id]);

if($resultado === true){
    header("Location: /login+crud_php");
}else{
    echo "Algo anda mal xd";
}