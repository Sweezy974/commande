<?php
namespace Test;
use PDO;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
  public $connexion = null;
  function testGetConnection() {
      $this->connexion = new PDO('mysql:host=localhost;dbname=uflow', 'root', '');
      $this->assertNotNull($this->connexion);
  }
  public function getConnexion() {
      $this->connexion = new PDO('mysql:host=localhost;dbname=uflow', 'root', '');
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->connexion;
  }
}
