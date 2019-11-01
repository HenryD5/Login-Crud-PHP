<?php
require_once 'conexion.php';

//datos actualizados de un registro exitente
$id = $_GET['id'];

$consulta="DELETE FROM clientes WHERE id =?";
//preparacion ejecucion

$sentencia = $oConex ->prepare($consulta);
$resultado = $sentencia -> execute ([$id]);

if($resultado === true){
    header("Location: /login+crud_php");
}else{
    echo "Algo anda mal xd";
}