<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){
include 'headerUsr.php';
include 'model/conexion.php';

$idDoctor = $_SESSION['idUsuario'];

$consulta = $bd->query("SELECT * FROM citas WHERE idMedico = '$idDoctor' ORDER BY fecha");
$citas = $consulta->fetchAll(PDO::FETCH_OBJ);
?>
<section class="content">
    <h1>Consulta de citas</h1>
    <?php 
    $nombreD = $_SESSION['usuarioDoc'];
    $aPaternoD = $_SESSION['aPaternoDoc'];
    $aMaternoD = $_SESSION['aMaternoDoc'];
    $nombreCompletoD = $nombreD. " ".$aPaternoD." ". $aMaternoD;
    ?>
    <p>ID Médico: <?php echo $_SESSION['idUsuario']?></p>
    <p>Nombre del Médico: <?php echo $nombreCompletoD; ?> </p>
    <?php 
    if(!$citas){
        echo 'No existen citas relacionadas al usuario.';
    }else{
        ?>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                
                <th scope="col">ID Cita</th>
                <th scope="col">Médico</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Paciente</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
    <?php
    foreach ($citas as $dato){
        ?>
            <tbody>
                <tr>
                    <td><?php echo $dato->idCita ?></td>
                    <td><?php echo $nombreCompletoD ?></td>
                    <td><?php echo $dato->fecha ?></td>
                    <td><?php echo $dato->hora ?></td>
                    <?php  
                        $paciente = $dato->idPaciente;
                      
                        $consultaP = $bd->query("SELECT * FROM pacientes where idpaciente = '$paciente';");
                        $infoPac = $consultaP->fetchAll(PDO::FETCH_OBJ);
                        foreach ($infoPac as $datos){
                        $nombrePaci = $datos->nombre." ".$datos->apellidoPaterno." ".$datos->apellidoMaterno;
                        }
                    ?>
                    <td><?php echo $nombrePaci?></td>
                    <td><a href="editCita.php?id=<?php echo $dato->idCita?>"><img src="./assets/images/edit.svg" alt=""></a></td>
                    <td><a href="deleteCita.php?id=<?php echo $dato->idCita?>"><img src="./assets/images/delete.svg" alt=""></a></td>
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
    echo "Error en el sistema";
}
?>