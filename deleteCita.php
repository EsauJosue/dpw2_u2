<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){

if(!isset($_GET['id'])){
    exit();
}

$cita = $_GET['id'];
include 'model/conexion.php';
$sentencia = $bd->prepare("DELETE FROM citas WHERE idCita = ?;");
$resultado = $sentencia->execute([$cita]);
if($resultado === TRUE){
    header('Location: gracias.php');
}
}else{
    echo "Error en el Sistema";
}
?>