<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){

$tipoUsuario = $_SESSION['tipoUsr'];

if($tipoUsuario === 'Paciente'){
    header('Location: consultaCitaPac.php');

}elseif($tipoUsuario === 'Médico'){
    header('Location: consultaCitaDoc.php');
}
}else{
    echo "Error en el Sistema";
}
?>