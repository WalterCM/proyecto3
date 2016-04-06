<?php
    include("connection.php");
    
    $nameValidation = isset($_POST['name']) && !empty($_POST['name']);
    $passValidation = isset($_POST['pass']) && !empty($_POST['pass']);

    if ($nameValidation && $passValidation) {
    	$mysqli = new mysqli($host, $user, $pass, $db);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }

    	$mysqli->query(
            "INSERT INTO user (name, pass)
             VALUES ('$_POST[name]','$_POST[pass]')"
        );

    	echo "<center>";
        echo "Usuario Registrado";
        echo "<center>";
        echo "<br>";
    } else {
    	echo "<center>";
        echo "Problemas al insertar datos";
        echo "<br>";
    }
    $regresar='<a href="index.php" >Regresar</a>';
    echo $regresar;
?>