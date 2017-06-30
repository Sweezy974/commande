<?php
namespace App;
use PDO;

session_start();
session_set_cookie_params(0);

class Connect
{
  public $connexion;
  // connect to the database
  public function getConnexion() {
      $this->connexion = new PDO('mysql:host=localhost;dbname=uflow', 'root', '');
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->connexion;
  }


}
