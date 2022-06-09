<?php
require_once "conexion.php";

class Nombre{
    public function get($id){
        $sql = "select nombre from usuarios where id = ";
        $sql .= $id;
        
        $res = Conexion::conectar()->prepare($sql);
        $res->execute();

        $resultado = $res->fetch();
        return $resultado['nombre'];
        
    }
}    

if ($_POST){
    $id = $_POST["id"];
}else{
    $id = 0;
}

$nombre = new Nombre();
echo $nombre->get($id);