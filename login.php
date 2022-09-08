<?php
include 'header.php';
session_start();
?>
<section class="content">
    <h1>Inicio de Sesion</h1>
    <form action="loginProcess.php" class="form-insert form-floating" method="POST">
        <div class="input-form">
            <label class="label-form" for="txtUser">Usuario: </label>
            <input type="text" placeholder="Ingrese su usaurio" name="user" class="form-control" id="txtUser" required>
        </div>
        <div class="input-form">
            <label class="label-form" for="txtPass">Password: </label>
            <input type="password" placeholder="Password" name="password" class="form-control" id="txtPass" required>
        </div>
        <input type="hidden" name="oculto" value=1>
        <div class="input-form">
            <button type="submit" value="" class="btn btn-primary">Iniciar sesión</button>
        </div>
    </form>
</section>
