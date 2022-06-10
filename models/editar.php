<?php
require_once "conexion.php";

class Editar{

    public function updateUsuario($id=0, $nombre='', $password=''){
        
        
        $sql = "update usuarios set nombre = '";
        $sql .= $nombre;
        if ($password != ''){
            $sql .= "', password = '";
            $password = crypt($password, '$2a$07$Gu4c4m0l3C4n4d45i5t3m45$');
            $sql .= $password;
        }
        $sql .= "' where id = ";
        $sql .= $id;
        
        $res = Conexion::conectar()->prepare($sql);
        $res->execute();

        echo 'Usuario actualizado satisfactoriamente!';
        
        
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