
<?php
session_start();

    include 'header.php';
?>
<section class="content">
<?php
if(!isset($_POST['oculto'])){
    exit();
}
include 'model/conexion.php';
if(strlen($_REQUEST['password1'])<8)
{ 
    echo 'La contraseña debe ser mayor a 8 caracteres.'; 
}else{
        $tipoUsr = $_POST['tipo'];
        $user = $_POST['idUsr'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        if($pass1 == $pass2){
            if($tipoUsr == 1){
                $id = $_POST['idUsr'];
                $nombre = $_POST['nombre'];
                $apaterno = $_POST['apaterno'];
                $amaterno = $_POST['amaterno'];
                $pass = $pass1;
                $sentencia = $bd->prepare("INSERT INTO pacientes(idpaciente,nombre,apellidoPaterno,apellidoMaterno,password) VALUES 
                (?,?,?,?,?);");
                $resultado = $sentencia->execute([$id,$nombre,$apaterno,$amaterno,$pass]);
                if($resultado === TRUE){
                    echo "Se ha guardado correctamente el paciente: ".$nombre." ".$apaterno;
            
                }else{
                    echo "Ocurrio un error o el usuario ya existe. Favor de intentar más tarde o cambiar el usuario.";
                }
                
            }
            if($tipoUsr == 2){
               
                $id = $_POST['idUsr'];
                $nombre = $_POST['nombre'];
                $apaterno = $_POST['apaterno'];
                $amaterno = $_POST['amaterno'];
                $especialidad = $_POST['especialidad'];
                $consultorio = $_POST['consultorio'];
                $pass = $pass1;
                $sentencia = $bd->prepare("INSERT INTO medicos(idMedico,nombre,apellidoPaterno,apellidoMaterno,especialidad,consultorio,password) VALUES 
                (?,?,?,?,?,?,?);");
                $resultado = $sentencia->execute([$id,$nombre,$apaterno,$amaterno,$especialidad,$consultorio,$pass]);
                if($resultado === TRUE){
                    echo "Se ha guardado correctamente el médico: ".$nombre." ".$apaterno;
                }else{
                    echo "Ocurrio un error o el usuario ya existe. Favor de intentar más tarde o cambiar el usuario.";
                }
            }
        
        }else{
            echo 'Las contraseñas no coinciden';
        }
    }
?>
</section>