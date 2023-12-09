<?php
  // include fisierul utilitare
  include 'utilitare.php';

  // verifica daca exista cookie restrictionat
  // si daca exista, verifica daca valoarea cookie-ului este Dragos sau Ana
  // daca nu exista sau valoare nu e ok, redirectioneaza catre pagina is_restricted.php

  $hasAccess = isAllowed();
  $user = getUser();

  if ($hasAccess === "no" || $hasAccess === "no user") {
    header('Location: is_restricted.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top secret</title>
</head>
<body>
  <h1>RESTRICTIONAT</h1>
  <p>date din baza de date</p>
  <p>pentru utilizatorul:
    <?php
      // decode base64-encoded string
      echo $user;
    ?>
  </p>
  <a href="logout.php">Logout</a>
</body>
</html>