<?php
require_once "conexion.php";

class Eliminar{

    public function deleteUsuario($id){
        
        $sql = "delete from usuarios where id = ";
        $sql .= $id;
        
        $res = Conexion::conectar()->prepare($sql);
        $res->execute();

        echo 'Usuario eliminado satisfactoriamente!';
        
    }
}


$eliminar = new Eliminar();

if ($_POST){
    $id = $_POST["id"];
}else{
    $id = 0;
}


$eliminar->deleteUsuario($id);

?>