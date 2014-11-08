<?php
session_start();
//index.php
if ($_SESSION['login']){
    require 'header.php';
} else { // si no se esta logeado
    echo "<script>window.location = 'login.php'</script>";
} 
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ninfac Web</title>
        
    </head>
    <body>
    </body>    
</html>