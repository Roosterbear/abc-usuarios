<body>
    <div class="contenedor">
      <!------- LOGO ------->
      <img src="img/logo.png" alt="NASA Tecnologia" width="157" height="50" class="img-logo-nasa">
      <div class="breathe"></div>
       <h1>Usuarios</h1>
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
    echo '<tr>';
    echo '<td>'.++$contador.'</td>';
    echo '<td class="gris">'.$u['nombre'].'</td>';
    echo '<td class="gris">'.$u['usuario'].'</td>';
    echo '<td class="editar"><i class="fa fa-lg fa-pencil"></i></td>';
    echo '<td class="eliminar"><i class="fa fa-lg fa-trash"></i></td>';
    echo '</tr>';
}
?>
</table>