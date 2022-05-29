<body>
    <div class="contenedor">
      <!------- LOGO ------->
      <img src="img/logo.png" alt="NASA Tecnologia" width="157" height="50" class="img-logo-nasa">
      <div class="breathe"></div>

      <!-- Mandar llamar modal para agregar usuario -->
       <h1 class="titulo_usuarios">Usuarios </h1> >
            <span id="agregar_usuario" class="gris"> Agregar +</span>
       <h5><span class="gris">Bienvenido </span><strong><?php echo $_SESSION['usuario']?></strong></h5>
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
    echo '<i class="fa fa-lg fa-pencil editar"></i></td>';
    // TODO _____ mandar llamar funcion para elminiar
    echo '<td class="icono_link action" id="e-'.$u['id'].'">';
    echo '<i class="fa fa-lg fa-trash eliminar"></i></td>';
    echo '</tr>';
}
?>
</table>

<script>


$(document).ready(function(){
    $('.action').click(function(){
      var id_label = this.id;
      var variables = id_label.split("-");
      var this_id = variables[1];
      var this_action = variables[0];
      var accion = this_action === 'e'?'Eliminar':'Actualizar'; 
      
      //$.post(dire_delete,{id:this_id, btn:this_btn}).done(function(data){
        $('#row-usuario-'+this_id).fadeOut();
      //});
    });
});
</script>