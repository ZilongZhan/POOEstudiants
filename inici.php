<?php
  require "header.php";
  require_once "includes/funcions.php";
  require_once "includes/funcionsBDD.php";
?>
  <main class="main-content">
    <div class="heading-container">
      <h1>\\:Les meves assignatures</h1>
    </div>
    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th>Assignatura</th>
            <th>Nota</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $assignatures = obtindreAssignaturesEstudiant();
            mostrarAssignaturesEstudiant($assignatures);
          ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>