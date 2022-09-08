<?php
$dbname="dpw2_u2";
$user="useradmin";
$password="TjITGMl61u6Lpn9U";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
try{
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$dbname,
        $user,
        $password,
        $options
    );

    }catch(Exception $e){
        
        echo "Error de conexión ". $e->getMessage();
    }

?>  