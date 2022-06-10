<?php
require_once "conexion.php";

class Agregar{

    public function addUsuario($nombre, $usuario, $password){
        
        $sql = "insert into usuarios (nombre,usuario,password) values ('";
        $sql .= $nombre;
        $sql .= "','";
        $sql .= $usuario;
        $sql .= "','";
        $sql .= $password;
        $sql .= "')";
        
        $res = Conexion::conectar()->prepare($sql);
        $res->execute();

       return true;
        
    }
}


$agregar = new Agregar();

if ($_POST){
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $password = crypt($password, '$2a$07$Gu4c4m0l3C4n4d45i5t3m45$');
}else{
    $nombre = '';
    $usuario = '';
    $password = '';
}


$agregar->addUsuario($nombre, $usuario, $password);

?>