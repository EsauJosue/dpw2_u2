<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Centro Médico</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link href="assets/css/style.css" rel="stylesheet">  
</head>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="indexUsr.php">Inicio</a>
                        </li>
                        <?php 
                        $tipoUsr = $_SESSION['tipoUsr'];
                        if($tipoUsr == 'Paciente'){
                            ?>
                             <li class="nav-item">
                                <a class="nav-link" href="registrarCita.php">Registrar Cita</a>
                             </li>
                        <?php }?>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="consultar.php">Consultar Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="salir.php">Salir</a>
                        </li>
                        <li>
                            <a class="nav-link disabled">Bienvenido(a): <?php echo $_SESSION['usuario'];?></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="registro.php">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar Sesion</a>
                        </li> -->
                        
                       
                    </ul>
                </div>
            </div>
        </nav>
    </header>