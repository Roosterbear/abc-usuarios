<body>
  <header class="fondo">

    <!------- LOGO ------->
    <div class="contenedor">
      <img src="img/logo.png" alt="NASA Tecnologia" width="157" height="50" class="img-logo-nasa">
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
          <div class="breathe"></div>
          <input type="password" id="password" name="password" class="form-control">
          
          <div class="breathe"></div>
          
            <button type="submit" id="boton_login">
              Ingresar
            </button>
          
        </form>
      </div>

  </header>