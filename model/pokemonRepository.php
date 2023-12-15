<?php
require_once("model/pokemon.php");
class PokemonRepository
{
  public static function getTipos($db)
  {
    $sql = "SELECT * FROM tipos";
    $resultado = $db->query($sql);
    $tipos = [];
    while ($row = $resultado->fetch_assoc()) {
      $tipos[] = $row['tipo'];
    }
    return $tipos;
  }
  public static function getPokemonsDisponibles($db)
  {
    $sql = "SELECT * FROM pokemons";
    $resultado = $db->query($sql);
    $pokemons = [];
    while ($row = $resultado->fetch_assoc()) {
      $pokemons[] = new Pokemon($row);
    }
    return $pokemons;
  }
  public static function getPokemonById($id, $db)
  {
    $sql = "SELECT * FROM pokemons WHERE id = '$id'";
    $resultado = $db->query($sql);
    $row = $resultado->fetch_assoc();
    return new Pokemon($row);
  }
  public static function crearPokemon($data, $db)
  {
    $nombre = $data['pokenombre'];
    $tipo1 = $data['tipo1'];
    $tipo2 = $data['tipo2'];
    $imagen = $data['pokeimagen'];
    $numero = $data['pokenumero'];

    if (!$tipo2) $tipo2 = null;
    $sql = "INSERT INTO pokemons (nombre, tipo1, tipo2, image, numero) VALUES ('$nombre', '$tipo1', '$tipo2', '$imagen', '$numero')";
    $resultado = $db->query($sql);
    return $resultado;
  }
  public static function crearTipo($tipo, $db)
  {
    $sql = "INSERT INTO tipos (tipo) VALUES ('$tipo')";
    $resultado = $db->query($sql);
    return $resultado;
  }
  public static function updateTipos($db)
  {
    $sql = "SELECT * FROM tipos";
    $resultado = $db->query($sql);
    $tipos = [];
    while ($row = $resultado->fetch_assoc()) {
      $tipos[] = $row['tipo'];
    }
    return $tipos;
  }
}
