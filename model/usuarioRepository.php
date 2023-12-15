<?php
class usuarioRepository
{
  public static function getEquipo($idUser, $db)
  {
    $sql = "SELECT * FROM equipos WHERE idMaestro = '$idUser'";
    $resultado = $db->query($sql);
    $row = $resultado->fetch_assoc();
    $equipo = [];
    while ($row = $resultado->fetch_assoc()) {
      $equipo[] = PokemonRepository::getPokemonById($row['idPokemon'], $db);
    }
    return $equipo;
  }
  public static function getPokedex($idUser, $db)
  {
    $sql = "SELECT * FROM pokedex WHERE idMaestro = '$idUser'";
    $resultado = $db->query($sql);
    $row = $resultado->fetch_assoc();
    $px = [];
    while ($row = $resultado->fetch_assoc()) {
      $px[] = PokemonRepository::getPokemonById($row['idPokemon'], $db);
    }
    return $px;
  }
}
