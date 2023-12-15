<?php
require_once("model/usuarioRepository.php");
class Usuario
{
  private $id;
  private $username;
  private $rol; // Puedes usar esto para distinguir entre visitantes, maestros y administradores
  private $pokedex = [];
  private $equipo;


  public function __construct($datos, $db)
  {
    $this->id = $datos['id'];
    $this->username = $datos['username'];
    $this->rol = $datos['rol']; // 0 = visitante | 1 = maestro | 2 = administrador
    // rellena pokedex
    $this->pokedex = usuarioRepository::getPokedex($this->id, $db);
    // rellena equipo
    $this->updateEquipo($db);
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getRol()
  {
    return $this->rol;
  }
  public function getPokedex()
  {
    return $this->pokedex;
  }
  public function getEquipo()
  {
    return $this->equipo;
  }

  public function addPokemon($pokemonid, $db)
  {
    $this->pokedex[] = PokemonRepository::getPokemonById($pokemonid, $db);
    $sql = "INSERT INTO pokedex (idMaestro, idPokemon) VALUES ('$this->id', '$pokemonid')";
    $db->query($sql);
  }
  public function usePokemon($pokemonid, $db)
  {
    if (count($this->equipo) >= 6) {
      echo "<script>alert('No puedes tener más de 6 pokemons')</script>";
    } else {
      $this->equipo[] = PokemonRepository::getPokemonById($pokemonid, $db);
      try {
        $sql = "INSERT INTO equipos (idMaestro, idPokemon) VALUES ('$this->id', '$pokemonid')";
        $db->query($sql);
      } catch (Exception $e) {
        echo "<script>alert('No puedes añadir a ese pokemon a tu equipo')</script>";
      }
    }
  }
  public function removePokemon($pokemonid, $db)
  {
    $sql = "DELETE FROM equipos WHERE (idMaestro = '$this->id' AND idPokemon = '$pokemonid')";
    $db->query($sql);

    $this->updateEquipo($db);
  }
  public function updateEquipo($db)
  {
    $this->equipo = [];
    $this->equipo = usuarioRepository::getEquipo($this->id, $db);
  }
}
