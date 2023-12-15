<?php
$db = Conectar::conexion();
require_once("model/usuario.php");
require_once("model/pokemon.php");
require_once("model/pokemonRepository.php");
session_start();
// ---
$pokemonsDisponibles = PokemonRepository::getPokemonsDisponibles($db);
$tiposDisponibles = PokemonRepository::getTipos($db);
// ---


// --->
if (isset($_GET)) {
  isset($_GET['registro']) && incluirRegistro(); //Equivale a SI existe $_GET['registro'] INCLUYE register.php
  isset($_GET['logout']) && destruirSesion();
}
if (isset($_POST)) {
  // para registrarse
  isset($_POST['newusername']) && isset($_POST['newpassword']) && registrarUsuario($db);

  // para logearse
  isset($_POST['username']) && isset($_POST['password']) && logearUsuario($db);

  // para ir a la vista teams
  isset($_POST['viewteam']) && viewTeamView();

  // para añadir un pokemon al equipo
  isset($_POST['poketeamaddid'])
    && isset($_SESSION['usuario'])
    && addPokemon($_POST['poketeamaddid'], $db);

  // para quitar un pokemon del equipo
  isset($_POST['poketeamremoveid'])
    && isset($_SESSION['usuario'])
    && removePokemon($_POST['poketeamremoveid'], $db);

  // para crear un pokemon
  isset($_POST['pokenombre'])
    && isset($_POST['tipo1'])
    //&& isset($_POST['tipo2']) 
    && isset($_POST['pokeimagen'])
    && isset($_POST['pokenumero'])
    && isset($_SESSION['usuario'])
    && $_SESSION['usuario']->getRol() == 2
    && PokemonRepository::crearPokemon($_POST, $db);

  // para crear un tipo 
  isset($_POST['tiponombre'])
    && isset($_SESSION['usuario'])
    && $_SESSION['usuario']->getRol() == 2
    && crearTipo($_POST['tiponombre'], $db);

  // para añadir un pokemon a la pokedex del user
  isset($_POST['pokeid'])
    && isset($_SESSION['usuario'])
    && $_SESSION['usuario']->addPokemon($_POST['pokeid'], $db);
}
// --->


// ---<
if (!isset($_SESSION) || empty($_SESSION['usuario'])) {
  include_once("view/login.php");
  die();
} else {
  $usuario = $_SESSION['usuario'];
  $username = $usuario->getUsername();
  $sql = "SELECT * FROM usuarios WHERE username = '$username'";
  $resultado = $db->query($sql);
  $row = $resultado->fetch_assoc();
  switch ($row['rol']) {
    case 2:
      include_once("view/admin.php");
      die();
    case 1:
      include_once("view/main.php");
      die();
    default:
  }
}
// ---<


// --+
function incluirRegistro()
{
  include_once("view/register.php");
  die();
}
function registrarUsuario($db)
{
  $username = $_POST['newusername'];
  $password = $_POST['newpassword'];
  $sql = "INSERT INTO usuarios (username, password, rol) VALUES ('$username', '$password', 1)";
  $db->query($sql);
  header("Location: index.php");
}
function logearUsuario($db)
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
  $resultado = $db->query($sql);
  if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $_SESSION['usuario'] = new usuario($row, $db);
    header("Location: index.php");
  } else {
    echo "Usuario o contraseña incorrectos";
  }
  die();
}
function viewTeamView()
{
  include_once("view/team.php");
  die();
}
function addPokemon($pokemonid, $db)
{
  $_SESSION['usuario']->usePokemon($pokemonid, $db);
  include("view/team.php");
  die();
}
function removePokemon($pokemonid, $db)
{
  $_SESSION['usuario']->removePokemon($pokemonid, $db);
  include("view/team.php");
  die();
}
function crearTipo($tipo, $db)
{
  PokemonRepository::crearTipo($tipo, $db);
  if ($_SESSION['usuario']->getRol() == 2) {
    include("view/admin.php");
  }
  die();
}
function destruirSesion()
{
  session_destroy();
  header("Location: index.php");
  die();
}
