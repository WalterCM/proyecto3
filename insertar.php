<?php
    echo "before include"."<br>";
    include("conexion.php");
    echo "after include"."<br>";
    
    $nameValidation = isset($_POST['nombre']) && !empty($_POST['nombre']);
    $passValidation = isset($_POST['pass']) && !empty($_POST['pass']);

    echo "after validation variables"."<br>";

    if ($nameValidation && $passValidation) {
        echo "inside the if true statement"."<br>";
    	$mysqli = new mysqli($host, $user, $pass, $db);
        echo "after con inicialization"."<br>";
        #mysql_select_db($db, $con) or die('Problemas al conectar con la db');
        echo "after selector"."<br>";
    	$mysqli->query($con,
            "INSERT INTO codigo (nombre, pass)\
            VALUES ('$_POST[nombre]','$_POST[pass]')"
        );
        echo "after query"."<br>";

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