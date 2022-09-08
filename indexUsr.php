<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){
include 'headerUsr.php';
?>
<section class="content">

    <h1>Bienvenido(a) <?php  echo $_SESSION['usuario'] ?></h1>
    <p>Has ingresado como: <?php echo $_SESSION['tipoUsr']?></p>

</section>

<?php
}else{
    echo "Error en el Sistema";
}
?>