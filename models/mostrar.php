<?php
require_once "conexion.php";


 class Mostrar{
    
   public function getUsuarios(){
      $res = Conexion::conectar()->prepare("SELECT * FROM usuarios");
      $res->execute();
      
      return $res->fetchAll();
    }

    public function llenarTabla(){
      $usuarios = $this->getUsuarios();
      $contador = 0;

      $tabla = '<table class="table table-stripped table-bordered table-condensed">';
      $tabla .= '<tr><th></th><th>Nombre</th><th>Usuario</th><th>Editar</th><th>Eliminar</th></tr>';
        
      foreach($usuarios as $u){
         // Mostrar
         $tabla .= '<tr id="row-usuario-'.$u['id'].'">';
         $tabla .= '<td>'.++$contador.'</td>';
         $tabla .= '<td class="gris">'.$u['nombre'].'</td>';
         $tabla .= '<td class="gris">'.$u['usuario'].'</td>';
         
         // Editar
         $tabla .= '<td class="icono_link action" id="a-'.$u['id'].'">';
         $tabla .= '<span data-bs-toggle="modal" data-bs-target="#modal_editar">';
         $tabla .= '<i class="fa fa-lg fa-pencil editar"></i></span></td>';
       
         // Eliminar
         $tabla .= '<td class="icono_link action" id="e-'.$u['id'].'">';
         $tabla .= '<i class="fa fa-lg fa-trash eliminar"></i></td>';
         $tabla .= '</tr>';
      }
      $tabla .= '</table>';
      echo $tabla;
    }
 }

 $mostrar = new Mostrar();
 $mostrar->llenarTabla();



?>