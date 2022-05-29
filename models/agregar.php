<?php


class Agregar{

    public function agregarUsuario($nombre, $usuario, $password){
       

        $sql = "insert into usuarios (nombre,usuario,password) values ('";
        $sql += $nombre;
        $sql += "','";
        $sql += $usuario;
        $sql += "','";
        $sql += $password;
        $sql += "')";

        $res = Conexion::conectar()->prepare($sql);
        $res->execute();
        return true;
    }


}

if ($_POST){
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
}else{
    $nombre = '';
    $usuario = '';
    $password = '';
}


$agregar = new Agregar();
$agregar->agregarUsuario($nombre, $usuario, $password);
