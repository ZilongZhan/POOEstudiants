<?php
  require_once "includes/funcions.php";
  require_once "includes/funcionsBDD.php";
  require "header.php";
?>
  <main class="main-content">
    <h2>Registra't</h2>
    <?php
      if(!empty($_POST)) {
        try {
          $dni = $_POST["dni"];
          $nom = $_POST["nom"];
          $cognoms = $_POST["cognoms"];
          $carrer = $_POST["carrer"];
          $numero = $_POST["numero"];
          $cp = $_POST["cp"];
          $provincia = $_POST["provincia"];
          $municipi = $_POST["municipi"];
          $assignatures = $_POST["assignatures"] ?? [];
          $contrasenya = $_POST["contrasenya"];
          $contrasenya2 = $_POST["contrasenya2"];
  
          if ($contrasenya === $contrasenya2) {
            crearPersona($dni, $nom, $cognoms, $carrer, $numero, $cp, $provincia, $municipi, $assignatures, $contrasenya);
  
            header("Location: index.php");
            exit();
          } else {
            echo "Les contrasenyes no coincideixen";
          }
  
  
        } catch (PDOException $e) {
          return "Error: " . $e->getMessage();
        }
      }
    ?>
    <a class="close-button" href="index.php"><button>X</button></a>
    <a class="shit1">❐</a>
    <a class="shit2">_</a>
    <form class="form" action="registre.php" method="POST">
      <div class="input-container">
        <label>
          DNI/NIE<input type="text" name="dni" value="<?php echo isset($_POST['dni']) ? htmlspecialchars($_POST['dni']) : ''; ?>" maxlength="9" required>
        </label>
        <label>
          Nom<input type="text" name="nom" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" required>
        </label>
        <label>
          Cognoms<input type="text" name="cognoms" value="<?php echo isset($_POST['cognoms']) ? htmlspecialchars($_POST['cognoms']) : ''; ?>" required>
        </label>
        <label>
          Contrasenya<input type="password" name="contrasenya" minlength="10" required>
        </label>
        <label>
          Repeteix contrasenya<input type="password" name="contrasenya2" minlength="10" required>
        </label>
      </div>
      <div class="input-container">
        <label>
          Carrer<input type="text" name="carrer" value="<?php echo isset($_POST['carrer']) ? htmlspecialchars($_POST['carrer']) : ''; ?>" required>
        </label>
        <label>
          Número<input type="number" name="numero" value="<?php echo isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : ''; ?>" required>
        </label>
        <label>
          Codi Postal<input type="text" name="cp" value="<?php echo isset($_POST['cp']) ? htmlspecialchars($_POST['cp']) : ''; ?>" maxlength="5" required>
        </label>
        <label>
          Província<input type="text" name="provincia"value="<?php echo isset($_POST['provincia']) ? htmlspecialchars($_POST['provincia']) : ''; ?>"  required>
        </label>
        <label>
          Municipi<input type="text" name="municipi" value="<?php echo isset($_POST['municipi']) ? htmlspecialchars($_POST['municipi']) : ''; ?>" required>
        </label>
      </div>
      <div class="input-container">
        <h3>Sel·lecciona les teves assignatures</h3>
        <?php
          $assignatures = obtindreAssignatures();
          mostrarAssignatures($assignatures);
        ?>
      </div>
      <div class="input-container button-container">
        <input type="submit" value="Crear usuari">
      </div>
    </form>
  </main>
</body>
</html>