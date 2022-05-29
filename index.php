<?php
//session_start();
require_once "models/Usuario.php";

//$login_usuario = Usuario::getUsuario();
//$login_usuario['usuario'];

if(isset($_GET['route'])){
    if($_GET['route'] = 'verificar'){
        $usuario = '';
        $password = '';

        if($_POST){
            $usuario = isset($_POST['usuario'])?$_POST['usuario']:'';
            $password = isset($_POST['password'])?$_POST['password']:'';

            // TODO _____Comprobar usuario
            $logged = ($usuario==='admin')&&($password='admin')?true:false;
        }
    }else{
        $logged = false;
    }
}

if ($logged){
    require_once "controllers/Usuarios.php";
    $usuario = new Usuarios();
    $usuario->view();
}else{
    require_once "controllers/Login.php";
    $login = new Login();
    $login->view();
}



