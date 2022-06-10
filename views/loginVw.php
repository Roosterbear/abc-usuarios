<body>
  <header class="fondo">

    <!------- LOGO ------->
    <div class="contenedor">
      <img src="img/logo.png" alt="DHL Demo" width="200" height="112" class="img-logo-dhl">
    </div>

      <!-- -------------------------- -->
      <!-- ---- Login usuario ------- -->
      <!-- -------------------------- -->
      <div class="caja_login">
        <form action="usuarios" method="post">
          <label for="usuario">Usuario: </label>
          <input type="text" id="usuario" name="usuario" class="form-control">
          <div class="breathe"></div>
          <label for="password">Contraseña: </label>
          <input type="password" id="password" name="password" class="form-control">
          
          <div class="breathe"></div>
          
            <button type="submit" id="boton_login">
              Ingresar
            </button>
          
        </form>
      </div>

  </header>


  <script>
    $(document).ready(function(){
      $('#usuario').val('');
      $('#password').val('');
    })
  </script>