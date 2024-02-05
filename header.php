<?php
  session_start();
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <header class="header-top">
    <?php
      if (isset($_SESSION['dni']) && $_SESSION['dni'] === 'ADMIN1234') {
        echo "<div class='logo-container'>";
        echo "<img src='assets/pia-admin.png' alt='logo'>";
        echo "</div>";
        echo '<nav class="header-nav">
              <ul class="nav-list">
              <li><a href="inici.php">Inici</a></li>
              <li><a href="notes.php">Notes</a></li>
              <li><a href="estudiants.php">Estudiants</a></li>
              <li><a href="assignatures.php">Assignatures</a></li>
              <li><a href="logout.php">Sortir</a></li>
              </ul>
              </nav>';
      } elseif (isset($_SESSION['dni'])) {
        echo "<div class='logo-container'>";
        echo "<img src='assets/pia-student.png' alt='logo'>";
        echo "</div>";
        echo '<nav class="header-nav">
              <ul class="nav-list">
              <li><a href="inici.php">Inici</a></li>
              <li><a href="logout.php">Sortir</a></li>
              </ul>
              </nav>';
      } else {
        echo "<div class='logo-container'>";
        echo "<img src='assets/pia-student.png' alt='logo'>";
        echo "</div>";
      }
    ?>
  </header>