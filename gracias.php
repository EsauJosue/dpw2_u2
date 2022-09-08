<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}elseif(isset($_SESSION['usuario'])){
    include('headerUsr.php');
    ?>
        <section class="content">
            <h1>El registro se ha procesado con éxito</h1>
        </section> 
    <?php 
        include('footer.php');
   
}else{
    echo "Error en el Sistema";
}
?>