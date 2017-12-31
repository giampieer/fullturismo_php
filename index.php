<?php session_start();?>

<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/login24.css">
    <script src="js/ajax1.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1>Login Principal</h1>
            
            <img src="img/logi.png" width="100px" height="100px">
            <form class="form" name="form">
              
                <div><input type="text" name="usuario" placeholder="Usuario"></div>
                <div><input type="password" name="clave" placeholder="Contraseña"></div>
                <input type="submit" class="bottom"value="Ingresar" style="background: #ccffcc; color: #000" name="btnEntrar"onclick="Acceso('Controlador')">
            </form>
        </div>
        
    </div>
</body>
</html>





