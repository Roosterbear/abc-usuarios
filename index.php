<?php
session_start();
require_once "models/Usuario.php";

// Usuarios para checar el Login
$usuarios = Usuario::getUsuarios();

if(isset($_GET['route'])){
    if($_GET['route'] === 'usuarios'){
        $usuario = '';
        $password = '';
        $nombre = '';

        if($_POST){
            $usuario = isset($_POST['usuario'])?$_POST['usuario']:'';
            $password = isset($_POST['password'])?$_POST['password']:'';
            $password = crypt($password, '$2a$07$Gu4c4m0l3C4n4d45i5t3m45$');

            foreach($usuarios as $u){
                $logged = ($usuario===$u['usuario'])&&($password===$u['password'])?true:false;
                $nombre = $u['nombre'];
                if($logged) break;
            }
        }
    }else{
        $logged = false;
    }
}

if ($logged){
    require_once "controllers/Usuarios.php";
    $_SESSION['usuario'] = $nombre;
    $usuarios = new Usuarios();
    $usuarios->view();
}else{
    require_once "controllers/Login.php";
    $login = new Login();
    $login->view();
}


// Entrega



