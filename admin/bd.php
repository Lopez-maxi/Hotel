<?php 
$servidor="localhost";
$baseDeDatos="final";
$usuario="root";
$contraseña="";

try{

$conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario, $contraseña);
}catch(Exception $error){

    echo $error->getMessage();
}
?>