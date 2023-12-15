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
  <?php // form de crear pokemon
  $tipos = PokemonRepository::updateTipos($db);
  echo "<h2>Crear pokemon</h2>";
  echo '<form method="post" action="index.php">
            <input type="text" name="pokenombre" placeholder="Nombre" required><br>
            <select name="tipo1" required>';
  foreach ($tipos as $tipo) {
    echo "<option value='$tipo'>$tipo</option>";
  }
  echo '</select><br>
            <select name="tipo2">';
  foreach ($tipos as $tipo) {
    echo "<option value='$tipo'>$tipo</option>";
  }
  echo '</select><br><input type="text" name="pokeimagen" placeholder="Imagen" required><br>
      <input type="text" name="pokenumero" placeholder="numero" required><br>
            <input type="submit" value="Crear">
            </form>';
  // form de añadir tipos
  echo "<h2>Añadir tipos</h2>";
  echo '<form method="post" action="index.php">
            <input type="text" name="tiponombre" placeholder="Nombre" required><br>
            <input type="submit" value="Añadir">
            </form>';
  ?>
</body>

</html>