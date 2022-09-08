<?php
include 'header.php';
include 'model/conexion.php';
?>
<section class="content">
    <h1>Registro de Usuarios</h1>
    <form action="insert.php" class="form-insert form-floating" method="POST">
        <div class="input-form">
            <label class="label-form" for="">Tipo de usuario: </label>
            <select name="tipo" class="form-select tipoUsuario" id="">
                <option value="1">Paciente</option>
                <option value="2">Médico</option>
            </select>
        </div>
        <div class="input-form">
            <label class="label-form" for="">Usuario: </label>
            <input type="text" placeholder="Ingrese su usaurio" name="idUsr" class="form-control" required>
        </div>
        <div class="input-form">
            <label class="label-form" for="">Nombre: </label>
            <input type="text" placeholder="Ingrese el nombre" name="nombre" class="form-control" required>
        </div>
        <div class="input-form">
            <label class="label-form" for="">Apellido paterno: </label>
            <input type="text" placeholder="Ingrese el apellido paterno" name="apaterno" class="form-control" required>
        </div>
        <div class="input-form">
            <label class="label-form" for="">Apellido materno: </label>
            <input type="text" placeholder="Ingrese el apellido materno" name="amaterno" class="form-control">
        </div>
        <div class="input-form especialidad inactive">
            <label class="label-form" for="">Especialidad: </label>
            <input type="text" placeholder="Ingrese la especialidad" name="especialidad" class="form-control">
        </div>
        <div class="input-form consultorio inactive">
            <label class="label-form" for="">Consultorio: </label>
            <input type="text" placeholder="Ingrese el consultorio" name="consultorio" class="form-control">
        </div>
        <div class="input-form">
            <label class="label-form" for="">Password: (8-14 Caractéres)</label>
            <input type="password" placeholder="Ingrese su password" name="password1" class="form-control" required maxlength="14">
        </div>
        <div class="input-form">
            <label class="label-form" for="">Repetir password: </label>
            <input type="password" placeholder="Ingrese su password" name="password2" class="form-control" required maxlength="14">
        </div>
        <input type="hidden" name="oculto" value=1 >
        <div class="input-form">
            <button type="submit" value="" class="btn btn-primary">Registrar</button>
        </div>
    </form>
    <div class="resultado"></div>
</section>
<?php
include('footer.php')
?>