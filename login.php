<?php
    include("conexion.php");

    $nameValidation = isset($_POST['nombre']) && !empty($_POST['nombre']);
    $passValidation = isset($_POST['pass']) && !empty($_POST['pass']);



    if ($nameValidation && $passValidation) {
        $con = mysql_connect($host, $user, $pass) or die('Problemas al conectar');
        mysql_select_db($db, $con) or die('Problemas al conectar con la db');
        
        $estandar = mysql_query(
            "SELECT *\
            FROM codigo\
            WHERE nombre='$_POST[nombre]' AND pass='$_POST[pass]'",
            $con
        );
    }
    
    if ($row=mysql_fetch_array($estandar))	{
    	header('location: https://www.utp.edu.pe/');
    } else {
    	echo '<center>';
        echo 'Error usuario o Contraseña incorrecta';
        echo '<br>';
        $regresar='<a href="index.php" >Regresar</a>';
        echo $regresar;
    }
?>