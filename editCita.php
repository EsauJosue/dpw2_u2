<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){

include('headerUsr.php');

include 'model/conexion.php';

$id = $_GET['id'];
$sentencia = $bd->prepare("SELECT * FROM citas WHERE idCita = $id;");
$sentencia->execute([$id]);
$cita = $sentencia->fetch(PDO::FETCH_OBJ); 
?>
<section class="content">
    <h1>Modificación de Citas</h1>
    <p>Datos de la cita</p>
    <div class="Box">
        <p>Id de la Cita: <strong> <?php echo $cita->idCita?></strong></p>
        <p>Id Paciente: <strong><?php echo $cita->idPaciente?></strong></p>
        <p>Fecha: <strong><?php echo $cita->fecha?> </strong></p>
        <p>Hora: <strong> <?php echo $cita->hora?></strong></p>
        <p>Id Médico: <strong> <?php echo $cita->idMedico?></strong></p>
        
    </div>
    <form action="updateCita.php" class="form-insert form-floating" method="POST">
        <div class="input-form">
            <label class="label-form" for="">ID Cita: </label>
            <input type="text" value="<?php echo $cita->idCita?>" name="idCita" class="form-control" readonly="readonly">
        </div>
        <div class="input-form">
            <label class="label-form" for="">ID Paciente: </label>
            <input type="text" value="<?php echo $cita->idPaciente?>" name="idPaciente" class="form-control" readonly="readonly">
        </div>
        <div class="input-form">
            <label class="label-form" for="">Fecha: </label>
            <input type="date" placeholder="Ingrese su usaurio" name="fecha" class="form-control">
        </div>
        <div class="input-form">
            <label class="label-form" for="">Hora: </label>
            <select name="hora" class="form-select tipoUsuario" id="tipoUsuario">
                <option value="7:00">7:00</option>
                <option value="7:30">7:30</option>
                <option value="8:00">8:00</option>
                <option value="8:30">8:30</option>
                <option value="9:00">9:00</option>
                <option value="9:30">9:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
            </select>
        </div>
        <div class="input-form">
            <label class="label-form" for="">Médico: </label>
            <select name="medico" class="form-select tipoUsuario" id="tipoUsuario">
                <?php
                    $consulta = $bd->query("SELECT idMedico, nombre, apellidoPaterno, especialidad, consultorio FROM medicos;");
                    $medicos = $consulta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($medicos as $dato){
                        // $doctor = $dato->idMedico. $dato->nombre. $dato->apellidoPaterno. $dato->especialidad. $dato->consultorio;
                ?>
                    <option value="<?php echo $dato->idMedico?>"><?php echo $dato->nombre. " ". $dato->apellidoPaterno." ". $dato->especialidad." ". $dato->consultorio?></option>
                <?php 
                    }
                ?>
            </select>
        </div>
        <input type="hidden" name="oculto" value=1>
        <div class="input-form">
            <button type="submit" value="" class="btn btn-primary">Modificar</button>
        </div>
    </form>
    <div class="resultado"></div>
</section>
<?php
include('footer.php');
}else{
    echo "Error en el sistema";
}   

?>