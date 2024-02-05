<?php
  require "header.php";
?>
  <main class="main-content">
    <h2>Benvingut</h2>
    <form class="form" action="index.php" method="post">
      <div class="input-container">
        <label>
          DNI <input type="text" name="dni" maxlength="9">
        </label>
        <label>
          Contrasenya <input type="password" name="contrasenya">
        </label>
        <input type="submit" value="Inicia sessió">
        <a href="registre.php">Crear usuari</a>
        <?php
          if (!empty($_POST)) {
            require_once "includes/funcionsBDD.php";

            $dni = $_POST["dni"];
            $contrasenya = $_POST["contrasenya"];

            if (verificarUsuari($dni, $contrasenya)) {
              $_SESSION['loggedin'] = true;
              $_SESSION['dni'] = $dni;

              header("Location: inici.php");
              exit();
            } else {
              echo "<div class='error-container'>";
              echo "<p>Credencials incorrectes. Inténta-ho una altra vegada.</p>";
              echo "</div>";
            }
          }
        ?>
      </div>
    </form>
  </main>
</body>
</html>