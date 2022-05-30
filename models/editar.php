<?php
require_once "conexion.php";

class Editar{

    public function updateUsuario($id=0, $nombre='', $password=''){
        
        $sql = "update usuarios set nombre = '";
        $sql .= $nombre;
        $sql .= "', password = '";
        $sql .= $password;
        $sql .= "' where id = ";
        $sql .= $id;
        
        //$res = Conexion::conectar()->prepare($sql);
        //$res->execute();

        //echo 'Usuario actualizado satisfactoriamente!';
        echo 'Hola';
        
    }
}


$editar = new Editar();

if ($_POST){
    $id = $_POST['id'];
    $nombre = $_POST["nombre"];    
    $password = $_POST["password"];
}else{
    $id = '';
    $nombre = '';    
    $password = '';
}


$editar->updateUsuario($id, $nombre, $password);

?>