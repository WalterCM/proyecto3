<?php
    echo "1";
    include("connection.php");
    echo "2";
    $nameValidation = isset($_POST['name']) && !empty($_POST['name']);
    $passValidation = isset($_POST['pass']) && !empty($_POST['pass']);
    echo "3";
    if ($nameValidation && $passValidation) {
        $mysqli = new mysqli($host, $user, $pass, $db);
        
        $res = $mysqli->query(
            "SELECT *
            FROM user
            WHERE name='$_POST[name]' AND pass='$_POST[pass]'"
        );
    }
    echo "4";
    if ($res->fetch_assoc())	{
    	header('location: https://www.utp.edu.pe/');
    } else {
    	echo '<center>';
        echo 'Error usuario o Contraseña incorrecta';
        echo '<br>';
        $regresar='<a href="index.php" >Regresar</a>';
        echo $regresar;
    }
?>
