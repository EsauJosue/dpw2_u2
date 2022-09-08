<?php
session_start();

include_once 'model/conexion.php';
$usuario = $_POST['user'];
$password = $_POST['password'];

$busqPac = $bd->prepare('SELECT idPaciente, nombre, apellidoPaterno, apellidoMaterno, password from pacientes WHERE idPaciente = ? AND password = ?;');
$busqPac->execute([$usuario, $password]);
$datos = $busqPac->fetch(PDO::FETCH_OBJ);

$buscDoc = $bd->prepare('SELECT idMedico, nombre, apellidoPaterno, apellidoMaterno, password from medicos WHERE idMedico = ? AND password = ?;');
$buscDoc->execute([$usuario, $password]);
$datosD = $buscDoc->fetch(PDO::FETCH_OBJ);

if($datos === FALSE && $datosD === FALSE){
    header('Location: errorlogin.php');

}elseif($busqPac->rowCount() == 1){
       
    $_SESSION['usuario']= $datos->nombre;
    $_SESSION['idUsuario']= $datos->idPaciente;
    $_SESSION['tipoUsr']= 'Paciente';
    $_SESSION['aPaterno']= $datos->apellidoPaterno;
    $_SESSION['aMaterno']= $datos->apellidoMaterno;
    header('Location: indexUsr.php');
}elseif($buscDoc->rowCount()== 1){
    $_SESSION['usuario'] = $datosD->nombre;
    // echo 'Bienvenido Doctor';
    header('Location: indexUsr.php');
    $_SESSION['usuarioDoc']= $datosD->nombre;
    $_SESSION['idUsuario']= $datosD->idMedico;
    $_SESSION['aPaternoDoc']= $datosD->apellidoPaterno;
    $_SESSION['aMaternoDoc']= $datosD->apellidoMaterno;
    $_SESSION['tipoUsr']= 'Médico';


}
   
//     elseif($busqDoc->rowCount() ==1 ){
//         echo $_SESSION['usuario']= $datosD->nombre;
//         echo 'Bienvenido Doc';
//     }
// }elseif($busqPac->rowCount() == 1){
//     echo $_SESSION['usuario']= $datos->nombre;
//     echo 'Bienvenido Paciente';

// }

?>