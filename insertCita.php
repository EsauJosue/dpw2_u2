
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){

    include 'headerUsr.php';
    include 'model/conexion.php';

?>
<section class="content">
<?php

if(!isset($_POST['oculto'])){
    exit();
}
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$idmedico = $_POST['medico'];
$idpaciente = $_POST['idUsuario'];
echo $idmedico;
echo $idpaciente;

$sentencia = $bd->prepare("INSERT INTO citas(fecha,hora,idPaciente,idMedico) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$fecha,$hora,$idpaciente,$idmedico]);
if($resultado === TRUE){
    echo "Se ha registrado correctamente la cita: ";
    header('Location: gracias.php');

}else{
    echo "Ocurrio un error.";
}
}else{
    
    echo "Error en el Sistema";
}
?>
</section>