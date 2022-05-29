<body>
    <div class="contenedor">
      <!------- LOGO ------->
      <div class="black">
        <img src="img/logo.png" alt="NASA Tecnologia" width="157" height="50" class="img-logo-nasa">
      </div>
      <div class="breathe"></div>

      <h5 class="bienvenido"><span class="gris">Bienvenido </span><strong><?php echo $_SESSION['usuario']?></strong></h5>
      <h2 class="titulo_usuarios">
        <span data-bs-toggle="modal" data-bs-target="#modal_agregar">
          Agregar Usuario +
        </span>  
      </h2>
    </div>
    <div class="breathe"></div>

    

    <table class="table table-stripped table-bordered table-condensed">
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

<?php
$usuarios = Usuario::getUsuarios();
$contador = 0;

foreach($usuarios as $u){
    echo '<tr id="row-usuario-'.$u['id'].'">';
    echo '<td>'.++$contador.'</td>';
    echo '<td class="gris">'.$u['nombre'].'</td>';
    echo '<td class="gris">'.$u['usuario'].'</td>';
    // TODO _____ mandar modal con ID
    echo '<td class="icono_link action" id="a-'.$u['id'].'">';
    echo '<span data-bs-toggle="modal" data-bs-target="#modal_editar">';
    echo '<i class="fa fa-lg fa-pencil editar"></i></span></td>';
    // TODO _____ mandar llamar funcion para elminiar
    echo '<td class="icono_link action" id="e-'.$u['id'].'">';
    echo '<i class="fa fa-lg fa-trash eliminar"></i></td>';
    echo '</tr>';
}
?>
</table>

<div class="mensaje"></div>


<!-- Modal Agregar Usuario-->
<div class="modal fade" id="modal_agregar" tabindex="-1" aria-labelledby="modal_agregar_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal_agregar_label"><strong>Agregar usuario</strong></h4>								        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div><!-- modal-header -->

      <!-- Body -->
      <div class="modal-body">
        <label for="usuario_agregar">Usuario: </label>
        <input type="text" id="usuario_agregar" name="usuario_agregar" class="form-control">
        <div class="breathe"></div>
        
        <label for="nombre_agregar">Nombre: </label>
        <input type="text" id="nombre_agregar" name="nombre_agregar" class="form-control">
        <div class="breathe"></div>

        <label for="password_agregar">Contraseña: </label>
        <input type="password" id="password_agregar" name="password_agregar" class="form-control">
        <div class="breathe"></div>
        
        <div class="breathe"></div>
        <div class="breathe"></div>

        <button type="submit" id="boton_agregar_usuario" data-bs-dismiss="modal" aria-label="Close">
          Ingresar
        </button>
      </div> 

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->





<!-- Modal Editar Usuario-->
<div class="modal fade" id="modal_editar" tabindex="-1" aria-labelledby="modal_editar_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal_editar_label"><strong>Editar usuario</strong></h4>								        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div><!-- modal-header -->

      <!-- Body -->
      <div class="modal-body">
        <label for="usuario_editar">Usuario: </label>
        <input type="text" id="usuario_editar" name="usuario_editar" class="form-control" disabled="disabled">
        <div class="breathe"></div>
        <label for="password_editar">Contraseña: </label>
        <div class="breathe"></div>
        <input type="password" id="password_editar" name="password_editar" class="form-control">
        <div class="breathe"></div>
        <div class="breathe"></div>
        <button type="submit" id="boton_editar_usuario" data-bs-dismiss="modal" aria-label="Close">
          Ingresar
        </button>
      </div> 

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script type="text/javascript">

$(document).ready(function(){
  
  
  $('.action').click(function(){
    var id_label = this.id;
    var variables = id_label.split("-");
    var this_id = variables[1];
    var this_action = variables[0];
    
    if (this_action === 'e'){

      //$.post(dire_delete,{id:this_id, btn:this_btn}).done(function(data){
        $('#row-usuario-'+this_id).fadeOut();
      }
    //});
  });

  $('#boton_agregar_usuario').click(function(){
    var nombre = $('#nombre_agregar').val();
    var usuario = $('#usuario_agregar').val();
    var password = $('#password_agregar').val();
    var texto = '<h3>'+n+' '+u+' '+p+' </h3>';
    
    $.post('http://localhost:8080/abc-usuarios/models/agregar',{nombre:nombre, usuario:usuario, password:password},function(data){
      $('.mensaje').html(data);
    });
  });

});
</script>