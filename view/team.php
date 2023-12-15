<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crea tu equipo</title>
  <style>
    <?php include_once "css/styles.css" ?>
  </style>
</head>

<body>
  <a href='index.php?logout'>Cerrar sesión</a>
  <a href='index.php'>Volver</a>
  <h2 id="pokedex"> Tu pokedex </h2>
  <?php
  // var_dump($_SESSION['usuario']->getPokedex());
  if (isset($_SESSION['usuario']->getPokedex()[0])) {
    foreach ($_SESSION['usuario']->getPokedex() as $p) {
      echo $p->toTeamCardAdd();
    }
  } else
    echo "<h3> Tu pokedex está vacía :( </h3>";
  ?>
  <h2 id="pokedex"> Tu equipo </h2>
  <?php
  // var_dump($_SESSION['usuario']->getPokedex());
  if (count($_SESSION['usuario']->getEquipo())) {
    foreach ($_SESSION['usuario']->getEquipo() as $p) {
      echo $p->toTeamCardSee();
    }
  } else
    echo "<h3> Tu equipo está vacio :( </h3>";
  ?>

</body>

</html>