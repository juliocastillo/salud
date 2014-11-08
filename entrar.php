<?php
session_start();
// verificar datos ingresados de usuario y contraseña
extract($_POST);
if (isset($usuario_login) && isset($usuario_password)){
    include ("model.php");
    $model = new Model();
    require 'conexion.php'; // se requiere ya que aún no se ha iniciado el menu
    $user = $model->login($usuario_login,$usuario_password);
    if($user['name']){ //si los datos son correctos
        $_SESSION['empresa'] = htmlentities($model->get_empresa());
        $_SESSION['login'] = TRUE;
        $_SESSION['username'] = $user['name'];
        $_SESSION['rol'] = $user['rol'];
        echo "<script>window.location = 'index.php'</script>"; // mostrar menu
    } else {
        echo "<script>window.location = 'login.php'</script>"; // solicitar nuevamente usuario y pass
    }
}
