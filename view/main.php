<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atención al cliente</title>
  <style>
    <?php include_once "css/styles.css" ?>
  </style>
</head>

<body>
  <h1>Bienvenido, <?php echo $_SESSION['usuario']->getUsername(); ?>!</h1>
  <a href="index.php?logout">Cerrar sesión</a>
  <a href="#pokedex">Ver mi pokedex</a>
  <a href="#team">Ir a equipo</a>
  <h2>Pokemons disponibles<h1>
      <?php
      $x = count($pokemonsDisponibles);
      $y = 0;
      $random = rand(0, $x - 1);
      foreach ($pokemonsDisponibles as $p) {
        if ($y == $random)
          echo $p->toCard();
        $y = 1 + $y;
      }
      ?>
      <a href="index.php">¿No te gusta?</a>
      <h2 id=" pokedex"> Tu pokedex </h2>
      <?php
      // var_dump($_SESSION['usuario']->getPokedex());
      if (isset($_SESSION['usuario']->getPokedex()[0])) {
        foreach ($_SESSION['usuario']->getPokedex() as $p) {
          echo $p;
        }
      } else
        echo "<h3> Tu pokedex está vacía :( </h3>";
      ?>
      <form method="post" action="index.php" id="team">
        <input class="viewteam" type="submit" value="View poketeam" name="viewteam"></input>
      </form>
</body>

</html>