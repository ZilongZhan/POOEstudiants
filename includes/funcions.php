<?php
  function mostrarAssignatures($assignatures) {
    foreach ($assignatures as $assignatura) {
      echo "<div class='checkbox-container'>";
      echo "<input type='checkbox' name='assignatures[]' value=" . $assignatura["id_assignatura"] . " id='" . $assignatura["id_assignatura"] . "'>";
      echo "<label for='" . $assignatura["id_assignatura"] . "'>" . $assignatura["nom"] . "</label>";
      echo "</div>";
    }
  }

  function mostrarAssignaturesEstudiant($assignatures) {
    foreach ($assignatures as $assignatura) {
      echo "<tr>";
      echo "<td>" . $assignatura["nom_assignatura"] . "</td>";
      echo "<td>" . $assignatura["nota"] . "</td>";
      echo "</tr>";
    }
  }

  function mostrarEstudiants($estudiants) {
    foreach ($estudiants as $estudiant) {
      echo "<tr>";
      echo "<td>" . $estudiant["id_estudiant"] . "</td>";
      echo "<td>" . $estudiant["nom_cognoms"] . "</td>";
      echo "</tr>";
    }
  }
  
  function mostrarAccions($estudiants) {
    foreach ($estudiants as $estudiant) {
      echo "<form action='editarestudiant.php' method='post'>";
      echo "<input type='text' name='id_estudiant' value='" . $estudiant["id_estudiant"] . "' hidden>";
      echo "<input type='submit' value='Editar'>";
      echo "</form>";
    }
  }
?>
  