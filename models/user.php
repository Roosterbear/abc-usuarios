<?php
require_once "conexion.php";

class User{
    public function get($id){
        $sql = "select usuario from usuarios where id = ";
        $sql .= $id;
        
        $res = Conexion::conectar()->prepare($sql);
        $res->execute();

        $resultado = $res->fetch();
        return $resultado['usuario'];
    }
}    

if ($_POST){
    $id = $_POST["id"];
}else{
    $id = 0;
}

$user = new User();
echo $user->get($id);




