<?php
session_start();
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){
include 'headerUsr.php';
include 'model/conexion.php';

$tipoUsr = $_SESSION['tipoUsr'];
if($tipoUsr == 'Paciente'){
    $nombre = $_SESSION['usuario'];
}elseif($tipoUsr == 'Médico'){
    $nombre = $_SESSION['usuarioDoc'];
}

?>
<section class="content">
    <h1>Registro de Citas</h1>
    <p>Usuario: <?php echo $nombre?> </p>
    <form action="insertCita.php" class="form-insert form-floating" method="POST">
    <div class="input-form">
            <label class="label-form" for="">Usuario: </label>
            <input type="text" placeholder="" name="idUsuario" class="form-control" value="<?php  echo $_SESSION['idUsuario']?>" readonly="readonly">
        </div>
        <div class="input-form">
            <label class="label-form" for="">Fecha: </label>
            <input type="date" placeholder="Ingrese su usaurio" name="fecha" class="form-control" required>
        </div>
        <div class="input-form">
            <label class="label-form" for="">Hora: </label>
            <select name="hora" class="form-select tipoUsuario" required>
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
            <select name="medico" class="form-select tipoUsuario" required>
                <?php
                    $consulta = $bd->query("SELECT idMedico, nombre, apellidoPaterno, especialidad, consultorio FROM medicos;");
                    $medicos = $consulta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($medicos as $dato){
                        // $doctor = $dato->idMedico. $dato->nombre. $dato->apellidoPaterno. $dato->especialidad. $dato->consultorio;
                ?>
                    <option value="<?php echo $dato->idMedico?>"> <?php echo $dato->nombre. " ". $dato->apellidoPaterno." ". $dato->especialidad." ". $dato->consultorio?></option>
                <?php 
                    }
                ?>
            </select>
        </div>
        <input type="hidden" name="oculto" value=1>
        <div class="input-form">
            <button type="submit" value="" class="btn btn-primary">Registrar</button>
        </div>
    </form>
    <div class="resultado"></div>
</section>
<?php
include('footer.php');
                }else{
                    echo "Error en el Sistema";
                }
?>