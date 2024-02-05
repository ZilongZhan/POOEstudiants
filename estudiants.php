<?php
  require_once "includes/funcions.php";
  require_once "includes/funcionsBDD.php";
  require "header.php";
?>
  <main class="main-content">
    <div class="table_heading-container">
      <h1 class="table-heading">\\:Llistat d'estudiants</h1>
      <a class="add-button" href="donaralta.php"><button>Puta</button></a>
    </div>
    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th>ID Estudiant</th>
            <th>Nom i cognoms</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $estudiants = obtindreEstudiants();
            mostrarEstudiants($estudiants);
          ?>
        </tbody>
      </table>
      <table class="table">
        <thead>
          <tr>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $estudiants = obtindreEstudiants();
            mostrarAccions($estudiants);
          ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>