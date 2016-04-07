<!doctype>
<html>
  <head>
	<title></title>
	<meta charset="utf-8" />
  </head>
    <body background="img/register.jpg">
      <center>
        <h1>Formulario de registro</h1>
        
        <form action="insert.php" method="post" name="form">
             <label>Nombre </label><input type="text" name="name" required="true"/> 
             <label>Contraseña </label><input type="password" name="pass" required="true"/><br><br>
      	     <input type="submit" value="Insertar datos" ><br><b>
      	     <a href="index.php">Retornar</a>
      	</form> 
        </center>  
    </body>
</html>