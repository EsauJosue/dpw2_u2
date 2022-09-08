<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){
include 'headerUsr.php';
include 'model/conexion.php';
$idPaciente = $_SESSION['idUsuario'];
$nombre = $_SESSION['usuario'];
$aPaterno = $_SESSION['aPaterno'];
$aMaterno = $_SESSION['aMaterno'];

?>
<section class="content">
    <h1>Consulta de citas</h1>
    <?php 
    $nombreCompleto = $nombre. " ".$aPaterno." ". $aMaterno;
    echo $nombreCompleto;
    ?>
    <p>ID Paciente: <?php echo $idPaciente;?></p>
    <?php
    
    $consultaCitas = $bd->query("SELECT fecha, hora, idPaciente, idMedico FROM citas WHERE idPaciente = '$idPaciente' ORDER BY fecha;");
    $citas = $consultaCitas->fetchAll(PDO::FETCH_OBJ);

    if(!$citas){
        echo 'No existen citas relacionadas al usuario.';
    }else{
        ?>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Médico</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Consultorio</th>     
                </tr>
            </thead>
    <?php
    foreach($citas as $dato){
        ?>
            <tbody>
                <tr>
                    <td><?php echo $dato->fecha ?></td>
                    <td><?php echo $dato->hora ?></td>
                    <?php  
                    $doctor = $dato->idMedico;
                    $consultaD = $bd->query("SELECT nombre, apellidoPaterno, apellidoMaterno, especialidad, consultorio FROM medicos WHERE idMedico = '$doctor'");
                    $datosDoc = $consultaD->fetchAll(PDO::FETCH_OBJ);
                    foreach ($datosDoc as $dato){
                        $nombreDoc = $dato->nombre." ".$dato->apellidoPaterno." ".$dato->apellidoMaterno;
                        $especialidad = $dato->especialidad;
                        $consultorio = $dato->consultorio;
                    }
                    ?>
                    <td><?php echo $nombreDoc?></td>
                    <td><?php echo $especialidad?></td>
                    <td><?php echo $consultorio?></td>
                    
                </tr>
            </tbody>
        <?php
    }
?>
</table>
</section>
        <?php
    }
    ?>
<?php
include 'footer.php';
}else{
    echo "Error en el Sistema";
}
?>