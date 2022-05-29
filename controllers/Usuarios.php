<?php
session_start();


class Usuarios{
    public function view(){
        include "views/header.php";
        include "views/usuariosVw.php";
    }
}

