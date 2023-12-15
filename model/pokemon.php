<?php
class Pokemon
{
  public $id;
  public $nombre;
  public $tipo1;
  public $tipo2;
  public $numero;
  public $img;

  public function __construct($data)
  {
    $this->id = $data["id"];
    $this->nombre = $data["nombre"];
    $this->tipo1 = $data["tipo1"];
    if (isset($data["tipo2"]))
      $this->tipo2 = $data["tipo2"];
    $this->numero = $data["numero"];
    $this->img = "img/" . $data["image"];
  }

  public function __toString()
  {
    if ($this->tipo2)
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3><img src='$this->img'></img><p>$this->tipo1, $this->tipo2</p></div>";
    else
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3><img src='$this->img'></img><p>$this->tipo1</p></div>";
  }
  public function toCard()
  {
    if ($this->tipo2) {
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3>
    <img src='$this->img'></img>
    <p>$this->tipo1, $this->tipo2</p>
    <form method='post' action='index.php'>
    <input type='hidden' name='pokeid' value='$this->id'>
    <input type='submit' value='Añadir a la pokedex'>
    </form>
    </div>";
    } else {
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3>
    <img src='$this->img'></img>
    <p>$this->tipo1</p>
    <form method='post' action='index.php'>
    <input type='hidden' name='pokeid' value='$this->id'>
    <input type='submit' value='Añadir a la pokedex'>
    </form>
    </div>";
    }
  }
  public function toTeamCardAdd()
  {
    if ($this->tipo2) {
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3>
    <img src='$this->img'></img>
    <p>$this->tipo1, $this->tipo2</p>
    <form method='post'>
    <input type='hidden' name='poketeamaddid' value='$this->id'>
    <input type='submit' value='Añadir a tu equipo'>
    </form>
    </div>";
    } else {
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3>
    <img src='$this->img'></img>
    <p>$this->tipo1</p>
    <form method='post'>
    <input type='hidden' name='poketeamaddid' value='$this->id'>
    <input type='submit' value='Añadir a tu equipo'>
    </form>
    </div>";
    }
  }
  public function toTeamCardSee()
  {
    if ($this->tipo2) {
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3>
    <img src='$this->img'></img>
    <p>$this->tipo1, $this->tipo2</p>
    <form method='post'>
    <input type='hidden' name='poketeamremoveid' value='$this->id'>
    <input type='submit' value='Sacar del equipo'>
    </form>
    </div>";
    } else {
      return "<div class='card'><h3>$this->nombre(#$this->numero)</h3>
    <img src='$this->img'></img>
    <p>$this->tipo1</p>
    <form method='post'>
    <input type='hidden' name='poketeamremoveid' value='$this->id'>
    <input type='submit' value='Sacar del equipo'>
    </form>
    </div>";
    }
  }
}
