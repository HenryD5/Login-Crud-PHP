<?php
$Server = "localhost";
$Database = "ejercicio";
$User = 'PHPLOG';
$Pass='8cQszfqBXeEjhlGd';

try{
    $DSN = "mysql:host=$Server;dbname=$Database";
$oConex = new PDO($DSN , $User , $Pass);
$oConex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "¡Error!: " . $e ->getMessage();
}
