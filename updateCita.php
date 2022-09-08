<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){

if(!isset($_POST['oculto'])){
    header('Location: index.php');
}
print_r($_POST);
include 'model/conexion.php';

$idPaciente = $_POST['idPaciente'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$idMedico = $_POST['medico'];
$idCita = $_POST['idCita'];

 $sentencia = $bd->prepare("UPDATE citas SET fecha = ?, hora = ?, idPaciente= ?, idMedico = ? WHERE idCita = ?;");
 $resultado = $sentencia->execute([$fecha,$hora,$idPaciente,$idMedico,$idCita]);
if($resultado === TRUE){
 header('Location: gracias.php');

}else{
    echo "Error en la operación";
}
}else{
    echo "Error en el Sistema";
}
?>