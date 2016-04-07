<?php
    include("connection.php");

    if (isset($_POST['submit'])) {
        $recaptcha=$_POST['g-recaptcha-response'];
        $mgs;
        if (!empty($recaptcha)) {
            $google_url="https://www.google.com/recaptcha/api/siteverify";
            $secret='6Le9yBwTAAAAAK1-x2dT6J31kwvAgiyklMJ-GpFW';
            $ip=$_SERVER['REMOTE_ADDR'];

            $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;

            $res=file_get_contents($url);

            //$res= json_decode($res, true);
            //reCaptcha success check 
            if ($res['success']){
                $nameValidation = isset($_POST['name']) && !empty($_POST['name']);
                $passValidation = isset($_POST['pass']) && !empty($_POST['pass']);

                if ($nameValidation && $passValidation) {
                    $mysqli = new mysqli($host, $user, $pass, $db);
                    
                    $res = $mysqli->query(
                        "SELECT *
                        FROM user
                        WHERE name='$_POST[name]' AND pass='$_POST[pass]'"
                    );
                }
                if ($res->fetch_assoc())    {
                    header('location: web/index.html');
                } else {
                    $msg='Error usuario o Contraseña incorrecta';
                }
            } else {
                $msg="Por favor, resuelva el captcha correctamente.";
            }
        } else {
            $msg="Por favor haga click en el captcha";
        }

        if ($msg) {
            echo '<center>';
            echo $msg;
            echo '<br>';
            $regresar='<a href="index.php" >Regresar</a>';
            echo $regresar;
        }
    }           
?>
