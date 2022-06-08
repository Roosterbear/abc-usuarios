<body>
    <div class="contenedor">
      <!------- LOGO ------->
      <img src="img/logo.png" alt="DHL Demo" width="200" height="112" class="img-logo-dhl">
      <div class="breathe"></div>

      <h5 class="bienvenido"><strong><?php echo $_SESSION['usuario']?> |</strong> 
        <span id="salir" class="gris"> Salir </span>
      </h5>
      <h2 class="titulo_usuarios">
        <span data-bs-toggle="modal" data-bs-target="#modal_agregar">
          Agregar Usuario +
        </span>  
      </h2>
    </div>
    <div class="breathe"></div>

    <div class="mensaje"></div>

    <div class="tabla"></div>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@ MODALES @@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

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
        
        <label for="nombre_agregar">Nombre: </label>
        <input type="text" id="nombre_agregar" name="nombre_agregar" class="form-control">
        <div class="breathe"></div>

        <label for="usuario_agregar">Usuario: </label>
        <input type="text" id="usuario_agregar" name="usuario_agregar" class="form-control">
        <div class="breathe"></div>

        <label for="password_agregar">Contraseña: </label>
        <input type="password" id="password_agregar" name="password_agregar" class="form-control">
        <div class="breathe"></div>
        
        <div class="breathe"></div>
        <div class="breathe"></div>

        <button type="submit" id="boton_agregar_usuario" data-bs-dismiss="modal" aria-label="Close">
          Agregar
        </button>
      </div> 

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->


<!-- Modal Editar Usuario-->
<div class="modal fade" id="modal_editar" tabindex="-1" aria-labelledby="modal_editar_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="modal_editar_label">
          <strong>Editar usuario: </strong> <small id="label_id"></small>
        </h4>								        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div><!-- modal-header -->

      <!-- Body -->
      <div class="modal-body">
        <label for="usuario_editar">Usuario: </label>
        <input type="text" id="usuario_editar" name="usuario_editar" class="form-control" disabled="disabled">
        <div class="breathe"></div>

        <label for="nombre_editar">Nombre: </label>
        <input type="text" id="nombre_editar" name="nombre_editar" class="form-control">
        <div class="breathe"></div>
        
        <label for="password_editar">Contraseña: </label>
        <div class="breathe"></div>
        <input type="password" id="password_editar" name="password_editar" class="form-control">
        
        <div class="breathe"></div>
        <div class="breathe"></div>
        <button type="submit" id="boton_editar_usuario" data-bs-dismiss="modal" aria-label="Close">
          Editar
        </button>
      </div> 

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->



<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script type="text/javascript">

  $(document).ready(function(){
    $('#usuario_agregar').val('');
    $('#password_agregar').val('');
  })

  var this_id = '';
  var id_label = '';
  var variables = '';
  var this_action = '';

  function llenarTabla(){
    $.post('models/mostrar.php',function(data){
      $('.tabla').html(data);    
    });
  }

  function salir(){
    $('body').html('<h2>Sesion terminada</h2>');
    setTimeout(()=>{
      window.location.href = "http://localhost:8080";
    },500)
  }

  $(document).ready(function(){
  
  llenarTabla();
  
  $(document).on('click','.action',function(){
    id_label = this.id;    
    variables = id_label.split("-");
    this_id = variables[1];
    this_action = variables[0];
    
    if (this_action === 'e'){
      var id = this_id;
      // Eliminar la fila
      $.post('models/eliminar.php',{id:id},function(data){
        $('#row-usuario-'+this_id).fadeOut();
      });

      }else{
        $('#label_id').html(this_id);
        $.post('models/getUsuario.php',{id:id},function(data){
          $('#nombre_editar').val('Ponle un nombre')
          $('#password_editar').val('123')
        });
      }
  });

  $(document).on('click','#boton_agregar_usuario',function(){
    var nombre = $('#nombre_agregar').val();
    var usuario = $('#usuario_agregar').val();
    var password = $('#usuario_agregar').val();
    $.post('models/agregar.php',{nombre:nombre, usuario:usuario, password:password},function(){
      llenarTabla();     
    });
  });

  $(document).on('click','#boton_editar_usuario',function(){
    var id = this_id;
    var nombre = $('#nombre_editar').val();    
    var password = $('#password_editar').val();
    $.post('models/editar.php',{id:id, nombre:nombre, password:password},function(data){
      llenarTabla();     
    });
  });

  $(document).on('click','#salir',function(){
    $.post('models/salir.php',function(data){
      salir();  
    });
  });
  
});


</script>