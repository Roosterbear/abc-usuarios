<?php
require_once "conexion.php";

class Usuario{

    // Obtener toda la tabla de usuarios
    static public function getUsuarios(){
        $res = Conexion::conectar()->prepare("SELECT * FROM usuarios");
        $res->execute();
        
        return $res->fetchAll();
    }

    // Obtener un usuario completo de acuerdo a un id proporcionado
    static public function getUsuario($id){
        $res = Conexion::conectar()->prepare("SELECT * FROM usuarios where id = ".$id);
        $res->execute();
        
        return $res->fetch();
        
    }
   
}